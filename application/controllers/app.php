<?php if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

    class App extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('usuarios_model');
        }

        public function index()
        {
            if($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->load->view('App/Inicio', $this->Data);
            }
            else
            {
                redirect('home', 'refresh');
            }
        }

        private function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
            $this->Data['Dashboard'] = $this->load->view('Admin/Dashboard', $this->Dashboard(), true);
        }

        public function Dashboard()
        {
            $this->load->model('clientes_model');
            $Data['Usuarios'] = $this->usuarios_model->ContarUsuarios();
            $Data['Deudores'] = $this->clientes_model->ContarDeudores();
            $Data['Acreedores'] = $this->clientes_model->ContarAcreedores();
            $Data['Solicitudes'] = $this->clientes_model->ContarSolicitudes();
            return $Data;
        }

        public function ValidarCredenciales()
        {
            $log = $this->usuarios_model->ValidarCredenciales($this->input->post('usuario', true), $this->input->post('clave', true));
		
            if($log != null)
            {
                $this->load->model('hipotecas_model');
                $this->hipotecas_model->TraeSolicitudesVencer();
                $this->session->set_userdata(
                    [
                        'NOMBRE_USUARIO' => $log[0]->NOMBRE,
                        'ID_USUARIO' => $log[0]->ID_USUARIO,
                        'CORREO' => $log[0]->CORREO,
                        'CLAVE' => $log[0]->CLAVE,
                        'AVATAR' => $log[0]->AVATAR,
                        'ESTADO' => $log[0]->ESTADO,
                        'NIVEL' => $log[0]->NIVEL,
                        'FECHA_REGISTRO' => MesNombreAbr(round(date_format(new DateTime($log[0]->FECHA_REGISTRO), 'm'))) . '. ' . date_format(new DateTime($log[0]->FECHA_REGISTRO), 'Y'),
                    ]
                );

                $Data = [];
                #Trae permisos del usuario
                foreach ($this->usuarios_model->TraePermisosUsuario($this->session->userdata('ID_USUARIO')) as $key => $permiso)
                {
                    $Data[$permiso->NOMBRE] = 1;
                }
                $this->session->set_userdata(['can' => $Data]);
                ######

                $this->usuarios_model->ActualizarInicioSesion();
                redirect(site_url(), 'refresh');
            }
            else
            {
                redirect('home', 'refresh');
            }
        }

        public function Perfil()
        {
            if($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->load->view('App/Perfil', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function Notificaciones()
        {
            if($this->session->userdata('ID_USUARIO') && $this->session->userdata('NIVEL') <> 0)
            {
                $this->Data['Notificacion'] = $this->notificaciones_model->TraeTablasNotificaciones();
                $this->Params();
                $this->load->view('App/Notificaciones', $this->Data);
            }
            else
            {
                redirect(site_url(), 'refresh');
            }
        }

        public function VerNotificacion($Tipo)
        {
            $this->notificaciones_model->ActualizaNotificacion($Tipo);
            redirect('app/notificaciones#' . $Tipo, 'refresh');
        }
    }