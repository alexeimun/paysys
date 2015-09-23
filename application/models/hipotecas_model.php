<?php

    Class hipotecas_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeSolicitudesVencer()
        {
            foreach($this->db->query("SELECT ID_SOLICITUD FROM t_solicitudes WHERE VENCE_ANO=0 AND DATEDIFF(FECHA_FIN,FECHA_INICIO) <= 60")->result() as $solicitud)
            {
                $this->db->update('t_solicitudes', ['VENCE_ANO' => 1], ['ID_SOLICITUD' => $solicitud->ID_SOLICITUD]);
                foreach ( $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE ESTADO=1")->result() as $campo)
                {
                    $this->db->set('ACCION', $solicitud->ID_SOLICITUD);
                    $this->db->set('FECHA', 'NOW()', false);
                    $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'vs']);
                }
            }
        }

        public function TraeSolicitudes()
        {
            return $this->db->query("SELECT
             SOLICITUD,
             ID_SOLICITUD,
             CAPITAL_INICIAL,
             ESTADO_HIPOTECA,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_solicitudes.FECHA_INICIO,
             t_solicitudes.ABONADO,
             t_solicitudes.FECHA_FIN,
             if(TIPO_HIPOTECA=0,'Cerrada','Abierta')AS  TIPO_HIPOTECA,
             t_inmuebles.TIPO_INMUEBLE

               FROM t_solicitudes

              INNER  JOIN t_inmuebles USING (ID_INMUEBLE)
               INNER  JOIN t_deudores USING (ID_DEUDOR)
               INNER  JOIN t_acreedores USING (ID_ACREEDOR)
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1 AND t_inmuebles.ESTADO=1 ");
        }

        public function TraeInmuebles()
        {
            return $this->db->query('SELECT
             ID_INMUEBLE,
             TIPO_INMUEBLE,
             MATRICULA,
             NUMERO_NOTARIA,
             NUMERO_ESCRITURA,
             t_inmuebles.DIRECCION,
             t_inmuebles.FECHA_REGISTRA,
             FECHA_ENTREGA_ESCRITURA,
             FECHA_CONSTITUCION,
             UTILIZADO,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR

               FROM t_inmuebles

                INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_inmuebles.ID_PROPIETARIO
                WHERE  t_inmuebles.ESTADO=1');
        }

        public function TraeInmuebleDropdown($Ideudor)
        {
            return $this->db->query('SELECT
             ID_INMUEBLE,
             TIPO_INMUEBLE,
             MATRICULA,
             NUMERO_NOTARIA,
             NUMERO_ESCRITURA,
             DIRECCION,
             FECHA_ENTREGA_ESCRITURA,
             UTILIZADO

               FROM t_inmuebles
               WHERE   UTILIZADO=0  AND t_inmuebles.ESTADO=1 AND ID_PROPIETARIO=' . $Ideudor);
        }

        public function TraeInmueble($IdInmueble)
        {
            $query = $this->db->query("SELECT
              ID_INMUEBLE,
             TIPO_INMUEBLE,
             TIPO_INMUEBLE AS TIPO,
             MATRICULA,
             CERCA,
             ID_DEUDOR,
             NUMERO_NOTARIA,
             NUMERO_ESCRITURA,
             t_inmuebles.DIRECCION,
             FECHA_ENTREGA_ESCRITURA,
             FECHA_CONSTITUCION,
             UTILIZADO,
              CONCAT(CONCAT(UPPER(LEFT(t_ciudades.NOMBRE, 1)), LOWER(SUBSTRING(t_ciudades.NOMBRE, 2))),', ',
            CONCAT(UPPER(LEFT(t_ciudades.DEPARTAMENTO, 1)), LOWER(SUBSTRING(t_ciudades.DEPARTAMENTO, 2)))) AS NOMBRE_CIUDAD,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_ciudades.ID_CIUDAD

               FROM t_inmuebles

                INNER JOIN t_ciudades ON t_inmuebles.ID_CIUDAD=t_ciudades.ID_CIUDAD
                INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_inmuebles.ID_PROPIETARIO

                WHERE  ID_INMUEBLE=$IdInmueble AND t_inmuebles.ESTADO=1 LIMIT 1");
            foreach ($query->result() as $campo) ;
            if ($campo->UTILIZADO == 1)
            {
                $query = $this->db->query("SELECT ID_SOLICITUD from t_solicitudes WHERE ID_INMUEBLE=$campo->ID_INMUEBLE AND ESTADO=1");
                foreach ($query->result() as $campo2) ;
                $campo->ID_SOLICITUD = $campo2->ID_SOLICITUD;
            }
            switch ($campo->TIPO_INMUEBLE)
            {
                case 0:
                    $campo->TIPO_INMUEBLE = 'Casa';
                    break;
                case 1:
                    $campo->TIPO_INMUEBLE = 'Apartamento';
                    break;
                case 2:
                    $campo->TIPO_INMUEBLE = 'Finca';
                    break;
            }
            return $campo;
        }

        public function TraeSolicitud($IdSolicitud)
        {
            $query = $this->db->query("SELECT
            SOLICITUD,
             ID_SOLICITUD,
             CAPITAL_INICIAL,
             INTERES_MENSUAL,
             CUOTA_ADMINISTRACION,
             AJUSTE,
             COMISION_OFICINA,
             FECHA_INICIO,
             FECHA_FIN,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_solicitudes.FECHA_INICIO,
             t_solicitudes.FECHA_FIN,
             if(TIPO_HIPOTECA=0,'Cerrada','Abierta')AS  TIPO_HIPOTECA,
             t_inmuebles.ID_INMUEBLE,
            t_inmuebles.TIPO_INMUEBLE,
            t_inmuebles.NUMERO_ESCRITURA,
            t_inmuebles.NUMERO_NOTARIA,
            t_inmuebles.FECHA_ENTREGA_ESCRITURA,
            t_inmuebles.MATRICULA

               FROM t_solicitudes

               INNER  JOIN t_inmuebles ON t_inmuebles.ID_INMUEBLE=t_solicitudes.ID_INMUEBLE
               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1 AND t_inmuebles.ESTADO=1 AND ID_SOLICITUD=" . $IdSolicitud);
            foreach ($query->result() as $campo) return $campo;
        }

        public function InsertaSolicitud()
        {
            #Actualizo el campo UTILIZADO = '1' del inmueble
            $this->db->update('t_inmuebles', ['UTILIZADO' => 1], ['ID_INMUEBLE' => $this->input->post('ID_INMUEBLE')]);
            #Actuallizo el LIGADO de los clientes para que no se puedan eliminar
            $this->db->query("UPDATE t_deudores SET LIGADO=LIGADO+1 WHERE ID_DEUDOR=" . $this->input->post('ID_DEUDOR'));
            $this->db->query("UPDATE t_acreedores SET LIGADO=LIGADO+1 WHERE ID_ACREEDOR=" . $this->input->post('ID_ACREEDOR'));
            #Inserción
            $this->db->set('FECHA_REGISTRA', 'NOW()', false);
            $this->db->set('USUARIO_REGISTRA', $this->session->userdata('ID_USUARIO'));
            $Data = ['SOLICITUD' => $this->input->post('SOLICITUD'),
                'ID_INMUEBLE' => $this->input->post('ID_INMUEBLE'),
                'ID_ACREEDOR' => $this->input->post('ID_ACREEDOR'),
                'ID_DEUDOR' => $this->input->post('ID_DEUDOR'),
                'FECHA_INICIO' => $this->input->post('FECHA_INICIO'),
                'FECHA_FIN' => $this->input->post('FECHA_FIN'),
                'FECHA_FIN' => $this->input->post('FECHA_FIN'),
                'TIPO_HIPOTECA' => $this->input->post('TIPO_HIPOTECA'),
                'HIPOTECADO' => $this->input->post('HIPOTECADO'),
                'CAPITAL_INICIAL' => $this->input->post('CAPITAL_INICIAL'),
                'INTERES_MENSUAL' => $this->input->post('INTERES_MENSUAL'),
                'CUOTA_ADMINISTRACION' => $this->input->post('CUOTA_ADMINISTRACION')];
            $this->db->insert('t_solicitudes', $Data);
            $this->db->update('t_consecutivos', ['CONSECUTIVO' => $this->input->post('SOLICITUD') + 1], ['NOMBRE' => 'SOLICITUD']);
            if (count($this->input->post()) > 13)
            {
                $IdSol = 0;
                foreach ($this->db->query('SELECT ID_SOLICITUD FROM t_solicitudes WHERE SOLICITUD=' . $this->input->post('SOLICITUD'))->result() as $id) $IdSol = $id->ID_SOLICITUD;
                foreach ($_POST['PAGARE'] as $pagare)
                {
                    $this->db->insert('t_pagares', ['VALOR' => $pagare, 'ID_SOLICITUD' => $IdSol]);
                }
            }
        }

        public function InsertaInmueble()
        {
            $this->db->set('FECHA_REGISTRA', 'NOW()', false);
            $this->db->set('USUARIO_REGISTRA', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_inmuebles', $this->input->post());
        }

        public function TraePagares($id)
        {
            $pag = '';
            $c = 0;
            foreach ($this->db->query('SELECT VALOR FROM t_pagares WHERE ID_SOLICITUD=' . $id)->result() as $pagare)
            {
                $pag .= '<div class="form-group">
                    <label class="col-lg-3 control-label">Pagare #' . ++ $c . ':</label>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control numero dinero" value="' . $pagare->VALOR . '" >
                        </div>
                    </div>
                </div>';
            }
            return $pag;
        }

        public function ActualizaInmueble()
        {
            $data = ['TIPO_INMUEBLE' => trim($this->input->post('TIPO_INMUEBLE')),
                'ID_PROPIETARIO' => trim($this->input->post('ID_PROPIETARIO')),
                'ID_CIUDAD' => trim($this->input->post('ID_CIUDAD')),
                'DIRECCION' => trim($this->input->post('DIRECCION', true)),
                'CERCA' => trim($this->input->post('CERCA', true)),
                'NUMERO_NOTARIA' => trim($this->input->post('NUMERO_NOTARIA', true)),
                'NUMERO_ESCRITURA' => trim($this->input->post('NUMERO_ESCRITURA', true)),
                'MATRICULA' => trim($this->input->post('MATRICULA', true)),
                'FECHA_ENTREGA_ESCRITURA' => trim($this->input->post('FECHA_ENTREGA_ESCRITURA'))];
            $this->db->set('FECHA_MODIFICA', 'NOW()', false);
            $this->db->set('USUARIO_MODIFICA', $this->session->userdata('ID_USUARIO'), false);
            $this->db->update('t_inmuebles', $data, ['ID_INMUEBLE' => $this->input->post('ID_INMUEBLE')]);
        }

        public function EliminarInmueble()
        {
            $this->db->set('FECHA_ELIMINA', 'NOW()', false);
            return $this->db->update('t_inmuebles', ['ESTADO' => 0, 'USUARIO_ELIMINA' => $this->session->userdata('ID_USUARIO')], ['ID_INMUEBLE' => $this->input->post('Id')]);
        }

        public function EliminarSolicitud()
        {
            $this->db->set('FECHA_ELIMINA', 'NOW()', false);
            $this->db->update('t_solicitudes', ['ESTADO' => 0, 'USUARIO_ELIMINA' => $this->session->userdata('ID_USUARIO')], ['ID_SOLICITUD' => $this->input->post('Id')]);
            $this->db->query("UPDATE t_deudores SET LIGADO=LIGADO-1 WHERE ID_DEUDOR=(SELECT ID_DEUDOR FROM t_solicitudes WHERE ID_SOLICITUD=" . $this->input->post('Id') . ")");
            $this->db->query("UPDATE t_acreedores SET LIGADO=LIGADO-1 WHERE ID_ACREEDOR=(SELECT ID_ACREEDOR FROM t_solicitudes WHERE ID_SOLICITUD=" . $this->input->post('Id') . ")");
            $this->db->query("UPDATE t_inmuebles SET UTILIZADO=0 WHERE ID_INMUEBLE= (SELECT ID_INMUEBLE FROM t_solicitudes WHERE ID_SOLICITUD=" . $this->input->post('Id') . ")");
        }
    }