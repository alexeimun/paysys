<?php

    Class extras_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function ProximosACobrar()
        {
            $deudores = $this->db->query("SELECT
                t_deudores.NOMBRE    NOMBRE_DEUDOR,
                if(t_deudores.CELULAR <> '', t_deudores.CELULAR,t_deudores.TELEFONO) TEL,
                t_deudores.DOCUMENTO,
                max(t_intereses.MES) MES,
                t_solicitudes.FECHA_INICIO,
                t_solicitudes.ID_SOLICITUD

              FROM t_solicitudes

                INNER JOIN t_deudores USING (ID_DEUDOR)
                INNER JOIN t_intereses USING (ID_SOLICITUD)

              GROUP BY ID_SOLICITUD

              HAVING DATE_ADD(DATE_ADD(t_solicitudes.FECHA_INICIO, INTERVAL MES + 1 MONTH), INTERVAL -3 DAY) <= CURDATE()")->result();

            $Listdeudores = [];
            foreach ($deudores as $deudor)
            {
                $Listdeudores[] =
                    [
                        'NOMBRE' => $deudor->NOMBRE_DEUDOR,
                        'TELEFONO' => $deudor->TEL,
                        'DOCUMENTO' => $deudor->DOCUMENTO,
                        'MES' => (new DateTime($deudor->FECHA_INICIO))->add(new DateInterval('P' . $deudor->MES . 'M'))->format('d/m/Y'),
                        'ID_SOLICITUD' => $deudor->ID_SOLICITUD
                    ];
            }
            return $Listdeudores;
            //var_dump($Listdeudores);
            //exit;
        }
    }