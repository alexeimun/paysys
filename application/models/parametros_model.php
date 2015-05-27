<?php

    Class parametros_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeUsuarios()
        {
            return $this->db->query("SELECT  ID_USUARIO  FROM t_usuarios WHERE NIVEL<>0 AND ESTADO=1 AND ID_USUARIO <> " . $this->session->userdata('ID_USUARIO'));
        }

        public function ImportaDeudores()
        {
            try
            {
                $archivo = $_FILES['excel']['name'];
                $destino = "bak_" . $archivo;
                copy($_FILES['excel']['tmp_name'], $destino);
                if (file_exists("bak_" . $archivo))
                {
                    /** Clases necesarias */
                    $this->load->library('ExcelImport/PHPExcel');
                    // Cargando la hoja de cálculo
                    $objReader = new PHPExcel_Reader_Excel2007();
                    $objPHPExcel = $objReader->load("bak_" . $archivo);
                    // Asignar hoja de excel activa
                    $objPHPExcel->setActiveSheetIndex(0);
                    // Llenamos el arreglo con los datos  del archivo xlsx
                    $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                    #Recuento de registros importados
                    $count = 0;
                    for ($i = 1; $i <= $highestRow; $i ++)
                    {
                        if ($objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue() != '')
                        {
                            $count ++;
                        }
                        $Excel[$i]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                        $Excel[$i]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                        $Excel[$i]['documento'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                        $Excel[$i]['direccion'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                        $Excel[$i]['correo'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                        $Excel[$i]['encargado'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                    }
                }
                $first = true;
                $sql = "";
                foreach ($Excel as $campo => $valor)
                {
                    if ($valor['nombre'] != '' && $valor['nombre'] != null)
                    {
                        if ($first)
                        {
                            $sql = "INSERT INTO t_deudores(NOMBRE,TELEFONO,DOCUMENTO,DIRECCION,CORREO,ENCARGADO,ID_CIUDAD,ESTADO,FECHA_REGISTRA)
              VALUES ('" . $valor['nombre'] . "','" . $valor['telefono'] . "','" . $valor['documento'] . "','" . $valor['direccion'] . "','" . $valor['correo'] . "','" . $valor['encargado'] . "',1,1,NOW())";
                            $first = false;
                        }
                        else
                            $sql .= ",('" . $valor['nombre'] . "','" . $valor['telefono'] . "','" . $valor['documento'] . "','" . $valor['direccion'] . "','" . $valor['correo'] . "','" . $valor['encargado'] . "',1,1,NOW())";
                    }
                }
                $this->db->query($sql);
                //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
                unlink($destino);
            }
            catch (Exception $e)
            {
            }
        }

        public function ImportaAcreedores()
        {
            try
            {
                $archivo = $_FILES['excel']['name'];
                $destino = "bak_" . $archivo;
                copy($_FILES['excel']['tmp_name'], $destino);
                if (file_exists("bak_" . $archivo))
                {
                    /** Clases necesarias */
                    $this->load->library('ExcelImport/PHPExcel');
                    // Cargando la hoja de cálculo
                    $objReader = new PHPExcel_Reader_Excel2007();
                    $objPHPExcel = $objReader->load("bak_" . $archivo);
                    // Asignar hoja de excel activa
                    $objPHPExcel->setActiveSheetIndex(0);
                    // Llenamos el arreglo con los datos  del archivo xlsx
                    $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                    #Recuento de registros importados
                    $count = 0;
                    for ($i = 1; $i <= $highestRow; $i ++)
                    {
                        if ($objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue() != '')
                        {
                            $count ++;
                        }
                        $Excel[$i]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                        $Excel[$i]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                        $Excel[$i]['documento'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                        $Excel[$i]['direccion'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                        $Excel[$i]['correo'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                        $Excel[$i]['encargado'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                    }
                }
                $first = true;
                $sql = "";
                foreach ($Excel as $campo => $valor)
                {
                    if ($valor['nombre'] != '' && $valor['nombre'] != null)
                    {
                        if ($first)
                        {
                            $sql = "INSERT INTO t_acreedores(NOMBRE,TELEFONO,DOCUMENTO,DIRECCION,CORREO,ID_CIUDAD,ESTADO,FECHA_REGISTRA)
              VALUES ('" . $valor['nombre'] . "','" . $valor['telefono'] . "','" . $valor['documento'] . "','" . $valor['direccion'] . "','" . $valor['correo'] . "',1,1,NOW())";
                            $first = false;
                        }
                        else
                            $sql .= ",('" . $valor['nombre'] . "','" . $valor['telefono'] . "','" . $valor['documento'] . "','" . $valor['direccion'] . "','" . $valor['correo'] . "',1,1,NOW())";
                    }
                }
                $this->db->query($sql);
                //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
                unlink($destino);
            }
            catch (Exception $e)
            {
            }
        }

        public function TraeConsecutivo($NombreConsecutivo)
        {
            $query = $this->db->query("SELECT CONSECUTIVO FROM t_consecutivos WHERE NOMBRE='" . $NombreConsecutivo . "'");
            foreach ($query->result() as $consecutivo) return $consecutivo->CONSECUTIVO;
        }

        public function TraeInformacionEmpresa()
        {
            $query = $this->db->query("SELECT *  FROM t_empresa");
            foreach ($query->result() as $empresa)
                return $empresa;
        }

        public function TraeConsecutivos()
        {
            return $this->db->query("SELECT *  FROM t_consecutivos")->result();
        }



        public function ActualizaEmpresa()
        {
            $this->db->set('FECHA_ACTUALIZA', 'NOW()', false);
            $this->db->update('t_empresa', ['GERENTE' => $this->input->post('GERENTE'),
                'NIT' => $this->input->post('NIT'),
                'CORREO' => $this->input->post('CORREO'),
                'TELEFONO' => $this->input->post('TELEFONO'),
                'DIRECCION' => $this->input->post('DIRECCION')]);
        }

        public function ActualizaConsecutivos()
        {
            $cons = $this->db->query("SELECT * FROM t_consecutivos")->result();
            if ($cons[0]->CONSECUTIVO != $_POST['Consecutivos'][0])
            {
                $this->db->set('FECHA_MODIFICA', 'NOW()', false);
                $this->db->update('t_consecutivos', ['CONSECUTIVO' => $_POST['Consecutivos'][0]], ['NOMBRE' => 'RECIBO']);
            }
            if ($cons[1]->CONSECUTIVO != $_POST['Consecutivos'][1])
            {
                $this->db->set('FECHA_MODIFICA', 'NOW()', false);
                $this->db->update('t_consecutivos', ['CONSECUTIVO' => $_POST['Consecutivos'][1]], ['NOMBRE' => 'SOLICITUD']);
            }
        }
    }
