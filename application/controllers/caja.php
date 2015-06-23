<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Caja extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('clientes_model');
            $this->load->model('caja_model');
            $this->load->model('parametros_model');
        }

        public function Recibos()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->TraeRecibos();
                $this->Params();
                $this->load->view('Caja/Recibos/Recibos', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function TraeRecibos()
        {
            $this->Data['Recibos'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#Recibo</th>
                                    <th>#Solicitud</th>
                                    <th>Deudor</th>
                                    <th>Documento</th>
                                    <th>Acreedor</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            foreach ($this->caja_model->TraeRecibos()->result() as $recibo)
            {
                $this->Data['Recibos'] .= '<tr>
                 <td  style="text-align: center;">' . $recibo->CONSECUTIVO_RECIBO . '</td>
                 <td  style="text-align: center;">' . $recibo->CONSECUTIVO_SOLICITUD . '</td>
                 <td>' . $recibo->NOMBRE_DEUDOR . '</td>
                 <td>' . $recibo->DOCUMENTO . '</td>
                 <td>' . $recibo->NOMBRE_ACREEDOR . '</td>
                 <td>' . number_format($recibo->VALOR, 0, '', ',') . '</td>
                 <td>' . date_format(new DateTime($recibo->FECHA), 'd/m/Y') . '</td>
                 <td style="text-align:center;">
                 <a href="verrecibo/' . $recibo->CONSECUTIVO_RECIBO . '" target="_blank" style="font-size:20pt;color:black" class="ion ion-android-print" data-toggle="tooltip" title="Inmprimir"></a>&nbsp;&nbsp;';
                if ($recibo->ANULADO == 0)
                {
                    $this->Data['Recibos'] .= '<a href="anularrecibo/' . $recibo->CONSECUTIVO_RECIBO . '" style="font-size:20pt;color:black" class="ion ion-close-circled" data-toggle="tooltip" title="Anular"></a>&nbsp;&nbsp;';
                }
                $this->Data['Recibos'] .= '</td></tr>';
            }
            $this->Data['Recibos'] .= '</tbody></table>';
        }

        public function InsertaRecibo()
        {
            $this->caja_model->InsertaRecibo($this->parametros_model->TraeConsecutivo('RECIBO'), $this->input->post('ID_SOLICITUD'));
        }

        public function AnularRecibo($id)
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->caja_model->AnularRecibo($id);
                redirect('caja/Recibos', 'refresh');
            }
            else redirect('inicio', 'refresh');
        }

        public function VerRecibo($Consecutivo)
        {
            $this->session->set_userdata(['ConsecutivoRecibo' => $Consecutivo]);
            redirect('ImprimeRecibo', 'refresh');
        }

        public function CrearRecibo()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->load->model('parametros_model');
                $this->Data['RECIBO'] = $this->parametros_model->TraeConsecutivo('RECIBO');
                $this->Solicitudes();
                $this->Params();
                $this->load->view('Caja/Recibos/CrearRecibo', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function CuadreDiario()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->Data['Consecutivo'] = $this->caja_model->TraeCuadreConsecutivo();
                $this->load->view('Caja/Informes/CuadreDiario', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function InformeDeudor()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Solicitudes();
                $this->Params();
                $this->load->view('Caja/Informes/InformeDeudor', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function InformeAcreedor()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->AcreedoresDropDown();
                $this->load->view('Caja/Informes/InformeAcreedor', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function ImprimeRecibo()
        {
            foreach ($this->caja_model->TraeInfoRecibo() as $info) ;
            $Empresa = $this->parametros_model->TraeInformacionEmpresa();
            $this->load->library('fpdf/pdf');
            $pdf = new PDF();
            $pdf->AddPage();
            $estado = '';
            if ($info->ANULADO == 1) $estado = 'Anulado';
            else if ($this->session->userdata('First') == '') $estado = 'Duplicado';
            if ($estado != '')
            {
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetXY(160, 3);
                $pdf->Cell(35, 6, $estado, 1, 0, 'C');
            }
            $pdf->SetFont('Arial', '', 9);
            $pdf->RoundedRect(10, 10, 190, 36, 10); #Rounded
            $pdf->Line(199, 40, 11, 40);
            $pdf->Text(40, 14, utf8_decode('Compra y Venta de Propiedad Raíz, Arrendamientos, Asesoría Jurídica, Dinero a Interés'));
            #Headers rows
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(30, 20, 'Fecha');
            $pdf->Text(28, 26, 'Deudor');
            $pdf->Text(25, 32, 'Acreedor');
            $pdf->Text(20, 38, utf8_decode('Direcc. Inmueble Hipotecado'));   #Dir inmueble label
            #Table
            $pdf->Text(22, 44, 'Item');
            $pdf->Text(70, 44, 'CONCEPTO');
            $pdf->Text(170, 44, 'VALOR');
            #Parameters
            $pdf->Text(140, 20, utf8_decode('Recibo Número'));
//            $pdf->Text(140, 26, 'Oficina');  #Oficina label
            $pdf->Text(150, 26, 'Ciudad');  #Ciudad label
            $pdf->Text(140, 32, 'Saldo actual');  #Saldo label
            $pdf->Text(140, 38, utf8_decode('Valor Préstamo'));  #Prestamo label
            $pdf->SetFont('Arial', '', 9);
            #End Headers
            #Parameters Values
            $pdf->Text(40, 20, date_format(new DateTime($info->FECHA), date('d/m/Y')));
            $pdf->Text(75, 20, $Empresa->DIRECCION . '  Tel. ' . substr($Empresa->TELEFONO, 0, 3) . ' ' . substr($Empresa->TELEFONO, 3, 2)
                . ' ' . substr($Empresa->TELEFONO, 5, 5 + strlen($Empresa->TELEFONO) - 5));
//            $pdf->Text(152, 26, strtoupper(utf8_decode('Principal')));#Oficina value
            $pdf->Text(162, 26, strtoupper(utf8_decode('Medellín')));#Ciudad value
            $pdf->Text(165, 32, number_format($info->CAPITAL_INICIAL - $info->ABONADO, 0, '', ','));#Saldo actual value
            $pdf->Text(65, 38, strtoupper(utf8_decode($info->DIR_INMUEBLE))); #Dir inmueble value
            $pdf->Text(165, 38, number_format($info->CAPITAL_INICIAL, 0, '', ',')); #Préstamo value
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(165, 16);
            $pdf->Cell(30, 5, $this->session->userdata('ConsecutivoRecibo'), 1, 0, 'C');
            #End Parameters
            $pdf->SetFont('Arial', '', 9);
            $pdf->Text(40, 26, number_format($info->DOCUMENTO_DEUDOR, 0, '', ',')); #Cedula Deudor
            $pdf->SetFont('Arial', 'IB', 9);
            $pdf->Text(62, 26, strtoupper(utf8_decode($info->NOMBRE_DEUDOR)) . ' Tel. ' . $info->TELEFONO); #Nombre Deudor
            $pdf->Text(62, 32, strtoupper(utf8_decode($info->NOMBRE_ACREEDOR))); #Nombre Acreedor
            $pdf->SetFont('Arial', '', 9);
            #Values Table
            $h = 6;
            $i = 0;
            $Total = 0;
            foreach ($this->caja_model->TraeRecibo() as $campo)
            {
                $Total += $campo->VALOR;
                $pdf->SetXY(10, 49 + $i * $h);
                $pdf->Cell(20, 6, ($i + 1), 1, 0, 'C');# Index
                $pdf->SetXY(30, 49 + $i * $h);
                $pdf->Cell(120, 6, utf8_decode($campo->CONCEPTO), 1, 0, 'L');# Concept
                $pdf->SetXY(150, 49 + $i * $h);
                $pdf->Cell(50, 6, number_format($campo->VALOR, 0, '', ','), 1, 0, 'C');# Value
                $i ++;
            }
            #TOTAL RECIBO
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(10, 52 + $i * $h);
            $pdf->Cell(140, 6, 'Total Recibo', 1, 0, 'L');# Total ticket
            $pdf->SetXY(150, 52 + $i * $h);
            $pdf->Cell(50, 6, number_format($Total, 0, '', ','), 1, 0, 'C');# Value Total
            $i ++;
            #LEYEND
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(10, 55 + $i * $h);
            $pdf->Cell(140, 12, '', 1, 0, 'L');
            $pdf->Text(13, 60 + $i * $h, 'Pago'); #Pago Label
            $pdf->Text(50, 60 + $i * $h, 'Banco'); #Banco Label
            $pdf->Text(100, 60 + $i * $h, 'Nro'); #N° Cheque Label
            $pdf->SetFont('Arial', '', 9);
            #Values
            $pdf->Text(22, 60 + $i * $h, $info->CHEQUE != '' ? utf8_decode('Consignación') : 'Efectivo'); #Pago value
            $pdf->Text(61, 60 + $i * $h, $info->CHEQUE != '' ? utf8_decode($info->BANCO) : ''); #Banco value
            $pdf->Text(106, 60 + $i * $h, $info->CHEQUE); #N° Cheque value
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Text(30, 65 + $i * $h, utf8_decode('POR FAVOR PRESENTE ESTE RECIBO EN EL PRÓXIMO PAGO')); #Aviso
            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(150, 55 + $i * $h);
            $pdf->Cell(50, 12, '', 1, 0, 'C');
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(150, 55 + $i * $h);
            $pdf->Cell(50, 6, 'Elaborado Por', 0, 0, 'C');# Made by
            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(150, 60 + $i * $h);
            $pdf->Cell(50, 6, strtoupper(utf8_decode($info->NOMBRE_USUARIO)), 0, 0, 'C');# Made by
            ##unsetting Firts for the duplicate check
            $this->session->set_userdata(['First' => '']);
            $pdf->Output();
            $pdf->Cell($pdf->PageNo());
        }

        public function ImprimeInformeDeudor()
        {
            if (empty($_POST) || !$this->session->userdata('ID_USUARIO')) redirect('inicio', 'refresh');
            foreach ($this->caja_model->TraeSolicitud($this->input->post('ID_SOLICITUD'))->result() as $solicitud) ;
            $this->load->library('fpdf/pdf');
            $pdf = new PDF();
            $pdf->AddPage();
            $r = 0;
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->SetXY(24, 18);
            $pdf->Cell(50, 6, 'INFORME DEL DEUDOR', 0, 0, 'C');
            $pdf->Ln(8);
            $pdf->SetFont('Arial', 'B', 10);
            #Deudor
            $pdf->SetX(20);
            $pdf->Cell(85, 6, 'DEUDOR', 1, 0, 'L');
            $pdf->Cell(85, 6, strtoupper(utf8_decode($solicitud->NOMBRE_DEUDOR)), 1, 0, 'R');
            $pdf->SetFont('Arial', '', 9);
            #Cedula No
            $pdf->SetXY(20, 32);
            $pdf->Cell(85, 6, 'CEDULA No', 1, 0, 'L');
            $pdf->Cell(85, 6, number_format($solicitud->DOCUMENTO_DEUDOR, 0, '', ','), 1, 0, 'R');
            #Direccion Inmueble
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('DIRECCIÓN'), 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->DIRECCION_DEUDOR, 1, 0, 'R');
            #Acreedor
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, 'ACREEDOR', 1, 0, 'L');
            $pdf->Cell(85, 6, strtoupper(utf8_decode($solicitud->NOMBRE_ACREEDOR)), 1, 0, 'R');
            #Escritura Nro
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, 'ESCRITURA No', 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->NUMERO_ESCRITURA, 1, 0, 'R');
            #Tipo Hipoteca
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, 'TIPO HIPOTECA', 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->TIPO_HIPOTECA, 1, 0, 'R');
            #Notaria
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('NOTARÍA'), 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->NUMERO_NOTARIA, 1, 0, 'R');
            #FECHA CONSTITUCIÓN
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('FECHA CONSTITUCIÓN'), 1, 0, 'L');
            $pdf->Cell(85, 6, MesNombreAbr(round(date_format(new DateTime($solicitud->FECHA_CONSTITUCION), 'm'))) . date_format(new DateTime($solicitud->FECHA_CONSTITUCION), ' d/y'), 1, 0, 'R');
            #M.I No
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, 'M.I No', 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->MATRICULA, 1, 0, 'R');
            #Direccion Inmueble
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('DIRECCIÓN INMUEBLE'), 1, 0, 'L');
            $pdf->Cell(85, 6, $solicitud->DIRECCION_INMUEBLE, 1, 0, 'R');
            #Blank
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, '', 1, 0, 'L');
            $pdf->Cell(85, 6, '', 1, 0, 'R');
            $pdf->SetFont('Arial', 'B', 9);
            #Capital
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, 'CAPITAL', 1, 0, 'L');
            $pdf->Cell(85, 6, number_format($solicitud->CAPITAL_INICIAL, 0, '', ','), 1, 0, 'R');
            $pdf->SetFont('Arial', '', 9);
            #----------------------------------------#
            $Vals = $this->caja_model->InteresesPagadosDeudor();
            $Mesinicio = round(date_format(new DateTime($solicitud->FECHA_INICIO), 'm'));
            $Diainicio = date_format(new DateTime($solicitud->FECHA_INICIO), 'd');
            $Anoinicio = date_format(new DateTime($solicitud->FECHA_INICIO), 'y');
            $Anofin = $Anoinicio;
            if ($Vals['MESES'] > 0)
            {
                $Mesfin = $Vals['MESES'] + $Mesinicio;
                if ($Mesfin > 12)
                {
                    $Mesfin -= 12;
                    $Anofin ++;
                }
                if ($Diainicio - 1 == 0) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                else if ($Diainicio - 1 > date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/))) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                else $Diafin = $Diainicio - 1;
                $int = 'PAGA INT DE ' . MesNombreAbr($Mesinicio) . ' ' . $Diainicio . '/' . $Anoinicio . ' A ' . MesNombreAbr($Mesfin) . ' ' . $Diafin . '/' . $Anofin;
                #INTERESES PAGADOS
                $pdf->SetXY(20, 32 + ++ $r * 6);
                $pdf->Cell(85, 6, $int, 1, 0, 'L');
                $pdf->Cell(85, 6, number_format($Vals['TOTAL'], 0, '', ','), 1, 0, 'R');
            }
            #-----------------------DEBE INT--------------------------
            $Mes = $Mesfin = $Vals['MESES'] + $Mesinicio;
            if ($Mes > 12)
            {
                $Mes -= 12;
                $Mesfin = $Mes;
                $Anofin++;
            }
            if ($Diainicio - 1 == 0) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
            else if ($Diainicio - 1 > date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/))) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
            else $Diafin = $Diainicio - 1;
            $diain = $Diainicio > date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/)) ? date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/)) : $Diainicio;
            $debeInt = 'DEBE INT DE ' . MesNombreAbr($Mes > 12 ? 12 - $Mes : $Mes) . ' ' . $diain . '/' . $Anofin . ' A ';
            for ($p = 0; strtotime('now') > strtotime($Anofin . '-' . $Mesfin . '-' . $Diafin) && strtotime($Anofin . '-' . $Mesfin . '-' . $Diafin) < strtotime($solicitud->FECHA_FIN); $p ++)
            {
                $Mesfin ++;
                if ($Mesfin > 12)
                {
                    $Mesfin = 1;
                    $Anofin ++;
                }
                if ($Diainicio - 1 == 0) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                else if ($Diainicio - 1 > date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/))) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                else $Diafin = $Diainicio - 1;
            }
            if ($p > 0)
            {
                $debeInt .= MesNombreAbr($Mesfin) . ' ' . $Diafin . '/' . $Anofin;
                #DEBE INTERESES
                $pdf->SetXY(20, 32 + ++ $r * 6);
                $pdf->Cell(85, 6, $debeInt, 1, 0, 'L');
                $pdf->Cell(85, 6, number_format($p * ($solicitud->CAPITAL_INICIAL - $solicitud->ABONADO) * ($solicitud->INTERES_MENSUAL / 100), 0, '', ','), 1, 0, 'R');
            }
            #-----------------------------------------------------------
            #COMISIÓN
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('COMISIÓN SEP 27/14'), 1, 0, 'L');
            $pdf->Cell(85, 6, number_format('600000', 0, '', ','), 1, 0, 'R');
            #AMPLIACIÓN
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('AMPLIACIÓN A SEP 27/14'), 1, 0, 'L');
            $pdf->Cell(85, 6, number_format('1200000', 0, '', ','), 1, 0, 'R');
            #TOTAL ADEUDADO
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, utf8_decode('TOTAL ADEUDADO A FEB 15/15'), 1, 0, 'L');
            $pdf->Cell(85, 6, number_format('4097000', 0, '', ','), 1, 0, 'R');
            #Blank
            $pdf->SetXY(20, 32 + ++ $r * 6);
            $pdf->Cell(85, 6, '', 1, 0, 'L');
            $pdf->Cell(85, 6, '', 1, 0, 'R');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Text(90, 40 + ++ $r * 6, utf8_decode('Preparado por ' . ucwords(strtolower($this->session->userdata('NOMBRE_USUARIO')))
                . ' en ' . MesNombreAbr(round(date('m'))) . date(' d/y')));
            $pdf->Output();
            $pdf->Cell($pdf->PageNo());
        }

        public function ImprimeInformeAcreedor()
        {
            if (empty($_POST) || !$this->session->userdata('ID_USUARIO')) redirect('inicio', 'refresh');
            $this->load->library('fpdf/pdf');
            $pdf = new PDF();
            $pdf->AddPage();
            $hheader = 20;
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Ln();
            #ENCABEZADO
            $pdf->Cell(190, 6, utf8_decode('INFORME ' . strtoupper($this->caja_model->TraeNombreAcreedor())), 0, 0, 'C');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetXY(5, $hheader);
            $pdf->Cell(50, 6, 'DEUDOR', 1, 0, 'C');
            $pdf->SetXY(55, $hheader);
            $pdf->Cell(50, 6, 'PERIODO DE PAGO', 1, 0, 'C');
            $pdf->SetXY(105, $hheader);
            $pdf->Cell(20, 6, 'RCBO', 1, 0, 'C');
            $pdf->SetXY(125, $hheader);
            $pdf->Cell(25, 6, 'VALOR', 1, 0, 'C');
            $pdf->SetXY(150, $hheader);
            $pdf->Cell(6, 6, '%', 1, 0, 'C');
            $pdf->SetXY(156, $hheader);
            $pdf->Cell(20, 6, 'ADMON', 1, 0, 'C');
            $pdf->SetXY(176, $hheader);
            $pdf->Cell(30, 6, 'TOTAL', 1, 0, 'C');
            #VALORES
            $pdf->SetFont('Arial', '', 9);
            $i = 0;
            $Total = 0;
            foreach ($this->caja_model->TraeMovimientosDeudores() as $informe)
            {
                #--------------------Calculo-----------------------#
                $Pago = '';
                switch ($informe->TIPO_MOV)
                {
                    case 0:
                        $Pago = 'ABONO A CAPITAL';
                        break;
                    case 1:
                        $Mesinicio = round(date_format(new DateTime($informe->FECHA_INICIO), 'm'));
                        $Diainicio = date_format(new DateTime($informe->FECHA_INICIO), 'd');
                        $Anoinicio = date_format(new DateTime($informe->FECHA_INICIO), 'Y');
                        $Mes = $informe->DESCRIPCION + $Mesinicio - 1;
                        $Anofin = $Anoinicio;
                        $Mesfin = $Mes + 1;
                        if ($Mesfin > 12)
                        {
                            $Mesfin = 1;
                            $Anofin ++;
                        }
                        if ($Diainicio - 1 == 0) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                        else if ($Diainicio - 1 > date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/))) $Diafin = date("t", mktime(0, 0, 0, $Mesfin/*mes*/, 1, $Anofin /*año*/));
                        else $Diafin = $Diainicio - 1;
                        $Pago = $Diainicio . '/' . $Mesinicio . '/' . $Anoinicio . ' A ' . $Diafin . '/' . $Mesfin . '/' . $Anofin;
                        break;
                }
                #---------------------------------------------------#
                #Deudor
                $pdf->SetXY(5, 26 + 6 * $i);
                $pdf->Cell(50, 6, ucwords(utf8_decode($informe->NOMBRE_DEUDOR)), 1, 0, 'C');
                #Periodo pago
                $pdf->SetXY(55, 26 + 6 * $i);
                $pdf->Cell(50, 6, $Pago, 1, 0, 'C');
                #RCBO
                $pdf->SetXY(105, 26 + 6 * $i);
                $pdf->Cell(20, 6, $informe->CONSECUTIVO, 1, 0, 'C');
                #Valor
                $pdf->SetXY(125, 26 + 6 * $i);
                $pdf->Cell(25, 6, number_format($informe->VALOR, 0, '', ','), 1, 0, 'C');
                #%
                $pdf->SetXY(150, 26 + 6 * $i);
                $pdf->Cell(6, 6, $informe->ADMINISTRACION . '%', 1, 0, 'C');
                #ADMON
                $Admin = $informe->ADMINISTRACION * ($informe->VALOR / 100);
                $pdf->SetXY(156, 26 + 6 * $i);
                $pdf->Cell(20, 6, number_format($Admin, 0, '', ','), 1, 0, 'C');
                #TOTAL
                $Total += $informe->VALOR - $Admin;
                $pdf->SetXY(176, 26 + 6 * $i);
                $pdf->Cell(30, 6, number_format($informe->VALOR - $Admin, 0, '', ','), 1, 0, 'C');
                $i ++;
            }
            #---------------------------------------Blank-----------------------------#
            $pdf->SetXY(5, 26 + 6 * $i);
            $pdf->Cell(50, 6, '', 1, 0, 'C');
            $pdf->SetXY(55, 26 + 6 * $i);
            $pdf->Cell(50, 6, '', 1, 0, 'C');
            $pdf->SetXY(105, 26 + 6 * $i);
            $pdf->Cell(20, 6, '', 1, 0, 'C');
            $pdf->SetXY(125, 26 + 6 * $i);
            $pdf->Cell(25, 6, '', 1, 0, 'C');
            $pdf->SetXY(150, 26 + 6 * $i);
            $pdf->Cell(6, 6, '', 1, 0, 'C');
            $pdf->SetXY(156, 26 + 6 * $i);
            $pdf->Cell(20, 6, '', 1, 0, 'C');
            $pdf->SetXY(176, 26 + 6 * $i);
            $pdf->Cell(30, 6, '', 1, 0, 'C');
            $i ++;
            #---------------------------------------------------------------------------#
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(55, 26 + 6 * $i);
            $pdf->Cell(101, 6, 'TOTAL CUADRE', 1, 0, 'C');
            #VALOR
            $pdf->SetXY(156, 26 + 6 * $i);
            $pdf->Cell(50, 6, number_format($Total, 0, '', ','), 1, 0, 'C');
            $i ++;
            #------------------ENTREGADO--------------------#
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(55, 26 + 6 * $i);
            $pdf->Cell(101, 6, 'TOTAL ENTREGADO', 1, 0, 'C');
            #VALOR
            $pdf->SetXY(156, 26 + 6 * $i);
            $pdf->Cell(50, 6, number_format($Total, 0, '', ','), 1, 0, 'C');
            #------------------------------------------------------#
            $pdf->Output();
            $pdf->Cell($pdf->PageNo());
        }

        public function ImprimeCuadreDiario()
        {
            if (empty($_POST) || !$this->session->userdata('ID_USUARIO')) redirect('inicio', 'refresh');
            $this->load->library('fpdf/pdf');
            $pdf = new PDF();
            $pdf->AddPage();
            #Guarda EL Nro
            $this->caja_model->ActualizarCuadreConsecutivo();
            $hheader = 20;
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Ln();
            #ENCABEZADO
            $pdf->Cell(190, 6, 'CUADRE DIARIO', 0, 0, 'C');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetXY(40, $hheader);
            $pdf->Cell(30, 6, 'RECIBO', 1, 0, 'C');
            $pdf->SetXY(70, $hheader);
            $pdf->Cell(30, 6, 'VALOR', 1, 0, 'C');
            $pdf->SetXY(100, $hheader);
            $pdf->Cell(10, 6, '%', 1, 0, 'C');
            $pdf->SetXY(110, $hheader);
            $pdf->Cell(30, 6, 'ADMON', 1, 0, 'C');
            $pdf->SetXY(140, $hheader);
            $pdf->Cell(30, 6, utf8_decode('COMISIÓN'), 1, 0, 'C');
            #VALORES
            $pdf->SetFont('Arial', '', 11);
            $i = 0;
            $TotalAdmin = 0;
            $TotalComision = 0;
            foreach ($this->caja_model->TraeCuadreDiario() as $informe)
            {
                #RECIBO
                $pdf->SetXY(40, 26 + 6 * $i);
                $pdf->Cell(30, 6, $informe->CONSECUTIVO, 1, 0, 'C');
                #Valor
                $pdf->SetXY(70, 26 + 6 * $i);
                $pdf->Cell(30, 6, '$', 0, 0, 'L');
                $pdf->SetXY(70, 26 + 6 * $i);
                $pdf->Cell(30, 6, number_format($informe->VALOR, 0, '', ','), 1, 0, 'R');
                #%
                $comision = '';
                if ($informe->TIPO_MOV == 0)
                {
                    $ptge = "0";
                    $admin = '-';
                }
                else if ($informe->TIPO_MOV == 4)
                {
                    $ptge = '30';
                    $admin = '-';
                    $comision = $informe->VALOR * .3;
                    $TotalComision += $comision;
                }
                else
                {
                    $ptge = $informe->CUOTA_ADMINISTRACION;
                    $admin = $informe->VALOR * ($informe->CUOTA_ADMINISTRACION / 100);
                    $TotalAdmin += $admin;
                }
                $pdf->SetXY(100, 26 + 6 * $i);
                $pdf->Cell(10, 6, '' . $ptge . '%', 1, 0, 'C');
                #ADMON
                $pdf->SetXY(110, 26 + 6 * $i);
                $pdf->Cell(30, 6, ($admin == '-' ? '- ' : number_format($admin, 0, '', ',')), 1, 0, 'R');
                $pdf->SetXY(110, 26 + 6 * $i);
                $pdf->Cell(30, 6, '$', 1, 0, 'L');
                #COMISION
                $pdf->SetXY(140, 26 + 6 * $i);
                $pdf->Cell(30, 6, ($comision == '' ? '' : number_format($comision, 0, '', ',')), 1, 0, 'R');
                if ($comision != '')
                {
                    $pdf->SetXY(140, 26 + 6 * $i);
                    $pdf->Cell(30, 6, '$', 1, 0, 'L');
                }
                $i ++;
            }
            #---------------------------------------Blank-----------------------------#
            $pdf->SetXY(40, 26 + 6 * $i);
            $pdf->Cell(30, 6, 'TOTAL', 1, 0, 'C');
            $pdf->SetXY(70, 26 + 6 * $i);
            $pdf->Cell(30, 6, '', 1, 0, 'C');
            $pdf->SetXY(100, 26 + 6 * $i);
            $pdf->Cell(10, 6, '', 1, 0, 'C');
            $pdf->SetXY(110, 26 + 6 * $i);
            $pdf->Cell(30, 6, number_format($TotalAdmin, 0, '', ','), 1, 0, 'R');
            $pdf->SetXY(110, 26 + 6 * $i);
            $pdf->Cell(30, 6, '$', 0, 0, 'L');
            $pdf->SetXY(140, 26 + 6 * $i);
            $pdf->Cell(30, 6, number_format($TotalComision, 0, '', ','), 1, 0, 'R');
            $pdf->SetXY(140, 26 + 6 * $i);
            $pdf->Cell(30, 6, '$', 0, 0, 'L');
            $i ++;
            #---------------------------------------------------------------------------#
            $pdf->SetFont('Arial', 'b', 10);
            $pdf->Text(50, 32 + 6 * $i, utf8_decode('CUADRE N° ' . $this->input->post('NRO')));
            $pdf->Text(95, 32 + 6 * $i, 'TOTAL ENTREGADO');
            $pdf->Text(150, 32 + 6 * $i, number_format($TotalComision + $TotalAdmin, 0, '', ','), 1, 0, 'R');
            $pdf->Text(70, 40 + 6 * $i, 'REALIZADO POR ' . strtoupper($this->session->userdata('NOMBRE_USUARIO')) . ' ' . date('d/m/Y'));
            #------------------------------------------------------#
            $pdf->Output();
            $pdf->Cell($pdf->PageNo());
        }

        public function Solicitudes()
        {
            $solicitudes = $this->caja_model->TraeSolicitudes()->result();
            $this->Data['Solicitudes'] = '<option value="0">--Seleccione una solicitud--</option>';
            foreach ($solicitudes as $solicitud)
            {
                $this->Data['Solicitudes'] .= '<option value="' . $solicitud->ID_SOLICITUD . '">#' . $solicitud->SOLICITUD . ' - ' .
                    $solicitud->DOCUMENTO_DEUDOR . ' - ' . $solicitud->NOMBRE_DEUDOR . '</option>';
            }
        }

        public function PagosTemporales()
        {
            switch ($this->input->post('action'))
            {
                case 'traer':
                    echo $this->TablaTemp();
                    break;
                case 'agregar':
                    $this->caja_model->InsertaPagoTemp($this->input->post('TIPO_RECIBO'));
                    echo $this->TablaTemp();
                    break;
                case 'eliminar':
                    $this->caja_model->EliminaPagoTemp();
                    echo $this->TablaTemp();
                    break;
            }
        }

        private function TablaTemp()
        {
            $tabla = '<div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header" style="background: #868588"><h4 style=";color: #ffffff;text-align: center;">Pagos pendientes</h4></div>
                            <!-- /.box-header -->
                            <div id="inmuebles" class="box-body no-padding">';
            $tabla .= '<table class="table table-striped" border="0" id="tpagos">
                                <thead><tr>
                                    <th style="text-align: center;">Tipo recibo</th>
                                    <th style="text-align: center;">Concepto</th>
                                    <th style="text-align: center;">Valor</th>
                                    <th style="text-align: center;">Acción</th>
                              </tr></thead><tbody>';
            $c = 1;
            $Total = 0;
            foreach ($this->caja_model->TraePagosTemp($this->input->post('IdSol')) as $pago)
            {
                $tabla .= '<tr style="text-align: center;">

                                    <td>' . $pago->TIPO_ESCRITO . '</td>
                                    <td>' . $pago->CONCEPTO . '</td>
                                    <td>' . number_format($pago->VALOR, 0, '', ',') . '</td>
                                  <td><a onclick="eliminarpago(' . $pago->ID_PAGO_TEMP . ');" style="cursor:pointer; color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar pago"></a> </td> </tr>';
                $c ++;
                $Total += $pago->VALOR;
            }
            if ($c == 1)
            {
                $tabla .= '<tr><td style="text-align: center;" colspan="6">No se encontraron pagos temporales de esta solicitud...</td></tr>';
            }
            else
            {
                $tabla .= '<tr><td style="font-weight: bold;text-align: right;" colspan="2">Total:</td><td style="text-align: center;font-weight: bold">' . number_format($Total, 0, '', ',') . '</td><td></td></tr>';
            }
            $tabla .= '</tbody></table>
                                 </div>
                            <!-- /.box-body -->
                        </div>
                    </div
                </div>';
            return $tabla;
        }

        public function Clientes()
        {
            $clientes = $this->caja_model->Clientes()->result();
            foreach ($clientes as $cliente)
            {
                ##Datos
                $Data['Datos']['Clientes'] = '<h3 style="text-align: center;color:#b00000;"><span class="ion ion-ios-person"></span> Deudor
                </h3>
                <hr style="border: 1px solid #b00000;"/>
                     <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre:</label>

                    <div class="col-lg-6">
                        <input type="text" class="form-control"
                           value="' . $cliente->NOMBRE_DEUDOR . '">
                    </div>
                            <label class="col-lg-1 control-label">CC:</label>
                        <div class="col-lg-3">
                        <input type="text" class="form-control" style="text-align:center;"
                           value="' . $cliente->DOCUMENTO_DEUDOR . '" >
                    </div>
                </div>

                 <h3 style="text-align: center;color:#0000c0;"><span class="ion ion-ios-person"></span> Acreedor
                </h3>
                <hr style="border: 1px solid #0000c0;"/>
                     <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre:</label>

                    <div class="col-lg-6">
                        <input type="text" class="form-control"
                           value="' . $cliente->NOMBRE_ACREEDOR . '">
                    </div>
                            <label class="col-lg-1 control-label">CC:</label>
                        <div class="col-lg-3">
                        <input type="text" class="form-control" style="text-align:center;"
                           value="' . $cliente->DOCUMENTO_ACREEDOR . '" >
                    </div>
                </div>';
                ##Pie Chart
                $Data['ChartPagos']['ABONO_INTERES'] = $cliente->ABONO_INTERES;
                $Data['ChartPagos']['ABONADO'] = $cliente->ABONADO;
                $Data['ChartPagos']['CAPITAL_INICIAL'] = $cliente->CAPITAL_INICIAL;
                $Data['ChartPagos']['Pie'] = '                <!-- DONUT CHART -->
                <div class="box-body chart-responsive">
                    <div class="chart" id="pagos" style="height: 180px; position: relative;"></div>
                </div><!-- /.box-body -->';
                ##Estadísticas
                $Data['Estadisticas'] = '<div style="margin-top: 30px;"> <span style="font-size:12pt;color: lightslategrey">Porcentaje del pago de la deuda: <span  style="font-weight: bold;color: limegreen">' . number_format(($cliente->ABONADO / $cliente->CAPITAL_INICIAL) * 100, 2, ',', '') . '%</span></span></div>';
                $Data['Estadisticas'] .= '<div style="margin-top: 10px;"> <span style="font-size:12pt;color: lightslategrey">Capital restante: <span  style="font-weight: bold;color: limegreen">$ ' . number_format($cliente->CAPITAL_INICIAL - $cliente->ABONADO, 0, '', ',') . '</span></span></div>';
                $Data['Estadisticas'] .= '<div style="margin-top: 10px;"> <span style="font-size:12pt;color: lightslategrey">Total abonado al capital: <span  style="font-weight: bold;color: limegreen">$ ' . number_format($cliente->ABONADO, 0, '', ',') . '</span></span></div>';
                $Data['Estadisticas'] .= '<div style="margin-top: 10px;"> <span style="font-size:12pt;color: lightslategrey">Total suma de intereses: <span  style="font-weight: bold;color: limegreen">$ ' . number_format($cliente->ABONO_INTERES, 0, '', ',') . '</span></span></div>';
                ##Abonos
                $Data['Abonos'] = '<div style="margin-top: 20px;">';
                $n = 0;
                foreach ($this->caja_model->TraeAbonos($this->input->post('IdSol')) as $abono)
                {
                    $n ++;
                    $Data['Abonos'] .= '<div style="text-align: center;float: left;width: 60px;margin-left: 40px;">
                          <span style="font-weight:bold;">#' . ($abono->CONSECUTIVO) . '</span>
                         <img draggable="false" src="' . base_url('public/images/extras/bag-money.png') . '">
                         <span style="color:green;font-weight:bold;">' . number_format($abono->ABONADO, 0, '', ',') . '</span><br>
                        <span style="font-weight:bold;">' . date_format(new DateTime($abono->FECHA), 'd/m/Y') . '</span></div>';
                }
                if ($n != 0)
                    $Data['Abonos'] .= '</div>';
                else  $Data['Abonos'] = '<span style="font-weight:bold;font-size: 12pt;color:#1B7E5A">No se han encontrado abonos de este deudor...</span>';
                ##Intereses
                $Data['Intereses'] = '';
                $Meses = floor((strtotime($cliente->FECHA_FIN) - strtotime($cliente->FECHA_INICIO)) / 2592000);
                $Valor = ($cliente->CAPITAL_INICIAL - $cliente->ABONADO) * ($cliente->INTERES_MENSUAL / 100);
                $fecha_dia = round(date_format(new DateTime($cliente->FECHA_INICIO), 'd'));
                $fecha_mes = round(date_format(new DateTime($cliente->FECHA_INICIO), 'm'));
                $fecha_ano = date_format(new DateTime($cliente->FECHA_INICIO), 'Y');
                $Data['Intereses'] = '<table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="text-align:center;color:#1B7E5A">#</th>
                                    <th style="text-align:center;color:#1B7E5A">Valor</th>
                                    <th style="text-align:center;color:#1B7E5A">Concepto</th>
                                    <th style="text-align:center;color:#1B7E5A">Estado</th>';
                if ($this->input->post('Tipo') == 0)
                    $Data['Intereses'] .= '<th style="text-align:center;color:#1B7E5A">Acción</th>';
                $Data['Intereses'] .= '</tr>
                                </thead>
                                <tbody></tbody>';
                $intereses = [];
                $valores = [];
                $conceptos = [];
                foreach ($this->caja_model->TraeInteresPago()->result() as $interes)
                {
                    array_push($intereses, [$interes->DESCRIPCION]);
                    array_push($valores, [$interes->VALOR]);
                    array_push($conceptos, [$interes->CONCEPTO]);
                }
                $fecha_mes2 = $fecha_mes;
                $fecha_ano2 = $fecha_ano;
                for ($i = 1; $i <= $Meses; $i ++)
                {
                    $fecha_mes2 ++;
                    if ($fecha_mes2 > 12)
                    {
                        $fecha_mes2 = 1;
                        $fecha_ano2 ++;
                    }
                    //Mes desde
                    if ($fecha_dia > date("t", mktime(0, 0, 0, $fecha_mes/*mes*/, 1, $fecha_ano /*año*/)))
                        $dia = date("t", mktime(0, 0, 0, $fecha_mes/*mes*/, 1, $fecha_ano /*año*/));
                    else $dia = $fecha_dia;
                    //Mes hasta
                    if ($fecha_dia - 1 == 0) $dia_2 = date("t", mktime(0, 0, 0, $fecha_mes2/*mes*/, 1, $fecha_ano2 /*año*/));
                    else if ($fecha_dia - 1 > date("t", mktime(0, 0, 0, $fecha_mes2/*mes*/, 1, $fecha_ano2 /*año*/))) $dia_2 = date("t", mktime(0, 0, 0, $fecha_mes2/*mes*/, 1, $fecha_ano2 /*año*/));
                    else $dia_2 = $fecha_dia - 1;
                    #Buscando anteriores pagos de intereses
                    $num = 0;
                    $valor = 0;
                    $concepto = 0;
                    $pagado = '';
                    if ($this->input->post('Tipo') == 0)
                    {
                        $accion = '<td style="text-align:center;"><input type="checkbox"></td></tr>';
                        $pagado = '<td style="text-align:center;"><input type="checkbox" checked disabled></td></tr>';
                    }
                    else $accion = '';
                    for ($h = 0; $h < count($intereses); $h ++)
                    {
                        if (in_array($i, $intereses[$h]))
                        {
                            $num = $intereses[$h][0];
                            $valor = $valores[$h][0];
                            $concepto = $conceptos[$h][0];
                            break;
                        }
                    }
                    $Data['Intereses'] .= '<tr>
                         <td style="text-align:center;">' . $i . '</td>
                         <td style="text-align:center;">' . number_format($valor == 0 ? $Valor : $valor, 0, '', ',') . '</td>';
                    if ($num == 0)
                    {
                        $Data['Intereses'] .= '<td spellcheck="false" contenteditable="true" style="text-align:center;">INTERESES DE ' . $dia . '-' . MesNombreAbr($fecha_mes) . '-' . $fecha_ano . ' A ' . $dia_2 . '-' . MesNombreAbr($fecha_mes2) . '-' . $fecha_ano2 . '</td>';
                    }
                    else
                        $Data['Intereses'] .= '<td style="text-align:center;">' . $concepto . '</td>';
                    if ($num != 0)
                    {
                        $Data['Intereses'] .= '<td style="text-align:center;background: #1B7E5A;"><span style="font-weight: bold;color:white;">Pagado</span></td>';
                        $Data['Intereses'] .= $pagado;
                    }
                    else if (strtotime('now') > strtotime($fecha_ano2 . '-' . $fecha_mes2 . '-' . $dia_2))
                    {
                        $Data['Intereses'] .= '<td style="text-align:center;background: #c10000;"><span style="font-weight: bold;color:white;">En mora</span></td>';
                        $Data['Intereses'] .= $accion;
                    }
                    else
                    {
                        $Data['Intereses'] .= '<td style="text-align:center;background: #0062cc;"><span style="font-weight: bold;color:white;">Sin pagar</span></td>';
                        $Data['Intereses'] .= $accion;
                    }
                    $fecha_mes ++;
                    if ($fecha_mes > 12)
                    {
                        $fecha_mes = 1;
                        $fecha_ano ++;
                    }
                }
                $Data['Intereses'] .= '</body></table>';
                echo json_encode($Data);
            }
            echo '';
        }

        public function AcreedoresDropDown()
        {
            $this->Data['Acreedores'] = '<option value="0">--Seleccione un acreedor---</option>';
            foreach ($this->clientes_model->TraeAcreedores()->result() as $acreedor)
            {
                $this->Data['Acreedores'] .= '<option value="' . $acreedor->ID_ACREEDOR . '">' . $acreedor->DOCUMENTO . ' - ' . $acreedor->NOMBRE_ACREEDOR . '</option>';
            }
        }

        public function Deudores($id = - 1)
        {
            $sel = $id == - 1 ? 'selected' : '';
            $this->Data['Deudores'] = '<option value="0" ' . $sel . '>--Seleccione un deudor---</option>';
            foreach ($this->clientes_model->TraeDeudores()->result() as $deudor)
            {
                if ($deudor->ID_DEUDOR == $id)
                    $this->Data['Deudores'] .= '<option value="' . $deudor->ID_DEUDOR . '" selected>' . $deudor->DOCUMENTO . ' - ' . $deudor->NOMBRE_DEUDOR . '</option>';
                else $this->Data['Deudores'] .= '<option value="' . $deudor->ID_DEUDOR . '">' . $deudor->DOCUMENTO . ' - ' . $deudor->NOMBRE_DEUDOR . '</option>';
            }
        }

        public function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
        }
    }