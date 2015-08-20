<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                redirect(site_url(), 'refresh');
            }
            else $this->load->view('Home/Login');
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('home', 'refresh');
        }

        public function error404()
        {
            $this->load->view('Home/Error404');
        }
    }