<?php if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

    class Hipoteca extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('clientes_model');
            $this->load->model('hipotecas_model');
        }

        public function CrearSolicitud()
        {
            if($this->session->can('administrar_solicitudes'))
            {
                $this->load->model('parametros_model');
                $this->Data['Solicitud'] = $this->parametros_model->TraeConsecutivo('SOLICITUD');
                $this->Clientes();
                $this->Params();
                $this->load->view('Hipotecas/Solicitudes/CrearSolicitud', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function CrearInmueble()
        {
            if($this->session->can('administrar_inmuebles'))
            {
                $this->Deudores();
                $this->Ciudades();
                $this->Params();
                $this->load->view('Hipotecas/Inmuebles/CrearInmueble', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function InsertaSolicitud()
        {
            $this->hipotecas_model->InsertaSolicitud();
        }

        public function InsertaInmueble()
        {
            $this->hipotecas_model->InsertaInmueble();
        }

        public function Inmuebles()
        {
            if($this->session->can('administrar_inmuebles'))
            {
                $this->TraeInmuebles();
                $this->Params();
                $this->load->view('Hipotecas/Inmuebles/Inmuebles', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function Solicitudes()
        {
            if($this->session->can('administrar_solicitudes'))
            {
                $this->TraeSolicitudes();
                $this->Params();
                $this->load->view('Hipotecas/Solicitudes/Solicitudes', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function Clientes()
        {
            $this->Deudores();
            $acreedores = $this->clientes_model->TraeAcreedores();
            $this->Data['Acreedores'] = '<option value="0">--Seleccione un acreedor---</option>';
            foreach ($acreedores->result() as $acreedor)
            {
                $this->Data['Acreedores'] .= '<option value="' . $acreedor->ID_ACREEDOR . '">' . $acreedor->DOCUMENTO . ' - ' . $acreedor->NOMBRE_ACREEDOR . '</option>';
            }
        }

        public function VerInmueble($Id)
        {
            if($this->session->can('administrar_inmuebles'))
            {
                $this->Params();
                $this->Data['Info'] = $this->hipotecas_model->TraeInmueble($Id);
                if($this->Data['Info'] != null)
                {
                    $this->load->view('Hipotecas/Inmuebles/VerInmueble', $this->Data);
                }
                else
                {
                    redirect(site_url(), 'refresh');
                }
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function VerSolicitud($Id)
        {
            if($this->session->can('administrar_solicitudes'))
            {
                $this->Params();
                $this->Data['Info'] = $this->hipotecas_model->TraeSolicitud($Id);
                $this->Data['Pagares'] = $this->hipotecas_model->TraePagares($Id);
                if($this->Data['Info'] != null)
                {
                    $this->TraeInmuebleSolicitud();
                    $this->load->view('Hipotecas/Solicitudes/VerSolicitud', $this->Data);
                }
                else
                {
                    redirect(site_url(), 'refresh');
                }
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function Deudores($id = -1)
        {
            $sel = $id == -1 ? 'selected' : '';
            $this->Data['Deudores'] = '<option value="0" ' . $sel . '>--Seleccione un deudor---</option>';
            $deudores = $this->clientes_model->TraeDeudores();
            foreach ($deudores->result() as $deudor)
            {
                if($deudor->ID_DEUDOR == $id)
                {
                    $this->Data['Deudores'] .= '<option value="' . $deudor->ID_DEUDOR . '" selected>' . $deudor->DOCUMENTO . ' - ' . $deudor->NOMBRE_DEUDOR . '</option>';
                }
                else
                {
                    $this->Data['Deudores'] .= '<option value="' . $deudor->ID_DEUDOR . '">' . $deudor->DOCUMENTO . ' - ' . $deudor->NOMBRE_DEUDOR . '</option>';
                }
            }
        }

        private function Ciudades($Id = 1)
        {
            $ciudades = $this->clientes_model->TraeCiudades();
            $this->Data['Ciudades'] = '';
            foreach ($ciudades->result() as $ciudad)
            {
                if($ciudad->ID_CIUDAD == $Id)
                {
                    $this->Data['Ciudades'] .=
                        '<option style="text-align:left;" value ="' . $ciudad->ID_CIUDAD . '" selected>' . $ciudad->NOMBRE . ',&nbsp;&nbsp;' . $ciudad->DEPARTAMENTO . '</option>';
                }
                else
                {
                    $this->Data['Ciudades'] .=
                        '<option style="text-align:left;" value ="' . $ciudad->ID_CIUDAD . '">' . $ciudad->NOMBRE . ',&nbsp;&nbsp;' . $ciudad->DEPARTAMENTO . '</option>';
                }
            }
        }

        public function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
        }

        public function TraeInmuebles()
        {
            $this->Data['Inmuebles'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Propietario</th>
                                    <th>Tipo</th>
                                    <th>Dirección</th>
                                    <th>Matrícula Inmobiliaria</th>
                                    <th>Número notaría</th>
                                    <th>Número escritura</th>
                                    <th>Fecha constitución</th>
                                    <th>Entrega escritura</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            foreach ($this->hipotecas_model->TraeInmuebles()->result() as $inmueble)
            {
                switch ($inmueble->TIPO_INMUEBLE)
                {
                    case 0:
                        $inmueble->TIPO_INMUEBLE = 'Casa';
                        break;
                    case 1:
                        $inmueble->TIPO_INMUEBLE = 'Apartamento';
                        break;
                    case 2:
                        $inmueble->TIPO_INMUEBLE = 'Finca';
                        break;
                    case 3:
                        $inmueble->TIPO_INMUEBLE = 'Lote';
                        break;
                }
                $this->Data['Inmuebles'] .= '<tr>
                 <td>' . $inmueble->NOMBRE_DEUDOR . '</td>
                 <td>' . $inmueble->TIPO_INMUEBLE . '</td>
                 <td>' . $inmueble->DIRECCION . '</td>
                 <td>' . $inmueble->MATRICULA . '</td>
                 <td>' . $inmueble->NUMERO_NOTARIA . '</td>
                 <td>' . $inmueble->NUMERO_ESCRITURA . '</td>
                 <td>' . date_format(new DateTime($inmueble->FECHA_CONSTITUCION), 'd/m/Y') . '</td>
                 <td>' . date_format(new DateTime($inmueble->FECHA_ENTREGA_ESCRITURA), 'd/m/Y') . '</td>
                 <td style="text-align:center;">
                 <a href="verinmueble/' . $inmueble->ID_INMUEBLE . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver mas..."></a>&nbsp;&nbsp;';
                if($inmueble->UTILIZADO == 0)
                {
                    $this->Data['Inmuebles'] .= '
                     <a href="actualizarinmueble/' . $inmueble->ID_INMUEBLE . '" style="font-size:20pt;color:  #0065c3" class="ion ion-edit" data-toggle="tooltip" title="Editar"></a>&nbsp;&nbsp;
                    <a onclick="eliminar(' . $inmueble->ID_INMUEBLE . ');return false" style="color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar"></a> </td> </tr> ';
                }
                else
                {
                    $this->Data['Inmuebles'] .= '</td></tr> ';
                }
            }
            $this->Data['Inmuebles'] .= '</tbody></table>';
        }

        public function TraeSolicitudes()
        {
            $this->Data['Solicitudes'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Solicitud</th>
                                    <th>Deudor</th>
                                    <th>Acreedor</th>
                                    <th>Tipo inmueble</th>
                                    <th>Capital inicial</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha vence</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            foreach ($this->hipotecas_model->TraeSolicitudes()->result() as $solicitud)
            {
                switch ($solicitud->TIPO_INMUEBLE)
                {
                    case 0:
                        $solicitud->TIPO_INMUEBLE = 'Casa';
                        break;
                    case 1:
                        $solicitud->TIPO_INMUEBLE = 'Apartamento';
                        break;
                    case 2:
                        $solicitud->TIPO_INMUEBLE = 'Finca';
                        break;
                    case 3:
                        $solicitud->TIPO_INMUEBLE = 'Lote';
                        break;
                }
                //var_dump( $solicitud->ESTADO_HIPOTECA);exit;
                #Comfirmo sí ya ha pagado la hipoteca para cancelarla
                if($solicitud->CAPITAL_INICIAL - $solicitud->ABONADO == 0 && $solicitud->ESTADO_HIPOTECA != 3)
                {
                    $this->clientes_model->DemandarDeudorParams(3, $solicitud->ID_SOLICITUD);
                    $solicitud->ESTADO_HIPOTECA = 3;
                }

                switch ($solicitud->ESTADO_HIPOTECA)
                {
                    case 1:
                        $color = 'rgba(40, 95, 255, 0.59)';
                        $text = 'Vigente';
                        break;
                    case 2:
                        $color = 'rgba(245, 13, 10, 0.55)';
                        $text = 'Demandado';
                        break;
                    case 3:
                        $color = 'rgba(0, 255, 90, 0.98)';
                        $text = 'Cancelado';
                        break;
                }

                $this->Data['Solicitudes'] .= '<tr>
                 <td style="text-align: center;">' . $solicitud->SOLICITUD . '</td>
                 <td>' . $solicitud->NOMBRE_DEUDOR . '</td>
                 <td>' . $solicitud->NOMBRE_ACREEDOR . '</td>
                 <td>' . $solicitud->TIPO_INMUEBLE . '</td>
                 <td>' . number_format($solicitud->CAPITAL_INICIAL, 0, '', ',') . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_INICIO), 'd/m/Y') . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_FIN), 'd/m/Y') . '</td>
                 <td style="background:' . $color . ';text-align:center;color: white;">' . $text . '</td>
                 <td style="text-align:center;">
                 <a href="versolicitud/' . $solicitud->ID_SOLICITUD . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver mas..."></a>&nbsp;&nbsp;';
                $this->Data['Solicitudes'] .= '
                    <a onclick="eliminar(' . $solicitud->ID_SOLICITUD . ');return false" style="color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar"></a> </td> </tr>';
            }
            $this->Data['Solicitudes'] .= '</tbody></table>';
        }

        public function TraeInmueblesDropdown()
        {
            $Inmuebles = '<table class="table table-striped" border="0">
                                <thead><tr>
                                    <th style="text-align: center;">Tipo inmueble</th>
                                    <th style="text-align: center;">Matrícula inmueble</th>
                                    <th style="text-align: center;">Número notaría</th>
                                    <th style="text-align: center;">Número escritura</th>
                                    <th style="text-align: center;">Fecha entrega</th>
                                    <th style="text-align: center;">Ver inmueble</th>
                                    <th style="text-align: center;"></th>
                              </tr></thead><tbody>';
            $c = true;
            foreach ($this->hipotecas_model->TraeInmuebleDropdown($this->input->post('ID_DEUDOR'))->result() as $inmueble)
            {
                $Inmuebles .= '<tr style="text-align: center;">
                                    <td><img draggable="false" class="img-rounded" style="height:25px;width:26px;" src="' . base_url('public/images/Inmuebles' . '/' . $inmueble->TIPO_INMUEBLE) . '.png"/></td>
                                    <td>' . $inmueble->MATRICULA . '</td>
                                    <td>' . $inmueble->NUMERO_NOTARIA . '</td>
                                    <td>' . $inmueble->NUMERO_ESCRITURA . '</td>
                                    <td>' . date_format(new DateTime($inmueble->FECHA_ENTREGA_ESCRITURA), 'd/m/Y') . '</td>

                                    <td> <a target="_blank" href="' . site_url('verinmueble/' . $inmueble->ID_INMUEBLE) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver inmueble"></a></td>
                                    <td class="opcion"><input type="checkbox" value="' . $inmueble->ID_INMUEBLE . '" ' . ($c ? 'checked' : '') . '></td>
                                </tr>';
                $c = false;
            }
            if($c)
            {
                $Inmuebles .= '<tr><td style="text-align: center;" colspan="7">El deudor no tiene inmuebles o no estan disponibles...</td></tr>';
            }
            $Inmuebles .= '</tbody></table>';
            echo $Inmuebles;
        }

        public function TraeInmuebleSolicitud()
        {
            $this->Data['Inmueble'] = '<table class="table table-striped" border="0">
                                <thead><tr>
                                    <th style="text-align: center;">Tipo inmueble</th>
                                    <th style="text-align: center;">Matrícula inmueble</th>
                                    <th style="text-align: center;">Número notaría</th>
                                    <th style="text-align: center;">Número escritura</th>
                                    <th style="text-align: center;">Fecha entrega</th>
                                    <th style="text-align: center;">Acción</th>
                              </tr></thead><tbody>';
            $this->Data['Inmueble'] .= '<tr style="text-align: center;">
                                    <td><img draggable="false" class="img-rounded" style="height:25px;width:26px;" src="' . base_url('public/images/Inmuebles' . '/' . $this->Data['Info']->TIPO_INMUEBLE) . '.png"/></td>
                                    <td>' . $this->Data['Info']->MATRICULA . '</td>
                                    <td>' . $this->Data['Info']->NUMERO_NOTARIA . '</td>
                                    <td>' . $this->Data['Info']->NUMERO_ESCRITURA . '</td>
                                    <td>' . date_format(new DateTime($this->Data['Info']->FECHA_ENTREGA_ESCRITURA), 'd/m/Y') . '</td>

                                    <td> <a target="_blank" href="' . site_url('verinmueble/' . $this->Data['Info']->ID_INMUEBLE) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver inmueble"></a></td>
                                </tr>';
            $this->Data['Inmueble'] .= '</tbody></table>';
        }

        public function ActualizarInmueble($Id)
        {
            if($this->session->can('administrar_inmuebles'))
            {
                $this->Params();
                $this->Data['Info'] = $this->hipotecas_model->TraeInmueble($Id);
                if($this->Data['Info'] != null)
                {
                    $this->Deudores($this->Data['Info']->ID_DEUDOR);
                    $this->Ciudades($this->Data['Info']->ID_CIUDAD);
                    $this->load->view('Hipotecas/Inmuebles/ActualizarInmueble', $this->Data);
                }
                else
                {
                    redirect(site_url(), 'refresh');
                }
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function ActualizaInmueble()
        {
            $this->hipotecas_model->ActualizaInmueble();
        }

        public function EliminarInmueble()
        {
            $this->hipotecas_model->EliminarInmueble();
        }

        public function EliminarSolicitud()
        {
            $this->hipotecas_model->EliminarSolicitud();
        }
    }