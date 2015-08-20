<?php if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

    class Cliente extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();

            $this->load->model('clientes_model');
        }

        public function CrearDeudor()
        {
            if($this->session->can('administrar_deudores'))
            {
                $this->Params();
                $this->Ciudades();
                $this->load->view('Clientes/Deudores/CrearDeudor', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function CrearAcreedor()
        {
            if($this->session->can('administrar_acreedores'))
            {
                $this->Params();
                $this->ListarAcreedores();
                $this->Ciudades();
                $this->load->view('Clientes/Acreedores/CrearAcreedor', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function SCDeudor()
        {
            if($this->session->can('deudores'))
            {
                if(!empty($_POST))
                {
                    $this->clientes_model->SCDeudor();
                }
                else
                {
                    $this->Deudor(false);
                    $this->Solicitudes();
                    $this->Params();
                    $this->load->view('Sesion-Credito/SCDeudor', $this->Data);
                }
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function SCAcreedor()
        {
            if($this->session->can('acreedores'))
            {
                if(!empty($_POST))
                {
                    $this->clientes_model->SCAcreedor();
                }
                else
                {
                    $this->Acreedor(false);
                    $this->Solicitudes();
                    $this->Params();
                    $this->load->view('Sesion-Credito/SCAcreedor', $this->Data);
                }
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        private function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
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

        private function Ciudad($Id)
        {
            $ciudad = $this->clientes_model->TraeCiudad($Id);
            $this->Data['Ciudad'] = $ciudad[0]->NOMBRE . ', ' . $ciudad[0]->DEPARTAMENTO;
        }

        public function InsertaDeudor()
        {
            $this->clientes_model->InsertaDeudor();
        }

        public function InsertaAcreedor()
        {
            $this->clientes_model->InsertaAcreedor();
        }

        public function ActualizaDeudor()
        {
            $this->clientes_model->ActualizaDeudor();
        }

        public function ActualizaAcreedor()
        {
            $this->clientes_model->ActualizaAcreedor();
        }

        public function RestauraDeudor($Id)
        {
            if($this->session->can('administrar_deudores'))
            {
                $this->clientes_model->RestauraDeudor($Id);
            }

            redirect('app/Notificaciones#de', 'redirect');
        }

        public function RestauraAcreedor($Id)
        {
            if($this->session->can('administrar_acreedores'))
            {
                $this->clientes_model->RestauraAcreedor($Id);
            }
            redirect('app/Notificaciones#ae', 'redirect');
        }

        public function ActualizarDeudor($Id)
        {
            if($this->session->can('administrar_acreedores'))
            {
                $this->Params();
                $this->Data['Info'] = $this->clientes_model->TraeDeudor($Id);
                if($this->Data['Info'] != null)
                {
                    $this->TraeReferenciasActualizar($Id);
                    $this->Ciudades($this->Data['Info']->ID_CIUDAD);
                    $this->load->view('Clientes/Deudores/ActualizarDeudor', $this->Data);
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

        public function ActualizarAcreedor($Id)
        {
            if($this->session->can('administrar_acreedores'))
            {
                $this->Params();
                $this->Data['Info'] = $this->clientes_model->TraeAcreedor($Id);
                if($this->Data['Info'] != null)
                {
                    $this->Ciudades($this->Data['Info']->ID_CIUDAD);
                    $this->load->view('Clientes/Acreedores/ActualizarAcreedor', $this->Data);
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

        public function EliminarDeudor()
        {
            $this->clientes_model->EliminarDeudor();
        }

        public function EliminarAcreedor()
        {
            $this->clientes_model->EliminarAcreedor();
        }

        public function Deudores()
        {
            if($this->session->can('administrar_deudores'))
            {
                $this->Params();
                $this->ListarDeudores();
                $this->load->view('Clientes/Deudores/Deudores', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function Acreedores()
        {
            if($this->session->can('administrar_acreedores'))
            {
                $this->Params();
                $this->ListarAcreedores();
                $this->load->view('Clientes/Acreedores/Acreedores', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function VerDeudor($Id)
        {
            if($this->session->can('administrar_deudores'))
            {
                $this->Params();
                $this->Data['Info'] = $this->clientes_model->TraeDeudor($Id);
                if($this->Data['Info'] != null)
                {
                    $this->TraeSolicitudesDeudor($Id);
                    $this->TraeReferencias($Id);
                    $this->Ciudad($this->Data['Info']->ID_CIUDAD);
                    $this->load->view('Clientes/Deudores/VerDeudor', $this->Data);
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

        public function TraeSolicitudesDeudor($Id)
        {
            $this->Data['Solicitudes'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#Solicitid</th>
                                    <th>Acreedor</th>
                                    <th>M.I</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            $c = 0;
            foreach ($this->clientes_model->TraeSolicitudesDeudor($Id) as $solicitud)
            {
                $c++;
                $this->Data['Solicitudes'] .= '<tr>
                 <td>' . $solicitud->SOLICITUD . '</td>
                 <td>' . $solicitud->NOMBRE_ACREEDOR . '</td>
                 <td>' . $solicitud->MATRICULA . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_INICIO), 'd/m/Y') . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_FIN), 'd/m/Y') . '</td>
                 <td style="text-align:center;">
                 <a href="' . site_url('versolicitud/' . $solicitud->ID_SOLICITUD) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver más..."></a>&nbsp;&nbsp;</td> </tr>';
            }
            if($c > 0)
            {
                $this->Data['Solicitudes'] .= '</tbody></table>';
            }
            else
            {
                $this->Data['Solicitudes'] = '';
            }
        }

        public function TraeSolicitudesAcreedor($Id)
        {
            $this->Data['Solicitudes'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#Solicitid</th>
                                    <th>Deudor</th>
                                    <th>M.I</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            $c = 0;
            foreach ($this->clientes_model->TraeSolicitudesAcreedor($Id) as $solicitud)
            {
                $c++;
                $this->Data['Solicitudes'] .= '<tr>
                 <td>' . $solicitud->SOLICITUD . '</td>
                 <td>' . $solicitud->NOMBRE_DEUDOR . '</td>
                 <td>' . $solicitud->MATRICULA . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_INICIO), 'd/m/Y') . '</td>
                 <td>' . date_format(new DateTime($solicitud->FECHA_FIN), 'd/m/Y') . '</td>
                 <td style="text-align:center;">
                 <a href="' . site_url('versolicitud/' . $solicitud->ID_SOLICITUD) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver más..."></a>&nbsp;&nbsp;</td> </tr>';
            }
            if($c > 0)
            {
                $this->Data['Solicitudes'] .= '</tbody></table>';
            }
            else
            {
                $this->Data['Solicitudes'] = '';
            }
        }

        public function VerAcreedor($Id)
        {
            if($this->session->userdata('administrar_acreedores'))
            {
                $this->Params();
                $this->Data['Info'] = $this->clientes_model->TraeAcreedor($Id);
                if($this->Data['Info'] != null)
                {
                    $this->TraeSolicitudesAcreedor($Id);
                    $this->Ciudad($this->Data['Info']->ID_CIUDAD);
                    $this->load->view('Clientes/Acreedores/VerAcreedor', $this->Data);
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

        private function ListarDeudores()
        {
            $deudores = $this->clientes_model->TraeDeudores();
            $this->Data['Deudores'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Fecha registro</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            foreach ($deudores->result() as $deudor)
            {
                $this->Data['Deudores'] .= '<tr>
                 <td>' . $deudor->NOMBRE_DEUDOR . '</td>
                 <td>' . $deudor->TELEFONO . '</td>
                 <td>' . $deudor->DIRECCION . '</td>
                 <td>' . ucfirst(strtolower($deudor->NOMBRE_CIUDAD)) . '</td>
                 <td>' . date_format(new DateTime($deudor->FECHA_REGISTRA), 'd/m/Y') . '</td>
                 <td style="text-align:center;">
                 <a href="verdeudor/' . $deudor->ID_DEUDOR . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver más..."></a>&nbsp;&nbsp;
                 <a href="actualizardeudor/' . $deudor->ID_DEUDOR . '" style="font-size:20pt;color:  #0065c3" class="ion ion-edit" data-toggle="tooltip" title="Editar"></a>&nbsp;&nbsp;';
                if($deudor->LIGADO == 0)
                {
                    $this->Data['Deudores'] .= '<a onclick="eliminar(' . $deudor->ID_DEUDOR . ');return false" style="color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar"></a>';
                }
                $this->Data['Deudores'] .= '</td> </tr>';
            }
            $this->Data['Deudores'] .= '</tbody></table>';
        }

        private function ListarAcreedores()
        {
            $acreedores = $this->clientes_model->TraeAcreedores();
            $this->Data['Acreedores'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Fecha registro</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            foreach ($acreedores->result() as $acreedor)
            {
                $this->Data['Acreedores'] .= '<tr>
                 <td>' . $acreedor->NOMBRE_ACREEDOR . '</td>
                 <td>' . $acreedor->TELEFONO . '</td>
                 <td>' . $acreedor->DIRECCION . '</td>
                 <td>' . ucfirst(strtolower($acreedor->NOMBRE_CIUDAD)) . '</td>
                 <td>' . date('d/m/Y',strtotime($acreedor->FECHA_REGISTRA)). '</td>
                 <td style="text-align:center;">
                 <a href="veracreedor/' . $acreedor->ID_ACREEDOR . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver más..."></a>&nbsp;&nbsp;
                 <a href="actualizaracreedor/' . $acreedor->ID_ACREEDOR . '" style="font-size:20pt;color:  #0065c3" class="ion ion-edit" data-toggle="tooltip" title="Editar"></a>&nbsp;&nbsp;';
                if($acreedor->LIGADO == 0)
                {
                    $this->Data['Acreedores'] .= '<a onclick="eliminar(' . $acreedor->ID_ACREEDOR . ');return false" style="color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar"></a> </td> </tr> ';
                }
                $this->Data['Acreedores'] .= '</td> </tr>';
            }
            $this->Data['Acreedores'] .= '</tbody></table>';
        }

        private function TraeReferencias($IdDeudor)
        {
            $Referencias = $this->clientes_model->TraeReferencias($IdDeudor);
            $this->Data['Referencias'] = '';
            $r = 1;
            if($Referencias->num_rows() > 0)
            {
                foreach ($Referencias->result() as $referencia)
                {
                    $this->Data['Referencias'] .= '<div><div style="text-align:center;font-size: 14pt; color: #939695;">Referencia #' . ($r++) . '</div><br>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Tipo:</label> <div class="col-lg-10"> <input class="form-control" value="' . ($referencia->TIPO_REFERENCIA == 0 ? 'Personal' : 'Familiar') . '"> </div> </div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Nombre:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->NOMBRE_REFERENCIA . '" class="form-control"> </div> </div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Telefono:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->TELEFONO_REFERENCIA . '" class="form-control" > </div> </div></div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Dirección:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->DIRECCION_REFERENCIA . '" class="form-control" > </div> <br></div>';
                }
            }
        }

        private function TraeReferenciasActualizar($IdDeudor)
        {
            $Referencias = $this->clientes_model->TraeReferencias($IdDeudor);
            $this->Data['Referencias'] = '';
            $row = 0;
            if($Referencias->num_rows() > 0)
            {
                foreach ($Referencias->result() as $referencia)
                {
                    $this->Data['Referencias'] .= '<div><div style="text-align:left;font-size: 14pt; color: #939695;">Referencia # ' . (++$row) . '</div>
                        <div style="text-align: center;"><span onclick="Eliminar(this)" data-toggle="tooltip" title="Eliminar referencia" class="ion ion-android-delete" style="font-size: 25pt;font-weight: bold; color:  #e54040;cursor: pointer;"></span></div><br>
                    <div class="form-group"> <label  class="col-lg-2 control-label">Tipo:</label> <div class="col-lg-10"> <select class="form-control" name="TIPO_REFERENCIA[]"><option value="0" ' . ($referencia->TIPO_REFERENCIA == 0 ? 'selected' : '') . '>Personal</option><option value="1" ' . ($referencia->TIPO_REFERENCIA == 1 ? 'selected' : '') . '>Familiar</option> </select> </div> </div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Nombre:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->NOMBRE_REFERENCIA . '" name="NOMBRE_REFERENCIA[]" class="form-control obligatorio"  placeholder="Ingrese el nombre de la referencia"> </div> </div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Telefono:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->TELEFONO_REFERENCIA . '" class="form-control obligatorio numero telefono" name="TELEFONO_REFERENCIA[]"  placeholder="Ingrese el teléfono de la referencia"> </div> </div>
                        <div class="form-group"> <label  class="col-lg-2 control-label">Dirección:</label> <div class="col-lg-10"> <input type="text" value="' . $referencia->DIRECCION_REFERENCIA . '" class="form-control" name="DIRECCION_REFERENCIA[]" placeholder="Ingrese la dirección de la referencia"> </div> </div>
                        <br></div>';
                }
            }
        }

        private function Acreedor($from = true)
        {
            $acreedores = $this->clientes_model->TraeAcreedores()->result();

            if($from)
            {
                $this->Data['FromAcreedores'] = '<option value="0">--Seleccione un acreedor---</option>';
                foreach ($acreedores as $acreedor)
                {
                    if($acreedor->LIGADO > 0)
                    {
                        $this->Data['FromAcreedores'] .= '<option value="' . $acreedor->ID_ACREEDOR . '">' . $acreedor->DOCUMENTO . ' - ' . $acreedor->NOMBRE_ACREEDOR . '</option>';
                    }
                }
            }
            else
            {
                $this->Data['Acreedores'] = '<option value="0">--Seleccione un acreedor---</option>';
                foreach ($acreedores as $acreedor)
                {
                    $this->Data['Acreedores'] .= '<option value="' . $acreedor->ID_ACREEDOR . '">' . $acreedor->DOCUMENTO . ' - ' . $acreedor->NOMBRE_ACREEDOR . '</option>';
                }
            }
        }

        private function Deudor()
        {
            $this->Data['Deudores'] = '<option value="0">--Seleccione un deudor---</option>';
            $deudores = $this->clientes_model->TraeDeudores();
            foreach ($deudores->result() as $deudor)
            {
                #Sólo los deudores que tienen una solicitud por lo menos

                $this->Data['Deudores'] .= '<option value="' . $deudor->ID_DEUDOR . '">' . $deudor->DOCUMENTO . ' - ' . $deudor->NOMBRE_DEUDOR . '</option>';

            }
        }

        private function Solicitudes()
        {
            $this->Data['Solicitudes'] = '<option value="0">--Seleccione una solicitud---</option>';
            $solicitudes = $this->clientes_model->TraeSolicitudesDD();
            foreach ($solicitudes as $solicitud)
            {
                $this->Data['Solicitudes'] .= '<option value="' . $solicitud->ID_SOLICITUD . '"> #' . $solicitud->SOLICITUD . ' cc:' . $solicitud->DOCUMENTO . ' - ' . $solicitud->NOMBRE . '</option>';
            }
        }
    }