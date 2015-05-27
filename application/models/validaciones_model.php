<?php

    Class validaciones_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function ValidaCampos()
        {
            if ($this->input->post('CLIENTE')!='')
            {
                if ($this->input->post('CLIENTE') == 'Deudor')
                {
                    $query = $this->db->query('SELECT DOCUMENTO FROM t_deudores WHERE DOCUMENTO=' . $this->input->post('DOCUMENTO'));
                    return $query->num_rows() > 0;
                }
                else
                {
                    $query = $this->db->query('SELECT DOCUMENTO FROM t_acreedores WHERE DOCUMENTO=' . $this->input->post('DOCUMENTO'));
                    return $query->num_rows() > 0;
                }
            }
            else
            {
                $query = $this->db->query("SELECT CORREO FROM t_usuarios WHERE CORREO='" . $this->input->post('CORREO')."'");
                return $query->num_rows() > 0;
            }
        }
    }