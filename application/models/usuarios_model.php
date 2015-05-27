<?php

    Class usuarios_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeUsuariosNotificaion($Mode = true)
        {
            if ($Mode)
                return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL<> 0 AND ESTADO=0 AND ID_USUARIO <> " . $this->session->userdata('ID_USUARIO'));
            else return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL <> 0 AND ESTADO=1");
        }

        public function TraeUsuario($IdUsuario)
        {
            $query = $this->db->query('SELECT *

               FROM t_usuarios

                WHERE ESTADO=1 AND ID_USUARIO=' . $IdUsuario . ' LIMIT 1');
            foreach ($query->result() as $campo) return $campo;
        }

        public function ValidarCredenciales($usuario, $clave)
        {
            $this->db->select('*');
            $this->db->from('t_usuarios');
            $this->db->where('CORREO', $usuario);
            $this->db->where('CLAVE', $clave);
            $this->db->where('ESTADO', 1);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1)
                return $query->result();
            else
                return false;
        }

        public function ActualizaAvatarUsuario()
        {
            return $this->db->update('t_usuarios', ['AVATAR' => $this->input->post('Avatar')], ['ID_USUARIO' => $this->session->userdata('ID_USUARIO')]);
        }

        public function ActualizaUsuarioPerfil()
        {
            $this->db->update('t_usuarios', $this->input->post(null, true), ['ID_USUARIO' => $this->session->userdata('ID_USUARIO')]);
            $this->session->set_userdata(
                [
                    'NOMBRE_USUARIO' => $this->input->post('NOMBRE', true),
                    'CORREO' => $this->input->post('CORREO', true),
                    'CLAVE' => $this->input->post('CLAVE', true),
                ]
            );
        }

        public function ContarUsuarios()
        {
            $query = $this->db->query('SELECT COUNT(ID_USUARIO) AS USUARIOS FROM t_usuarios WHERE ESTADO=1 LIMIT  1');
            foreach ($query->result() as $campo) return $campo->USUARIOS;
        }

        public function InsertarUsuario()
        {
            $Datos = array_slice($_POST, 1, count($_POST) - 1);
            $Chks = array_slice($_POST, 0, 1);
            $this->db->set('FECHA_REGISTRO', 'NOW()', false);
            $this->db->set('USUARIO_REGISTRA', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_usuarios', $Datos);
            foreach ($this->db->query("SELECT MAX(ID_USUARIO) AS  ID_USUARIO FROM t_usuarios LIMIT 1")->result() as $Id) ;
            foreach ($this->TraeUsuariosNotificaion()->result() as $campo)
            {
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $Id->ID_USUARIO, false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ui']);
            }
            $this->InsertaPermisos($Chks['Chks'], $Id->ID_USUARIO);
        }

        public function InsertaPermisos($Chks, $idUser)
        {
            $c = 0;
            $Query = "INSERT INTO t_permisos(ID_MODULO, ID_USUARIO, AUTORIZADO, USUARIO_REGISTRA) VALUES ";
            foreach ($this->usuarios_model->TraeModulos() as $Modulo)
            {
                foreach ($this->usuarios_model->TraeSubModulos($Modulo->ID_MODULO) as $SubModulo)
                {
                    $Query .= "(" . $SubModulo->ID_MODULO . ", " . $idUser . ", " . $Chks[$c ++] . ", " . $this->session->userdata('ID_USUARIO') . "),";
                }
            }
            $this->db->query(rtrim($Query, ','));
        }

        public function EliminaUsuario()
        {
            foreach ($this->TraeUsuariosNotificaion(false)->result() as $campo)
            {
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $this->input->post('Id'), false);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ue']);
            }
            $this->db->update('t_usuarios', ['ESTADO' => 0], ['ID_USUARIO' => $this->input->post('Id')]);
        }


        public function RestauraUsuario($Id)
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'ue', 'ACCION' => $Id]);
            return $this->db->update('t_usuarios', ['ESTADO' => 1], ['ID_USUARIO' => $Id]);
        }

        public function ActualizarInicioSesion()
        {
            $this->db->set('FACHA_ULTIMO_INICIO_SESION', 'NOW()', false);
            return $this->db->update('t_usuarios', null, ['ID_USUARIO' => $this->session->userdata('ID_USUARIO')]);
        }

        public function ActualizaPermisos()
        {
            $this->db->delete('t_notificaciones', ['TIPO' => 'ua', 'ACCION' => $this->input->post('ID_USUARIO')]);
            $this->db->update('t_usuarios', ['NIVEL' => $this->input->post('NIVEL')], ['ID_USUARIO' => $this->input->post('ID_USUARIO')]);
            foreach ($this->TraeUsuariosNotificaion()->result() as $campo)
            {
                $this->db->set('ACCION', $this->input->post('ID_USUARIO'));
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('USUARIO_ACCION', $this->session->userdata('ID_USUARIO'));
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ua']);
            }
            $Chks = $this->input->post('Chks');
            $c = 0;
            foreach ($this->TraeModulos() as $Modulo)
            {
                foreach ($this->TraeSubModulos($Modulo->ID_MODULO) as $SubModulo)
                {
                    $this->db->update('t_permisos', ['AUTORIZADO' => $Chks[$c ++]], ['ID_USUARIO' => $this->input->post('ID_USUARIO'), 'ID_MODULO' => $SubModulo->ID_MODULO]);
                }
            }
        }

        public function TraeUsuarios()
        {
            return $this->db->query('SELECT * FROM t_usuarios WHERE ESTADO=1 ORDER BY ID_USUARIO DESC ')->result();
        }

        public function TraeModulos()
        {
            return $this->db->query('SELECT ID_MODULO,NOMBRE FROM t_modulos WHERE PADRE IS NULL')->result();
        }

        public function TraePermisos($IdUsuario)
        {
            return $this->db->query('SELECT AUTORIZADO FROM t_permisos WHERE ID_USUARIO=' . $IdUsuario)->result();
        }

        public function TraeSubModulos($IdMod)
        {
            return $this->db->query("SELECT ID_MODULO,NOMBRE FROM t_modulos WHERE PADRE=$IdMod ORDER BY ORDEN")->result();
        }
    }