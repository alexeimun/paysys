<?php if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

    class Extras extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
        }

        public function pcobrar()
        {
            if($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->load->view('Extras/ProximosACobrar', $this->Data);
            }
            else
            {
                redirect('home', 'refresh');
            }
        }

        public function info()
        {
            echo $this->load->view('Extras/infoAjax', ['id' => $this->input->post('id')], true);
            exit;
        }

        private function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
        }
    }