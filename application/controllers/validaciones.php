<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class validaciones extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('validaciones_model');
        }

        public function ValidaCampos()
        {
            echo $this->validaciones_model->ValidaCampos() ? 'no' : 'ok';
        }
    }