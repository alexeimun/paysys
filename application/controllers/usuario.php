<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Usuario extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('usuarios_model');
        }

        public function ActualizaAvatar()
        {
            $this->session->set_userdata(['AVATAR' => $this->input->post('Avatar')]);
            $this->usuarios_model->ActualizaAvatarUsuario();
        }

        public function index()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->ListarUsuarios();
                $this->load->view('Usuarios/Usuarios', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function ActualizaUsuarioPerfil()
        {
            $this->usuarios_model->ActualizaUsuarioPerfil();
        }

        public function CrearUsuario()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->Data['Modulos'] = $this->ListarModulos();
                $this->load->view('Usuarios/CrearUsuario', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function ActualizarUsuario($Id)
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Data['Info'] = $this->usuarios_model->TraeUsuario($Id);
                if ($this->Data['Info'] != null)
                {
                    $this->Params();
                    $this->Data['Modulos'] = $this->ListarPermisos($Id);
                    $this->load->view('Usuarios/ActualizarUsuario', $this->Data);
                }
                else redirect('app', 'refresh');
            }
            else  redirect('home', 'refresh');
        }

        public function VerUsuario($Id)
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Data['Info'] = $this->usuarios_model->TraeUsuario($Id);
                if ($this->Data['Info'] != null)
                {
                    $this->Params();
                    $this->Data['Modulos'] = $this->ListarPermisos($Id);
                    $this->load->view('Usuarios/VerUsuario', $this->Data);
                }
                else redirect('app', 'refresh');
            }
            else  redirect('home', 'refresh');
        }

        public function InsertarUsuario()
        {
            $this->usuarios_model->InsertarUsuario();
        }

        public function ActualizaUsuario()
        {
            $this->usuarios_model->ActualizaPermisos();
        }

        public function ListarModulos()
        {
            $Modulos = '';
            foreach ($this->usuarios_model->TraeModulos() as $Modulo)
            {
                $c = 0;
                $Modulos .= '<div class="box box-info collapsed-box">
                    <div class="box-header"">
                        <h3 class="box-title">Módulo ' . lcfirst($Modulo->NOMBRE) . ' </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <input type="checkbox" class="all" checked/> &nbsp;&nbsp;
                            <button class="btn btn-info btn-sm"  style="width:30px;height:25px;" data-widget="collapse" data-toggle="tooltip" data-toggle="tooltip" title="Colapsar"><i class="fa fa-plus"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Submódulo</th>
                                <th style="text-align: center;">Autorizar</th>
                            </tr>
                            </thead>
                            <tbody>';
                foreach ($this->usuarios_model->TraeSubModulos($Modulo->ID_MODULO) as $SubModulo)
                {
                    $Modulos .= '<tr>
                                <td style="text-align: center;">' . (++ $c) . '</td>
                                <td>' . $SubModulo->NOMBRE . '</td>
                                <td style="text-align: center;"><input type="checkbox" value="1" checked/></td>
                            </tr>';
                }
                $Modulos .= '</tbody>
                        </table>
                    </div>
                </div>';
            }
            return $Modulos;
        }

        public function ListarPermisos($idUsuario)
        {
            $Permisos = $this->usuarios_model->TraePermisos($idUsuario);
            $Modulos = '';
            $per = 0;
            foreach ($this->usuarios_model->TraeModulos() as $Modulo)
            {
                $c = 0;
                $Modulos .= '<div class="box box-info">
                    <div class="box-header"">
                        <h3 class="box-title">Módulo ' . lcfirst($Modulo->NOMBRE) . ' </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm"  style="width:30px;height:25px;" data-widget="collapse" data-toggle="tooltip" title="Colapsar"><i class="fa fa-minus"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Submódulo</th>
                                <th style="text-align: center;">Autorizar</th>
                            </tr>
                            </thead>
                            <tbody>';
                foreach ($this->usuarios_model->TraeSubModulos($Modulo->ID_MODULO) as $SubModulo)
                {
                    $Modulos .= '<tr>
                                <td style="text-align: center;">' . (++ $c) . '</td>
                                <td>' . $SubModulo->NOMBRE . '</td>
                                <td style="text-align: center;"><input type="checkbox"   value="' . ($Permisos[$per]->AUTORIZADO == 1 ? '1' : '0') . '"
                                  ' . ($Permisos[$per]->AUTORIZADO == 1 ? 'checked' : '') . '/></td>
                            </tr>';
                    $per ++;
                }
                $Modulos .= '</tbody>
                        </table>
                    </div>
                </div>';
            }
            return $Modulos;
        }

        public function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
        }

        public function EliminarUsuario()
        {
            if (!empty($_POST))
                $this->usuarios_model->EliminaUsuario();
            echo '<b>Acceso denegado por el servidor...</b>';
        }

        public function RestauraUsuario($Id)
        {
            $this->usuarios_model->RestauraUsuario($Id);
            redirect('app/Notificaciones#ue', 'redirect');
        }

        private function ListarUsuarios()
        {
            $this->Data['Usuarios'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Fecha registro</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            $c = 0;
            foreach ($this->usuarios_model->TraeUsuarios() as $usuario)
            {
                $this->Data['Usuarios'] .= '<tr>
                 <td>' . (++ $c) . '</td>
                 <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $usuario->AVATAR . '.png') . '"/></td>
                 <td>' . $usuario->NOMBRE . '</td>
                 <td>' . $usuario->CORREO . '</td>
                 <td>' . Fecha($usuario->FECHA_REGISTRO) . '</td>
                 <td style="text-align:center;">
                 <a href="verusuario/' . $usuario->ID_USUARIO . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver mas..."></a>&nbsp;&nbsp;';
                if ($usuario->NIVEL != 2 && $usuario->ID_USUARIO!=$this->session->userdata('ID_USUARIO'))
                {
                    $this->Data['Usuarios'] .= '<a href="actualizarusuario/' . $usuario->ID_USUARIO . '" style="font-size:20pt;color:  #0065c3" class="ion ion-edit" data-toggle="tooltip" title="Editar"></a>&nbsp;&nbsp;
                    <a onclick="eliminar(' . $usuario->ID_USUARIO . ');" style="color:  #e54040;font-size:20pt;" class="ion ion-trash-b" data-toggle="tooltip" title="Eliminar"></a>';
                }
                $this->Data['Usuarios'] .= '</td></tr> ';
            }
            $this->Data['Usuarios'] .= '</tbody></table>';
        }
    }