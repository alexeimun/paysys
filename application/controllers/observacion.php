<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Observacion extends CI_Controller
    {
        public $Data = [];

        function __construct()
        {
            parent::__construct();
            $this->load->model('observaciones_model');
        }

        public function index()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Params();
                $this->ListarObservaciones();
                $this->load->view('Observaciones/Observaciones', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function CrearObservacion()
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Data['Galeria'] = $this->Galeria(0);
                $this->Params();
                $this->load->view('Observaciones/CrearObservacion', $this->Data);
            }
            else  redirect('home', 'refresh');
        }

        public function VerObservacion($id)
        {
            if ($this->session->userdata('ID_USUARIO'))
            {
                $this->Data['Info'] = $this->observaciones_model->TraeObservacion($id);
                if($this->Data['Info']!='')
                {
                    $this->Data['Galeria'] = $this->Galeria(1, $id);
                    $this->Data['Autor'] = $this->observaciones_model->RevisarVisto($id);
                    $this->Data['Comentarios'] = $this->ListarComentarios($this->observaciones_model->TraeComentarios($id));
                    $this->Params();
                    $this->load->view('Observaciones/VerObservacion', $this->Data);
                }
                else  redirect('home', 'refresh');
            }
            else  redirect('home', 'refresh');
        }

        public function InsertaObservacion()
        {
            $this->observaciones_model->InsertaObservacion();
        }

        public function SolucionarObservacion()
        {
            $this->observaciones_model->SolucionarObservacion();
        }

        public function ListarComentarios($Comentarios)
        {
            $com = '';
            foreach ($Comentarios as $comentario)
            {
                $com .= '<div class="form-group">
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-lg-10">
                <span style="font-size: 11pt;color:lightslategrey">' . $comentario->NOMBRE . ',  ' . Fecha($comentario->FECHA_COMENTARIO) . '</span>
            </div>
        </div>
        <div class="row">
            <img style="width: 70px;height: 60px;"
                 src="' . base_url() . 'public/images/Avatars/avatar' . $comentario->AVATAR . '.png"
                 class="col-lg-2 img-responsive form-control" alt="User Image"/>

            <div class="col-lg-10">
                <div class="box ' . ($comentario->ID_USUARIO % 2 == 0 ? 'box-info' : 'box-danger') . '"
                    style="background: #ffffff;min-height: 60px;padding: 10px;text-align:justify;border-radius:3px;">' . $comentario->COMENTARIO . '
                    </div>

            </div>
        </div>
    </div>';
            }
            return $com;
        }

        public function CraerComentario()
        {
            $this->observaciones_model->CrearComentario();
            echo $this->ListarComentarios($this->observaciones_model->TraeComentarios($this->input->post('ID_OBSERVACION')));
        }

        public function AdjuntarObservacion()
        {
            $route = '/';
            if ($_SERVER['DOCUMENT_ROOT'] == 'C:/wamp/www') $route = '/inverbienes/';
            //Define a destination
            $targetFolder = $_SERVER['DOCUMENT_ROOT'] . $route . 'observacionesimages'; // Relative to the root
            $verifyToken = md5('unique_salt' . $_POST['timestamp']);
            if (!empty($_FILES) && $_POST['token'] == $verifyToken)
            {
                $ext = explode('.', $_FILES['Filedata']['name']);
                $ext = $ext[count($ext) - 1];
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $filename = time() . '.' . $ext;
                $targetFile = rtrim($targetFolder, '/') . '/' . $filename;
                // Validate the file type
                $fileTypes = ['jpg', 'jpeg', 'gif', 'png', 'docx', 'xlsx', 'pdf', 'zip', 'rar']; // File extensions
                if (in_array($ext, $fileTypes))
                {
                    if (move_uploaded_file($tempFile, $targetFile))
                    {
                        $this->observaciones_model->InsertaArchivo($filename, $_FILES['Filedata']['name']);
                        echo $this->Galeria(0);
                    }
                }
                else
                {
                    echo '<h2 style="color: #d3d3d3">Tipo de archivo denegado.</h2>';
                }
            }
        }

        public function Galeria($mode, $IdObs = Null)
        {
            $Galeria = '';
            foreach ($this->observaciones_model->TraeArchivos($mode, $IdObs) as $archivo)
            {
                $nombre = strlen($archivo->NOMBRE_ARCHIVO) > 20 ? substr($archivo->NOMBRE_ARCHIVO, 0, 20) . '...' : $archivo->NOMBRE_ARCHIVO;
                $ext = explode('.', $archivo->NOMBRE_ARCHIVO);
                $ext = $ext[count($ext) - 1];
                if (in_array($ext, ['jpg', 'jpeg', 'gif', 'png']))
                {
                    $Galeria .= '<div class="box cajon" data-id="' . $archivo->RUTA_ARCHIVO . '" data-name="' . $archivo->NOMBRE_ARCHIVO . '" style="float: left;margin: 5px;margin-bottom: 10px;width: 200px;height:136px;"><span style="padding:10px;color:#48668b;font-weight: bold;">' . $nombre . '</span>
             <img style="width:100%;height:113px;"  draggable="false" src="' . base_url('observacionesimages') . '/' . $archivo->RUTA_ARCHIVO . '" /></div>';
                }
                else
                {
                    $Galeria .= '<div class="box cajon doc" data-id="' . $archivo->RUTA_ARCHIVO . '" style="float: left;margin: 5px;margin-bottom: 10px;width: 200px;height:136px;"><span style="padding:10px;color:#48668b;font-weight: bold;">' . $nombre . '</span>
             <img style="padding:10px;width:77px;height:88px;" draggable="false" src="' . base_url('observacionesimages/formats/' . $ext . '.png') . '" /></div>';
                }
            }
            return $Galeria;
        }

        public function EliminarArchivo()
        {
            $this->observaciones_model->EliminarArchivo($this->input->post('ARCHIVO'));
            $route = '/';
            if ($_SERVER['DOCUMENT_ROOT'] == 'C:/wamp/www') $route = '/inverbienes/';
            unlink($_SERVER['DOCUMENT_ROOT'] . $route . 'observacionesimages/' . $this->input->post('ARCHIVO'));
            echo $this->Galeria(0);
        }

        public function VerComentario($comentario, $observacion)
        {
            $this->observaciones_model->EliminarNotificacion($comentario, 'ci');
            redirect('verobservacion/' . $observacion, 'refresh');
        }

        public function ProcesarObservacion($observacion)
        {
            $this->observaciones_model->EliminarNotificacion($observacion, 'oi');
            redirect('verobservacion/' . $observacion, 'refresh');
        }

        private function ListarObservaciones()
        {
            $this->Data['Observaciones'] = '
                    <table id="tabla" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Autor</th>
                                    <th>Asunto</th>
                                    <th>Prioridad</th>
                                    <th>Estado</th>
                                    <th>Visto</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>';
            $c = 0;
            foreach ($this->observaciones_model->TraeObservaciones()->result() as $observacion)
            {
                if (strlen($observacion->ASUNTO) > 32) $observacion->ASUNTO = substr($observacion->ASUNTO, 0, 32).'...';
                $this->Data['Observaciones'] .= '<tr>
                 <td>' . (++ $c) . '</td>
                 <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $observacion->AVATAR . '.png') . '"/></td>
                 <td>' . $observacion->NOMBRE . '</td>
                 <td style="width:230px;">' . $observacion->ASUNTO . '</td>
                 <td>' . $observacion->PRIORIDAD . '</td>';
                if ($observacion->ESTADO == 0)
                    $this->Data['Observaciones'] .= '<td style="font-weight:bold;color:#be4b5a">Pendiente</td>';
                else
                    $this->Data['Observaciones'] .= '<td style="font-weight:bold;color:green">Solucionado</td>';
                $this->Data['Observaciones'] .= '<td style="font-weight:bold;">' . ($observacion->VISTO == 0 ? 'No' : 'Sí') . '</td>';
                $this->Data['Observaciones'] .= '<td>' . Fecha($observacion->FECHA) . '</td>
                 <td style="text-align:center;" class="bg-blue-gradient">
                 <a href="' . base_url('verobservacion/' . $observacion->ID_OBSERVACION) . '" style="font-size:12pt;color:  white;" class="" data-toggle="tooltip" title="Ver mas..."> Ver más</a></td> </tr>';
            }
            $this->Data['Observaciones'] .= '</tbody></table>';
        }

        public function Params()
        {
            $this->Data['Head'] = $this->load->view('User/Head', [], true);
            $this->Data['Header'] = $this->load->view('User/Header', ['Notify' => $this->notificaciones_model->TraeNotificaciones()], true);
            $this->Data['Sidebar'] = $this->load->view('User/Sidebar', [], true);
            $this->Data['Footer'] = $this->load->view('User/Footer', [], true);
        }

        public function DescargarArchivo($Ruta, $Archivo)
        {
            header('Content-disposition: attachment; filename=' . $Archivo);
            header('Content-type: image');
            readfile(base_url('observacionesimages/' . $Ruta));
        }
    }