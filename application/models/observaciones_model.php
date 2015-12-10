<?php

    Class observaciones_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeUsuarios()
        {
            return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL<>0 AND ESTADO=1 AND ID_USUARIO <> " . $this->session->userdata('ID_USUARIO'));
        }

        public function TraeObservaciones()
        {
            return $this->db->query("SELECT
             t_usuarios.NOMBRE,
             t_usuarios.AVATAR,
             FECHA,
             VISTO,
             ID_OBSERVACION,
             t_observaciones.ESTADO,
             CASE PRIORIDAD WHEN 0 THEN 'Baja' WHEN 1 THEN 'Media' ELSE 'Alta' END AS PRIORIDAD,
             ASUNTO

               FROM t_observaciones
                INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_observaciones.ID_USUARIO

                ORDER BY FECHA DESC");
        }

        public function CrearComentario()
        {
            $this->db->set('FECHA_COMENTARIO', 'NOW()', false);
            $this->db->set('ID_USUARIO', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_comentarios', $this->input->post(null, true));
            foreach ($this->db->query("SELECT MAX(ID_COMENTARIO) AS  ID_COMENTARIO FROM t_comentarios LIMIT 1")->result() as $Id) ;
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $Id->ID_COMENTARIO);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'ci']);
            }
        }

        public function TraerComentariosNotificacion()
        {
            return $this->db->query("SELECT
             t_usuarios.NOMBRE,
             FECHA_COMENTARIO,
             ID_OBSERVACION,
             t_comentarios.ID_COMENTARIO

               FROM t_notificaciones
                INNER JOIN t_comentarios ON t_comentarios.ID_COMENTARIO=t_notificaciones.ACCION
                INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_comentarios.ID_USUARIO
                 WHERE t_notificaciones.TIPO='ci' AND  t_notificaciones.VISTO=0 AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO'))->result();
        }

        public function TraerObservacionesNotificacion()
        {
            return $this->db->query("SELECT
             t_usuarios.NOMBRE,
             t_observaciones.FECHA,
             ID_OBSERVACION

               FROM t_notificaciones
                INNER JOIN t_observaciones ON t_observaciones.ID_OBSERVACION=t_notificaciones.ACCION
                INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_observaciones.ID_USUARIO
                 WHERE t_notificaciones.TIPO='oi' AND  t_notificaciones.VISTO=0 AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO'))->result();
        }

        public function EliminarNotificacion($Accion, $Tipo)
        {
            $this->db->delete('t_notificaciones', ['TIPO' => $Tipo, 'ACCION' => $Accion]);
        }

        public function TraeObservacion($id)
        {
            $query = $this->db->query("SELECT
             t_usuarios.NOMBRE,
             t_usuarios.AVATAR,
             FECHA,
             VISTO,
             OBSERVACION,
             ID_OBSERVACION,
             t_observaciones.ESTADO,
             CASE PRIORIDAD WHEN 0 THEN 'Baja' WHEN 1 THEN 'Media' ELSE 'Alta' END AS PRIORIDAD,
             ASUNTO

               FROM t_observaciones
                INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_observaciones.ID_USUARIO
                 WHERE ID_OBSERVACION=" . $id . ' LIMIT 1');
            foreach ($query->result() as $info) return $info;
        }

        public function RevisarVisto($id)
        {
            $autor = true;
            $q1 = $this->db->query("SELECT ID_USUARIO FROM t_observaciones WHERE ID_OBSERVACION= " . $id)->result();
            foreach ($q1 as $campo) ;
            if($campo->ID_USUARIO != $this->session->userdata('ID_USUARIO'))
            {
                $this->db->update('t_observaciones', ['VISTO' => '1'], ['ID_OBSERVACION' => $id]);
                $autor = false;
            }
            return $autor;
        }

        public function SolucionarObservacion()
        {
            $this->db->update('t_observaciones', ['ESTADO' => '1'], ['ID_OBSERVACION' => $this->input->post('ID_OBSERVACION')]);
        }

        public function TraeComentarios($id)
        {
            return $this->db->query("SELECT
             t_usuarios.NOMBRE,
             t_usuarios.ID_USUARIO,
             t_usuarios.AVATAR,
             FECHA_COMENTARIO,
             COMENTARIO

               FROM t_comentarios
                INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_comentarios.ID_USUARIO
                 WHERE ID_OBSERVACION= $id ORDER BY t_comentarios.ID_COMENTARIO DESC")->result();
        }

        public function InsertaObservacion()
        {
            $this->db->set('FECHA', 'NOW()', false);
            $this->db->set('ID_USUARIO', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_observaciones', array_slice($this->input->post(), 0, 3));
            foreach ($this->db->query("SELECT MAX(ID_OBSERVACION) AS  ID_OBSERVACION FROM t_observaciones LIMIT 1")->result() as $Id) ;
            $this->db->update('t_archivos', ['ESTADO' => '1', 'ID_OBSERVACION' => $Id->ID_OBSERVACION], ['ESTADO' => 0, 'ID_USUARIO' => $this->session->userdata('ID_USUARIO')]);
            foreach ($this->TraeUsuarios()->result() as $campo)
            {
                $this->db->set('FECHA', 'NOW()', false);
                $this->db->set('ACCION', $Id->ID_OBSERVACION);
                $this->db->insert('t_notificaciones', ['ID_USUARIO' => $campo->ID_USUARIO, 'TIPO' => 'oi']);
            }
        }

        public function InsertaArchivo($RutaArchivo, $NombreArchivo)
        {
            $this->db->set('ID_USUARIO', $this->session->userdata('ID_USUARIO'));
            $this->db->insert('t_archivos', ['RUTA_ARCHIVO' => $RutaArchivo, 'NOMBRE_ARCHIVO' => $NombreArchivo]);
        }

        public function TraeArchivos($mode, $IdObs = 0)
        {
            switch ($mode)
            {
                case 0:
                    return $this->db->query("SELECT
             NOMBRE_ARCHIVO,
             RUTA_ARCHIVO

               FROM t_archivos

                 WHERE ID_OBSERVACION IS NULL AND ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . " AND ESTADO=0 ORDER BY ID_ARCHIVO DESC")->result();
                    break;
                case 1:
                    return $this->db->query("SELECT
             NOMBRE_ARCHIVO,
             RUTA_ARCHIVO

               FROM t_archivos

                 WHERE ID_OBSERVACION =$IdObs AND ESTADO=1 ORDER BY ID_ARCHIVO DESC")->result();
                    break;
            }
        }

        public function EliminarArchivo($Nombre)
        {
            $this->db->delete('t_archivos', ['RUTA_ARCHIVO' => $Nombre]);
        }
    }
