<?php

    Class clientes_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeCiudades()
        {
            return $this->db->query('SELECT t_ciudades.ID_CIUDAD,
            CONCAT(UPPER(LEFT(t_ciudades.NOMBRE, 1)), LOWER(SUBSTRING(t_ciudades.NOMBRE, 2))) AS NOMBRE,
            CONCAT(UPPER(LEFT(t_ciudades.DEPARTAMENTO, 1)), LOWER(SUBSTRING(t_ciudades.DEPARTAMENTO, 2)))AS DEPARTAMENTO
            FROM
            t_ciudades
            ORDER BY NOMBRE');
        }

        public function TraeCiudad($Id)
        {
            return $this->db->query('SELECT t_ciudades.NOMBRE,
            CONCAT(UPPER(LEFT(t_ciudades.NOMBRE, 1)), LOWER(SUBSTRING(t_ciudades.NOMBRE, 2))) AS NOMBRE,
            CONCAT(UPPER(LEFT(t_ciudades.DEPARTAMENTO, 1)), LOWER(SUBSTRING(t_ciudades.DEPARTAMENTO, 2)))AS DEPARTAMENTO
            FROM
            t_ciudades
            WHERE ID_CIUDAD=' . $Id)->result();
        }

        public function TraeDeudores()
        {
            return $this->db->query('SELECT
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             FECHA_REGISTRA,
             TELEFONO,
             DOCUMENTO,
             CORREO,
             ENCARGADO,
             DIRECCION,
             ID_DEUDOR,
             LIGADO,
              t_ciudades.NOMBRE AS NOMBRE_CIUDAD

               FROM t_deudores
                INNER JOIN t_ciudades ON t_ciudades.ID_CIUDAD=t_deudores.ID_CIUDAD

                WHERE ESTADO=1');
        }

        public function TraeSolicitudesDeudor($id)
        {
            return $this->db->query('SELECT DISTINCT
                so.SOLICITUD,
                t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
                t_inmuebles.MATRICULA,
                so.FECHA_INICIO,
                so.FECHA_FIN,
                so.ID_SOLICITUD

               FROM t_solicitudes so
                INNER JOIN t_acreedores USING (ID_ACREEDOR)
                INNER JOIN t_inmuebles ON t_inmuebles.ID_INMUEBLE=so.ID_INMUEBLE

                WHERE t_acreedores.ESTADO=1 AND t_inmuebles.ESTADO=1 AND so.ID_DEUDOR=' . $id)->result();
        }

        public function TraeAcreedores()
        {
            return $this->db->query('SELECT DISTINCT
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             TELEFONO,
             DOCUMENTO,
             CORREO,
             DIRECCION,
             ID_ACREEDOR,
             FECHA_REGISTRA,
             LIGADO,
              t_ciudades.NOMBRE AS NOMBRE_CIUDAD

               FROM t_acreedores
                INNER JOIN t_ciudades ON t_acreedores.ID_CIUDAD=t_ciudades.ID_CIUDAD

                WHERE ESTADO=1');
        }

        public function TraeDeudor($IdDeudor)
        {
            $query = $this->db->query('SELECT
             NOMBRE,
             FECHA_REGISTRA,
             TELEFONO,
             CELULAR,
             CORREO,
             DOCUMENTO,
             DIRECCION,
             ENCARGADO,
             ID_DEUDOR,
             ID_CIUDAD

               FROM t_deudores

                WHERE ESTADO=1 AND ID_DEUDOR=' . $IdDeudor . ' LIMIT 1');
            foreach ($query->result() as $campo) return $campo;
            return null;
        }

        public function TraeAcreedor($IdAcreedor)
        {
            $query = $this->db->query('SELECT *

               FROM t_acreedores

                WHERE ESTADO=1 AND ID_ACREEDOR=' . $IdAcreedor . ' LIMIT 1');
            foreach ($query->result() as $campo) return $campo;
            return null;
        }

        public function TraeReferencias($IdDeudor)
        {
            return $this->db->query('SELECT
             NOMBRE_REFERENCIA,
             TIPO_REFERENCIA,
             TELEFONO_REFERENCIA,
             DIRECCION_REFERENCIA

               FROM t_referencias

                WHERE ID_DEUDOR=' . $IdDeudor);
        }

        public function InsertaDeudor()
        {
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $this->input->post('DOCUMENTO'), false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'di']);
            }
            $Deudor = array_slice($this->input->post(null, true), 0, 8);
            $this->db->set('FECHA_REGISTRA', 'NOW()', false);
            $this->db->set('USUARIO_REGISTRA', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_deudores', $Deudor);
            if(count($this->input->post()) > 8)
            {
                $this->InsertaRefrencias($Deudor['DOCUMENTO']);
            }
        }

        public function InsertaAcreedor()
        {
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $this->input->post('DOCUMENTO'), false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ai']);
            }
            $this->db->set('FECHA_REGISTRA', 'NOW()', false);
            $_POST['MANEJO_CARTERA'] = isset($_POST['MANEJO_CARTERA']) ? 1 : 0;
            $_POST['RECLAMA_PERSONALMENTE'] = isset($_POST['RECLAMA_PERSONALMENTE']) ? 1 : 0;
            $this->db->set('USUARIO_REGISTRA', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_acreedores', $this->input->post(null, true));
        }

        public function TraeUsuarios($Mode = true)
        {
            if($Mode)
            {
                return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL<> 0 AND ESTADO=1 AND ID_USUARIO <> " . $this->session->userdata('ID_USUARIO'));
            }
            else
            {
                return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL <> 0 AND ESTADO=1");
            }
        }

        private function InsertaRefrencias($Documento)
        {
            $Referencias = array_slice($this->input->post(null, true), 7);
            $query = $this->db->query('SELECT ID_DEUDOR FROM t_deudores WHERE DOCUMENTO=' . $Documento);
            $id_deudor = 0;
            foreach ($query->result() as $campo)
                $id_deudor = $campo->ID_DEUDOR;
            for ($i = 0; $i < count($Referencias['TIPO_REFERENCIA']); $i++)
            {
                $this->db->set('FECHA_REGISTRO', 'NOW()', false);
                $this->db->insert('t_referencias',
                    ['ID_DEUDOR' => $id_deudor, 'TIPO_REFERENCIA' => $Referencias['TIPO_REFERENCIA'][$i], 'NOMBRE_REFERENCIA' => $Referencias['NOMBRE_REFERENCIA'][$i],
                        'DIRECCION_REFERENCIA' => $Referencias['DIRECCION_REFERENCIA'][$i], 'TELEFONO_REFERENCIA' => $Referencias['TELEFONO_REFERENCIA'][$i]]);
            }
        }

        public function EliminarDeudor()
        {
            foreach ($this->TraeUsuarios(false)->result() as $campo)
            {
                $this->db->set('ACCION', $this->input->post('Id'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'de']);
            }
            $this->db->set('FECHA_ELIMINA', 'NOW()', false);
            return $this->db->update('t_deudores', ['ESTADO' => 0, 'USUARIO_ELIMINA' => $this->session->userdata('ID_USUARIO')], ['ID_DEUDOR' => $this->input->post('Id')]);
        }

        public function EliminarAcreedor()
        {
            foreach ($this->TraeUsuarios(false)->result() as $campo)
            {
                $this->db->set('ACCION', $this->input->post('Id'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ae']);
            }
            $this->db->set('FECHA_ELIMINA', 'NOW()', false);
            return $this->db->update('t_acreedores', ['ESTADO' => 0, 'USUARIO_ELIMINA' => $this->session->userdata('ID_USUARIO')], ['ID_ACREEDOR' => $this->input->post('Id')]);
        }

        public function RestauraDeudor($Id)
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'de', 'ACCION' => $Id]);
            return $this->db->update('t_deudores', ['ESTADO' => 1, 'USUARIO_ELIMINA' => 0], ['ID_DEUDOR' => $Id]);
        }

        public function RestauraAcreedor($Id)
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'ae', 'ACCION' => $Id]);
            return $this->db->update('t_acreedores', ['ESTADO' => 1, 'USUARIO_ELIMINA' => 0], ['ID_ACREEDOR' => $Id]);
        }

        public function ActualizaDeudor()
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'da', 'ACCION' => $this->input->post('Ideudor')]);
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('ACCION', $this->input->post('Ideudor'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'da']);
            }
            $data = ['NOMBRE' => trim($this->input->post('NOMBRE', true)),
                'CORREO' => trim($this->input->post('CORREO', true)),
                'TELEFONO' => trim($this->input->post('TELEFONO', true)),
                'CELULAR' => trim($this->input->post('CELULAR', true)),
                'DOCUMENTO' => trim($this->input->post('DOCUMENTO', true)),
                'DIRECCION' => trim($this->input->post('DIRECCION', true)),
                'ENCARGADO' => trim($this->input->post('ENCARGADO', true)),
                'ID_CIUDAD' => trim($this->input->post('ID_CIUDAD'))];
            $this->db->set('FECHA_MODIFICA', 'NOW()', false);
            $this->db->set('USUARIO_MODIFICA', $this->session->userdata('ID_USUARIO'), false);
            $this->db->update('t_deudores', $data, ['ID_DEUDOR' => $this->input->post('Ideudor')]);
            $this->db->delete('t_referencias', ['ID_DEUDOR' => $this->input->post('Ideudor')]);
            if(count($this->input->post()) > 8)
            {
                $this->InsertaRefrencias($this->input->post('DOCUMENTO', true));
            }
        }

        public function ActualizaAcreedor()
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'aa', 'ACCION' => $this->input->post('Idacreedor')]);
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->set('ACCION', $this->input->post('Idacreedor'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'aa']);
            }
            $data = ['NOMBRE' => trim($this->input->post('NOMBRE', true)),
                'CORREO' => trim($this->input->post('CORREO', true)),
                'TELEFONO' => trim($this->input->post('TELEFONO', true)),
                'CELULAR' => trim($this->input->post('CELULAR', true)),
                'DOCUMENTO' => trim($this->input->post('DOCUMENTO', true)),
                'DIRECCION' => trim($this->input->post('DIRECCION', true)),
                'NOMBRE_CUENTA' => trim($this->input->post('NOMBRE_CUENTA', true)),
                'NUMERO_CUENTA' => trim($this->input->post('NUMERO_CUENTA', true)),
                'MANEJO_CARTERA' => isset($_POST['MANEJO_CARTERA']) ? 1 : 0,
                'RECLAMA_PERSONALMENTE' => isset($_POST['RECLAMA_PERSONALMENTE']) ? 1 : 0,
                'ID_CIUDAD' => trim($this->input->post('ID_CIUDAD', true))];
            $this->db->set('FECHA_MODIFICA', 'NOW()', false);
            $this->db->set('USUARIO_MODIFICA', $this->session->userdata('ID_USUARIO'), false);
            $this->db->update('t_acreedores', $data, ['ID_ACREEDOR' => $this->input->post('Idacreedor')]);

        }

        public function ContarDeudores()
        {
            $query = $this->db->query('SELECT COUNT(ID_DEUDOR) AS DEUDORES FROM t_deudores WHERE ESTADO=1 LIMIT  1');
            foreach ($query->result() as $campo) return $campo->DEUDORES;
            return null;
        }

        public function ContarSolicitudes()
        {
            $query = $this->db->query('SELECT COUNT(ID_SOLICITUD) AS SOLICITUDES FROM t_solicitudes WHERE ESTADO=1 LIMIT  1');
            foreach ($query->result() as $campo) return $campo->SOLICITUDES;
            return null;
        }

        public function ContarAcreedores()
        {
            $query = $this->db->query('SELECT COUNT(ID_ACREEDOR) AS ACREEDORES FROM t_acreedores WHERE ESTADO=1 LIMIT  1');
            foreach ($query->result() as $campo) return $campo->ACREEDORES;
            return null;
        }

        public function TraeSolicitudesDD()
        {
            return $this->db->query("SELECT SOLICITUD, ID_SOLICITUD, t_deudores.NOMBRE,t_deudores.DOCUMENTO
            FROM t_solicitudes INNER JOIN t_deudores USING (ID_DEUDOR)")->result();
        }

        public function SCAcredor()
        {
            $this->db->query("UPDATE t_solicitudes set ID_ACREEDOR='$_POST[TO]' where ID_ACREEDOR='$_POST[FROM]'");
            foreach ($this->db->query("Select  LIGADO from t_acreedores  where ID_ACREEDOR='$_POST[FROM]'")->result() as $ligado) ;

            $this->db->query("UPDATE t_acreedores set LIGADO=$ligado->LIGADO where ID_ACREEDOR='$_POST[TO]'");
            $this->db->query("UPDATE t_acreedores set LIGADO=0 where ID_ACREEDOR='$_POST[FROM]'");
        }

        public function SCDeudor()
        {
            foreach ($this->db->query("SELECT ID_ACREEDOR FROM t_solicitudes WHERE ID_SOLICITUD='$_POST[FROM]'")->result() as $IdAcreedor) ;
            $IdAcreedor = $IdAcreedor->ID_ACREEDOR;

            $this->db->query("UPDATE t_acreedores set LIGADO=LIGADO-1 where ID_ACREEDOR=$IdAcreedor");
            $this->db->query("UPDATE t_acreedores set LIGADO=LIGADO+1 where ID_ACREEDOR='$_POST[TO]'");

            $this->db->query("UPDATE t_solicitudes  set ID_ACREEDOR='$_POST[TO]' where ID_SOLICITUD='$_POST[FROM]'");
        }
    }