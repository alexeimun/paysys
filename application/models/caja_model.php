<?php

    Class caja_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeUsuarios()
        {
            return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL<>0 AND ESTADO=1 AND ID_USUARIO <> " . $this->session->userdata('ID_USUARIO'));
        }

        public function TraeInteresPago()
        {
            return $this->db->query("SELECT  DESCRIPCION,VALOR, CONCEPTO
                               FROM t_movimientos WHERE TIPO_MOV = 1 AND ID_SOLICITUD=" . $this->input->post('IdSol'));
        }

        public function InsertaPagoTemp($type = 0)
        {
            if($type == 1)
            {
                $query = "INSERT INTO t_pago_temp (CONCEPTO,VALOR,TIPO,METADATO,METADATO2,ID_SOLICITUD,ID_USUARIO) VALUES";
                $size = count($_POST['REG'][0]);

                for ($i = 0; $i < $size; $i++)
                {
                    $query .= "('" . $_POST['REG'][2][$i] . "'," . $_POST['REG'][3][$i] . ",1," . $_POST['REG'][0][$i] . "," . ($_POST['REG'][1][$i] != '' ? "'" . $_POST['REG'][1][$i] . "'" : "NULL") . ","
                        . $this->input->post('IdSol') . "," . $this->session->userdata('ID_USUARIO') . ")" . ($i + 1 < $size ? "," : '');
                }
                $this->db->query($query);
            }
            else
            {
                $CHEQUE = isset($_POST['CHEQUE']) ? $_POST['CHEQUE'] : '';
                $BANCO = isset($_POST['BANCO']) ? $_POST['BANCO'] : '';

                $this->db->insert('t_pago_temp', ['CONCEPTO' => $this->input->post('CONCEPTO'),
                    #Si se trata de una ampliación con valor 0, no s cobra
                    'TIPO' => ($this->input->post('VALOR') == 0 && $this->input->post('TIPO_RECIBO') == 3) ? -1 : $this->input->post('TIPO_RECIBO'),
                    'VALOR' => $this->input->post('VALOR'),
                    'CHEQUE' => $CHEQUE,
                    'BANCO' => $BANCO,
                    'METADATO' => $this->input->post('METADATO') == '' ? null : $this->input->post('METADATO'),
                    'ID_SOLICITUD' => $this->input->post('IdSol'),
                    'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                ]);
            }
        }

        public function InsertaRecibo($Consecutivo, $IdSol)
        {
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $Consecutivo, false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ri', 'USUARIO_ACCION' => $this->session->userdata('ID_USUARIO')]);
            }
            $Secuencia = 0;
            $TotalAbonado = 0;
            $TotalInteres = 0;
            $TotalAC = 0;
            $TotalAP = 0;
            $TotalComision = 0;
            $Tmeses = 0;
            //$Abono_inicial = $this->db->query("SELECT (CAPITAL_INICIAL-ABONADO) AS VALOR_ABONO FROM  t_solicitudes WHERE ID_SOLICITUD= $IdSol")->result()[0]->VALOR_ABONO;
            foreach ($this->TraePagosTemp($IdSol) as $pagotemp)
            {
                switch ($pagotemp->TIPO)
                {
                    case 0:
                        $TotalAbonado += $pagotemp->VALOR;
                        break;
                    case 1:
                        $TotalInteres += $pagotemp->VALOR;
                        break;
                    case 2:
                        $TotalAC += $pagotemp->VALOR;
                        break;
                    case -1:
                    case 3:
                        $TotalAP = $pagotemp->VALOR;
                        $Tmeses = $pagotemp->METADATO;
                        break;
                    case 4:
                        $TotalComision += $pagotemp->VALOR;
                        break;
                }
                if($pagotemp->TIPO == -1)
                {
                    $this->db->query("UPDATE t_solicitudes SET FECHA_FIN=DATE_ADD(FECHA_FIN, INTERVAL $Tmeses MONTH) WHERE ID_SOLICITUD=" . $IdSol);
                    $this->db->delete('t_pago_temp', ['ID_USUARIO' => $this->session->userdata('ID_USUARIO'), 'ID_SOLICITUD' => $IdSol]);
                    echo 'true';
                    exit;
                }
                if($pagotemp->TIPO != 2 && $pagotemp->TIPO != 1)
                {
                    $this->db->set('FECHA', 'NOW()', false);
                    $this->db->insert('t_movimientos',
                        ['CONCEPTO' => $pagotemp->CONCEPTO,
                            'VALOR' => $pagotemp->VALOR,
                            'CHEQUE' => $pagotemp->CHEQUE,
                            'BANCO' => $pagotemp->BANCO,
                            'CONSECUTIVO' => $Consecutivo,
                            'DESCRIPCION' => $pagotemp->METADATO,
                            'TIPO_MOV' => $pagotemp->TIPO,
                            'SECUENCIA' => ++$Secuencia,
                            'ID_SOLICITUD' => $IdSol,
                            'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                        ]);
                }
                else if($pagotemp->TIPO == 1)
                {
                    $this->db->insert('t_intereses',
                        ['CONCEPTO' => $pagotemp->CONCEPTO,
                            'VALOR' => $pagotemp->VALOR,
                            'CONSECUTIVO' => $Consecutivo,
                            'MES' => $pagotemp->METADATO,
                            'PERIODO' => $pagotemp->METADATO2,
                            'FECHA' => date('Y-m-d'),
                            'ID_SOLICITUD' => $IdSol,
                        ]);
                }
            }
            $this->db->update('t_consecutivos', ['CONSECUTIVO' => $Consecutivo + 1], ['NOMBRE' => 'RECIBO']);
            if($TotalAbonado > 0)
            {
                $this->db->query("UPDATE t_solicitudes SET ABONADO=ABONADO+ $TotalAbonado  WHERE ID_SOLICITUD= $IdSol");
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_movimientos',
                    ['VALOR' => $TotalAbonado,
                        'CONSECUTIVO' => $Consecutivo,
                        'SECUENCIA' => ++$Secuencia,
                        'ID_SOLICITUD' => $IdSol,
                        'DESCRIPCION' => 'TA',
                        'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                    ]);
            }
            if($TotalInteres > 0)
            {
                $this->db->query("UPDATE t_solicitudes SET ABONO_INTERES=ABONO_INTERES+ $TotalInteres  WHERE ID_SOLICITUD= $IdSol");
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_movimientos',
                    ['VALOR' => $TotalInteres,
                        'CONSECUTIVO' => $Consecutivo,
                        'SECUENCIA' => ++$Secuencia,
                        'ID_SOLICITUD' => $IdSol,
                        'DESCRIPCION' => 'TI',
                        'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                    ]);
            }
            if($TotalAC > 0)
            {
                $this->db->query('UPDATE t_solicitudes SET CAPITAL_INICIAL=CAPITAL_INICIAL+' . $TotalAC . ' WHERE ID_SOLICITUD=' . $IdSol);
                $this->db->delete('t_pago_temp', ['ID_USUARIO' => $this->session->userdata('ID_USUARIO'), 'ID_SOLICITUD' => $IdSol]);
                //$this->db->set('FECHA', 'NOW()', false);
                //$this->db->insert('t_movimientos',
                //    ['VALOR' => $TotalAC,
                //        'CONSECUTIVO' => $Consecutivo,
                //        'SECUENCIA' => ++$Secuencia,
                //        'ID_SOLICITUD' => $IdSol,
                //        'DESCRIPCION' => 'TAC',
                //        'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                //    ]);
                echo 'true';
                exit;
            }
            if($TotalAP > 0)
            {
                $this->db->query("UPDATE t_solicitudes SET FECHA_FIN=DATE_ADD(FECHA_FIN, INTERVAL $Tmeses MONTH) WHERE ID_SOLICITUD= $IdSol");
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_movimientos',
                    ['VALOR' => $TotalAP,
                        'CONSECUTIVO' => $Consecutivo,
                        'SECUENCIA' => ++$Secuencia,
                        'ID_SOLICITUD' => $IdSol,
                        'DESCRIPCION' => 'TAP',
                        'INFO_AP' => $this->db->query("SELECT FECHA_FIN FROM t_solicitudes WHERE ID_SOLICITUD=$IdSol")->result()[0],
                        'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                    ]);
            }
            if($TotalComision > 0)
            {
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_movimientos',
                    ['VALOR' => $TotalComision,
                        'CONSECUTIVO' => $Consecutivo,
                        'SECUENCIA' => ++$Secuencia,
                        'ID_SOLICITUD' => $IdSol,
                        'DESCRIPCION' => 'TC',
                        'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                    ]);
            }
            ##TOTAL_RECIBO
            $this->db->set('FECHA', 'NOW()', false);
            $this->db->insert('t_movimientos',
                ['VALOR' => $TotalInteres + $TotalAbonado + $TotalAC + $TotalAP + $TotalComision,
                    'CONSECUTIVO' => $Consecutivo,
                    'SECUENCIA' => ++$Secuencia,
                    'ID_SOLICITUD' => $IdSol,
                    'DESCRIPCION' => 'TR',
                    'BANCO' => $this->input->post('BANCO'),
                    'CHEQUE' => $this->input->post('CHEQUE'),
                    'ID_USUARIO' => $this->session->userdata('ID_USUARIO'),
                ]);
            $this->session->set_userdata(['First' => 'Original']);
            $this->db->delete('t_pago_temp', ['ID_USUARIO' => $this->session->userdata('ID_USUARIO'), 'ID_SOLICITUD' => $IdSol]);
            $this->session->set_userdata(['ConsecutivoRecibo' => $Consecutivo]);
        }

        public function Clientes()
        {
            return $this->db->query("SELECT
              t_deudores.NOMBRE AS  NOMBRE_DEUDOR,
              t_solicitudes.ID_SOLICITUD,
              t_deudores.DOCUMENTO DOCUMENTO_DEUDOR,
              t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
              t_acreedores.DOCUMENTO AS DOCUMENTO_ACREEDOR,
              t_solicitudes.FECHA_INICIO,
              t_solicitudes.FECHA_FIN,
              t_solicitudes.CAPITAL_INICIAL,
              t_solicitudes.ESTADO_HIPOTECA,
              t_solicitudes.INTERES_MENSUAL,
              IF(t_solicitudes.ABONO_INTERES IS NULL,0,t_solicitudes.ABONO_INTERES ) AS ABONO_INTERES,
              IF(t_solicitudes.ABONADO IS NULL,0,t_solicitudes.ABONADO ) AS ABONADO

                FROM
              t_solicitudes
                INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               WHERE ID_SOLICITUD= " . $this->input->post('IdSol'));
        }

        public function ContarAbonos()
        {
            foreach ($this->db->query("SELECT count(*) C FROM  t_movimientos  WHERE TIPO_MOV=0 AND ID_SOLICITUD=" . $this->input->post('IdSol'))->result() as $field)
                return $field->C;
        }

        public function TraePagosTemp($IdSol)
        {
            return $this->db->query("SELECT
                ID_PAGO_TEMP,
                TIPO,
                CASE TIPO WHEN 0 THEN 'Abono' WHEN 1 THEN 'Intereses' WHEN 2 THEN 'Ampliación C' WHEN 3 THEN 'Ampliación P' WHEN -1 THEN 'Ampliación P' WHEN 4 THEN 'COMISIÓN' END TIPO_ESCRITO,
                CONCEPTO,
                VALOR,
                CHEQUE,
                METADATO,
                METADATO2,
                BANCO
                FROM
              t_pago_temp

               WHERE ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . " AND  ID_SOLICITUD= " . $IdSol)->result();
        }

        public function EliminaPagoTemp()
        {
            $this->db->delete('t_pago_temp', ['ID_PAGO_TEMP' => $this->input->post('IdPago')]);
        }

        public function TraeSolicitudes()
        {
            return $this->db->query("SELECT
             SOLICITUD,
             ID_SOLICITUD,
             CAPITAL_INICIAL,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_solicitudes.FECHA_INICIO,
             t_solicitudes.FECHA_FIN,
             t_deudores.DOCUMENTO AS DOCUMENTO_DEUDOR
             #if(TIPO_HIPOTECA=0,'Cerrada','Abierta')AS  TIPO_HIPOTECA

               FROM t_solicitudes

               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1 ");
        }

        public function TraeSolicitud($IdSol)
        {
            return $this->db->query("SELECT
             SOLICITUD,
             ID_SOLICITUD,
             CAPITAL_INICIAL,
             ABONADO,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_deudores.TELEFONO,
             t_deudores.DIRECCION AS DIRECCION_DEUDOR,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_solicitudes.FECHA_INICIO,
             IF(t_solicitudes.TIPO_HIPOTECA=0,'cerrada','abierta') TIPO_HIPOTECA,
             t_solicitudes.FECHA_FIN,
             t_solicitudes.INTERES_MENSUAL,
             t_solicitudes.ABONADO,
             t_deudores.DOCUMENTO AS DOCUMENTO_DEUDOR,
             t_inmuebles.NUMERO_ESCRITURA,
             t_inmuebles.NUMERO_NOTARIA,
             t_inmuebles.MATRICULA,
             t_inmuebles.FECHA_CONSTITUCION,
             t_inmuebles.DIRECCION AS DIRECCION_INMUEBLE

               FROM t_solicitudes

               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               INNER  JOIN t_inmuebles ON t_inmuebles.ID_PROPIETARIO=t_solicitudes.ID_DEUDOR
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1 AND
               ID_SOLICITUD=$IdSol LIMIT  1");
        }

        public function TraeRecibos()
        {
            return $this->db->query("SELECT
             CONSECUTIVO AS CONSECUTIVO_RECIBO,
             t_solicitudes.SOLICITUD AS CONSECUTIVO_SOLICITUD,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_deudores.DOCUMENTO,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             VALOR,
             ANULADO,
             t_movimientos.FECHA

               FROM t_movimientos

               INNER  JOIN t_solicitudes USING (ID_SOLICITUD)
               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1
               AND t_movimientos.DESCRIPCION='TR' ORDER BY t_movimientos.CONSECUTIVO DESC");
        }

        public function TraeAbonos($idSol)
        {
            #NOTA: TA total abonos
            return $this->db->query("SELECT
                t_movimientos.VALOR AS ABONADO,
                t_solicitudes.CAPITAL_INICIAL,
                t_solicitudes.ABONADO AS TOTAL_ABONADO,
                t_movimientos.CONSECUTIVO,
                t_movimientos.FECHA

               FROM t_movimientos

               INNER  JOIN t_solicitudes ON t_solicitudes.ID_SOLICITUD=t_movimientos.ID_SOLICITUD
               WHERE t_movimientos.ID_SOLICITUD=$idSol AND  t_solicitudes.ESTADO=1 AND t_movimientos.DESCRIPCION='TA'")->result();
        }

        public function TraeRecibo()
        {
            return $this->db->query("SELECT
                t_movimientos.VALOR,
                t_movimientos.CONCEPTO,
                t_movimientos.BANCO,
                t_movimientos.ID_SOLICITUD,
                t_movimientos.CHEQUE

               FROM t_movimientos

               INNER  JOIN t_solicitudes ON t_solicitudes.ID_SOLICITUD=t_movimientos.ID_SOLICITUD
               WHERE t_movimientos.CONSECUTIVO=" . $this->session->userdata('ConsecutivoRecibo') . "
               AND t_movimientos.TIPO_MOV IS NOT NULL AND  t_solicitudes.ESTADO=1")->result();
        }

        public function InteresesPagadosDeudor()
        {
            return $this->db->query("SELECT * FROM t_intereses WHERE FECHA>='" . $this->input->post('HASTA') . "' AND FECHA <='" . $this->input->post('HASTA') . "' ORDER BY MES DESC LIMIT 1");
        }

        public function InteresesPagadosDeudor1()
        {
            foreach ($this->db->query("SELECT COUNT(inte.CONSECUTIVO) MESES, SUM(inte.VALOR) TOTAL  FROM t_intereses inte
               WHERE  inte.FECHA>='" . $this->input->post('DESDE') . "' AND inte.FECHA <='" . $this->input->post('HASTA') . "'
                AND inte.ID_SOLICITUD=" . $this->input->post('ID_SOLICITUD'))->result() as $res)
                return ['MESES' => $res->MESES, 'TOTAL' => $res->TOTAL];
        }

        public function TraeInfoRecibo()
        {
            return $this->db->query("SELECT
                t_solicitudes.CAPITAL_INICIAL,
                t_solicitudes.ABONADO,
                t_movimientos.VALOR,
                t_movimientos.FECHA,
                t_movimientos.BANCO,
                t_movimientos.ANULADO,
                t_movimientos.CHEQUE,
                t_deudores.NOMBRE AS NOMBRE_DEUDOR,
                t_deudores.TELEFONO,
                t_deudores.DOCUMENTO AS DOCUMENTO_DEUDOR,
                t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
                t_inmuebles.DIRECCION AS DIR_INMUEBLE,
                t_usuarios.NOMBRE AS NOMBRE_USUARIO

               FROM t_movimientos

               INNER  JOIN t_solicitudes ON t_solicitudes.ID_SOLICITUD=t_movimientos.ID_SOLICITUD
               INNER  JOIN t_inmuebles ON t_inmuebles.ID_INMUEBLE=t_solicitudes.ID_INMUEBLE
               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               INNER  JOIN t_usuarios USING (ID_USUARIO)

               WHERE t_movimientos.CONSECUTIVO=" . $this->session->userdata('ConsecutivoRecibo') . "
               AND t_movimientos.DESCRIPCION ='TR' AND  t_solicitudes.ESTADO=1")->result();
        }

        public function TraeNombreAcreedor()
        {
            foreach ($this->db->query("SELECT NOMBRE FROM t_acreedores WHERE t_acreedores.ID_ACREEDOR=" . $this->input->post('ID_ACREEDOR'))->result() as $a)
                return $a->NOMBRE;
        }

        public function TraeMovimientosDeudores()
        {
            return $this->db->query("SELECT
                mo.VALOR,
                t_deudores.NOMBRE AS NOMBRE_DEUDOR,
                mo.DESCRIPCION,
                mo.TIPO_MOV,
                mo.CONSECUTIVO,
                mo.INFO_AP,
                t_solicitudes.CUOTA_ADMINISTRACION ADMINISTRACION,
                t_solicitudes.FECHA_INICIO,
                t_solicitudes.FECHA_FIN

               FROM t_movimientos mo

               INNER  JOIN t_solicitudes USING (ID_SOLICITUD)
               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR

               WHERE TIPO_MOV IN (0,1,3) AND mo.FECHA>='" . $this->input->post('DESDE') . "' AND mo.FECHA<='" . $this->input->post('HASTA') . "' AND
                t_acreedores.ID_ACREEDOR=" . $this->input->post('ID_ACREEDOR') . " AND  mo.TIPO_MOV IS NOT NULL")->result();
        }

        public function TraeCuadreDiario($fecha = null)
        {
            $fecha = !is_null($fecha) ? $fecha : $this->input->post('FECHA');
            return $this->db->query("(SELECT CONSECUTIVO,
            TIPO_MOV,
            VALOR,
            so.CUOTA_ADMINISTRACION
             FROM t_movimientos
            INNER JOIN t_solicitudes so USING (ID_SOLICITUD)
            WHERE TIPO_MOV IN (0,3,4) AND FECHA='$fecha' ORDER BY CONSECUTIVO)
            UNION
            (SELECT CONSECUTIVO,
            1,
            VALOR,
            so.CUOTA_ADMINISTRACION
             FROM t_intereses
            INNER JOIN t_solicitudes so USING (ID_SOLICITUD)
            WHERE FECHA='$fecha' ORDER BY CONSECUTIVO)")->result();
        }

        public function TraeCuadreDiarioIntereses()
        {
            return $this->db->query("SELECT CONSECUTIVO,
            1,
            VALOR,
            so.CUOTA_ADMINISTRACION
             FROM t_intereses
            INNER JOIN t_solicitudes so USING (ID_SOLICITUD)
            WHERE FECHA='" . $this->input->post('FECHA') . "' ORDER BY CONSECUTIVO")->result();
        }

        public function TraeComisión($IdSol)
        {
            return $this->db->query("SELECT m.VALOR,s.FECHA_FIN from t_movimientos m,t_solicitudes s WHERE TIPO_MOV =4 AND t_movimientos.ID_SOLICITUD=$IdSol");
        }

        public function AnularRecibo($id)
        {
            $this->db->set('FECHA_ANULA', 'NOW()', false);
            $this->db->update('t_movimientos', ['ANULADO' => 1, 'USUARIO_ANULA' => $this->session->userdata('ID_USUARIO')], ['DESCRIPCION' => 'TR', 'CONSECUTIVO' => $id]);
        }

        public function ActualizarCuadreConsecutivo()
        {
            $this->db->update('t_consecutivos', ['CONSECUTIVO' => $this->input->post('NRO'), 'USUARIO_MODIFICA' => $this->session->userdata('ID_USUARIO')], ['NOMBRE' => 'CUADRE']);
        }

        public function TraeCuadreConsecutivo()
        {
            foreach ($this->db->query("SELECT CONSECUTIVO FROM t_consecutivos WHERE NOMBRE='CUADRE'")->result() as $c) return $c->CONSECUTIVO;
        }

        public function TraeIngresosDiarios()
        {
            return @$this->db->query("SELECT CONSECUTIVO,
           t_acreedores.NOMBRE NOMBRE_ACREEDOR,
           t_deudores.NOMBRE NOMBRE_DEUDOR,
           VALOR,
           FECHA
          from t_movimientos
          INNER  JOIN t_solicitudes USING (ID_SOLICITUD)
          INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
          INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR

          WHERE FECHA ='$_POST[FECHA]' AND DESCRIPCION='TR'")->result();
        }

        public function TraeDebeComision($IdSolicitud)
        {
            #Cuento las comisiones que ya ha pagado el deudor
            $ComisionesPagadas = $this->db->query("SELECT
            count(*) CANTIDAD
            from t_movimientos
            WHERE t_movimientos.TIPO_MOV=4 AND t_movimientos.ID_SOLICITUD=$IdSolicitud")->result();
            $ComisionesPagadas = $ComisionesPagadas[0]->CANTIDAD;
            #Hago una operación con las comisiones pagadas y los años que han pasado desde FECHA_INICIO
            $DebeComisiones = $this->db->query("SELECT FLOOR(DATEDIFF(FECHA_FIN,FECHA_INICIO)/365) -$ComisionesPagadas AS RESULTADO
            FROM t_solicitudes
            WHERE ID_SOLICITUD=$IdSolicitud")->result();
            #Sí hay deudas, muestra cuantas son (int)
            return ['Comisiones' => $DebeComisiones[0]->RESULTADO, 'InicioDebe' => $ComisionesPagadas];
        }

        public function TraePagaAmpliacionPlazo($IdSol)
        {
            return @$this->db->query("SELECT
            VALOR,
            DESCRIPCION,
            INFO_AP AS FECHA
            from t_movimientos

            WHERE TIPO_MOV=3 AND ID_SOLICITUD=$IdSol ORDER BY FECHA DESC limit 1")->result()[0];
        }

        public function TraePagaComision($IdSolicitud)
        {
            return @$this->db->query("SELECT
              t_movimientos.VALOR,
              t_movimientos.FECHA
            from t_movimientos

            WHERE t_movimientos.TIPO_MOV=4 AND t_movimientos.ID_SOLICITUD=$IdSolicitud ORDER BY FECHA DESC  LIMIT  1")->result()[0];
        }

        public function TraeIntereses($IdSolicitud)
        {
            return $this->db->query("SELECT
             VALOR,
             MES,
             PERIODO,
             CONCEPTO

            from t_intereses

            WHERE ID_SOLICITUD=$IdSolicitud")->result();
        }

        public function TraeInteresesPorConsecutivo($Consecutivo)
        {
            return $this->db->query("SELECT
             VALOR,
             MES,
             PERIODO,
             CONCEPTO

            from t_intereses

            WHERE CONSECUTIVO=$Consecutivo")->result();
        }
    }