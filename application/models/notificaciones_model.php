<?php

    Class notificaciones_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function TraeNotificaciones()
        {
            $query = $this->db->query('SELECT
             TIPO,FECHA
               FROM t_notificaciones
                WHERE VISTO=0 AND ID_USUARIO=' . $this->session->userdata('ID_USUARIO'));
            #Deudores
            $di = $de = $da = 0;
            #Acreedores
            $ai = $ae = $aa = 0;
            #Acreedores
            $ui = $ua = $ue = 0;
            #Recibos
            $ri = 0;
            #Observaciones
            $ci = $oi = 0;
            #vebcimientos
            $vs = 0;
            #Contadores de filas
            $c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = $c13 = 0;
            foreach ($query->result() as $campo)
            {
                switch ($campo->TIPO)
                {
                    #Deudores
                    case 'di':
                        $di ++;
                        $c1 = 1;
                        break;
                    case 'de':
                        $de ++;
                        $c3 = 1;
                        break;
                    case 'da':
                        $da ++;
                        $c4 = 1;
                        break;
                    #Acreedores
                    case 'ai':
                        $ai ++;
                        $c5 = 1;
                        break;
                    case 'ae':
                        $ae ++;
                        $c7 = 1;
                        break;
                    case 'aa':
                        $aa ++;
                        $c8 = 1;
                        break;
                    #Usuarios
                    case 'ui':
                        $ui ++;
                        $c9 = 1;
                        break;
                    case 'ua':
                        $ua ++;
                        $c10 = 1;
                        break;
                    case 'ue':
                        $ue ++;
                        $c11 = 1;
                        break;
                    #Recibos
                    case 'ri':
                        $ri ++;
                        $c12 = 1;
                        break;
                    #Vencimientos
                    case 'vs':
                        $vs ++;
                        $c13 = 1;
                        break;
                    #Observaciones
                    case 'ci':
                        $ci ++;
                        break;
                    case 'oi':
                        $oi ++;
                        break;
                }
            }
            $rows = $c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11 + $c12 + $c13 + $ci + $oi;
            $Data['Filas'] = '<ul class="dropdown-menu" style="width:350px">
                        <li class="header">Tienes ' . $rows . ' notificaci' . ($rows > 1 ? 'o' : 'ó') . 'n' . ($rows > 1 ? 'es' : '') . '</li>
                        <li><ul class="menu">';
            #DEUDORES
            if ($di != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/di') . '"><i class="ion ion-person-add text-primary">
                        </i><span style="color: #3c8dbc;">' . $di . ' Deudor' . ($di > 1 ? 'es' : '') . ' creado' . ($di > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($da != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/da') . '"><i class="ion ion-edit text-yellow">
                        </i><span style="color: #cabb56;">' . $da . ' Deudor' . ($da > 1 ? 'es' : '') . ' modificado' . ($da > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($de != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/de') . '"><i class="ion ion-android-delete text-red">
                        </i><span style="color: red;">' . $de . ' Deudor' . ($de > 1 ? 'es' : '') . ' eliminado' . ($de > 1 ? 's' : '') . '</span></a></li>';
            }
            #ACREEDORES
            if ($ai != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ai') . '"><i class="ion ion-person-add text-primary">
                        </i><span style="color: #3c8dbc;">' . $ai . ' Acreedor' . ($ai > 1 ? 'es' : '') . ' creado' . ($ai > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($aa != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/aa') . '"><i class="ion ion-edit text-yellow">
                        </i><span style="color: #cabb56;">' . $aa . ' Acreedor' . ($aa > 1 ? 'es' : '') . ' modificado' . ($aa > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($ae != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ae') . '"><i class="ion ion-android-delete text-red">
                        </i><span style="color: red;">' . $ae . ' Acreedor' . ($ae > 1 ? 'es' : '') . ' eliminado' . ($ae > 1 ? 's' : '') . '</span></a></li>';
            }
            #USUARIOS
            if ($ui != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ui') . '"><i class="ion ion-person-add text-primary">
                        </i><span style="color: #3c8dbc;">' . $ui . ' Usuario' . ($ui > 1 ? 'es' : '') . ' creado' . ($ui > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($ua != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ua') . '"><i class="ion ion-edit text-yellow">
                        </i><span style="color: #cabb56;">' . $ua . ' Usuario' . ($ua > 1 ? 'es' : '') . ' modificado' . ($ua > 1 ? 's' : '') . '</span></a></li>';
            }
            if ($ue != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ue') . '"><i class="ion ion-android-delete text-red">
                        </i><span style="color: red;">' . $ue . ' Usuario' . ($ue > 1 ? 'es' : '') . ' eliminado' . ($ue > 1 ? 's' : '') . '</span></a></li>';
            }
            #RECIBOS INSERTADOS
            if ($ri != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/ri') . '"><i class="ion ion-android-add-circle text-green">
                        </i><span style="color: #34a38e;">' . $ri . ' Recibo' . ($ri > 1 ? 's' : '') . ' creado' . ($ri > 1 ? 's' : '') . '</span></a></li>';
            }
            #VENCE SOLICITUD
            if ($vs != 0)
            {
                $Data['Filas'] .= '<li><a href="' . site_url('vernotificacion/vs') . '"><i class="ion ion-android-add-circle text-red">
                        </i><span style="color: #c6337b;">' . $vs . ' Solicitud' . ($vs > 1 ? 'es' : '') . ' próxima' . ($vs > 1 ? 's' : '') . ' a vencerse</span></a></li>';
            }
            #COMENTARIOS
            if ($ci != 0)
            {
                $this->load->model('observaciones_model');
                foreach ($this->observaciones_model->TraerComentariosNotificacion() as $Comentario)
                {
                    $Data['Filas'] .= '<li><a href="' . site_url('vercomentario/' . $Comentario->ID_COMENTARIO . '/' . $Comentario->ID_OBSERVACION) . '"><i class="ion ion-ios-compose" style="color: #ded623;">
                        </i><span style="color: #5e626a;">' . explode(' ', $Comentario->NOMBRE)[0] . ' ha comentado. ' . Fecha($Comentario->FECHA_COMENTARIO) . '</span></a></li>';
                }
            }
            #OBSERVACIONES
            if ($oi != 0)
            {
                $this->load->model('observaciones_model');
                foreach ($this->observaciones_model->TraerObservacionesNotificacion() as $Observacion)
                {
                    $Data['Filas'] .= '<li><a href="' . site_url('Procesarobservacion/' . $Observacion->ID_OBSERVACION) . '"><i class="ion ion-ios-compose" style="color: #ded623;">
                        </i><span style="color: #5e626a;">' . explode(' ', $Observacion->NOMBRE)[0] . ' ha hecho una observación. ' . Fecha($Observacion->FECHA) . '</span></a></li>';
                }
            }
            #Footer
            $Data['Filas'] .= '</ul></li><li class="footer"><a target="_blank" href="' . site_url('notificaciones') . '">Ver todas</a></li></ul>';
            $Data['Cantidad'] = $rows;
            return $Data;
        }

        public function TraeTablasNotificaciones()
        {
            $this->db->query("DELETE FROM t_notificaciones WHERE VISTO = 1 AND t_notificaciones.FECHA_DISPONIBLE <= date(" . date('Y-m-d') . ") ");
            #DEUDORES INSERTAR
            $DI = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_deudores.ID_DEUDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_deudores ON t_deudores.DOCUMENTO=t_notificaciones.ACCION

                WHERE TIPO='di' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($DI != '')
            {
                $di = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Registrado por</th>
                                    <th>Nombre del deudor</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($DI->result() as $campo)
                {
                    $di .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_DEUDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a target="_blank" href="' . site_url('verdeudor/' . $campo->ID_DEUDOR) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver deudor"></a></td>
                                </tr>';
                }
                if ($c == 0) $di = '';
                else $di .= '</tbody></table>';
            }
            #DEUDORES ACTUALIZAR
            $DA = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_deudores.ID_DEUDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_deudores ON t_deudores.ID_DEUDOR=t_notificaciones.ACCION 

                WHERE TIPO='da'AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($DA != '')
            {
                $da = '<table class="table table-striped">
                               <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>modificado por</th>
                                    <th>Nombre del deudor</th>
                                    <th>Fecha de modificación</th>
                                     <th>Acción</th>
                                </tr></thead><tbody>';
                $c = 0;
                foreach ($DA->result() as $campo)
                {
                    $da .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_DEUDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                            <td> <a target="_blank" href="' . site_url('verdeudor/' . $campo->ID_DEUDOR) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver deudor"></a></td>

                                </tr>';
                }
                if ($c == 0) $da = '';
                else $da .= '</tbody></table>';
            }
            #DEUDORES ELIMINAR
            $DE = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_deudores.ID_DEUDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_deudores ON t_deudores.ID_DEUDOR=t_notificaciones.ACCION AND t_deudores.ESTADO=0

                WHERE TIPO='de'AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($DE != '')
            {
                $de = '<table class="table table-striped">
                               <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Eliminado por</th>
                                    <th>Nombre del deudor</th>
                                    <th>Fecha de eliminación</th>
                                    <th>Acción</th>
                                </tr></thead><tbody>';
                $c = 0;
                foreach ($DE->result() as $campo)
                {
                    $de .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_DEUDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a href="' . site_url('RestaurarDeudor/' . $campo->ID_DEUDOR) . '" style="font-size:20pt;color:  #5094ba" class="ion ion-ios-redo" data-toggle="tooltip" title="Restaurar"></a></td>
                                </tr>';
                }
                if ($c == 0) $de = '';
                else $de .= '</tbody></table>';
                ##Fin elimina deudores##
            }
            #ACREEDORES INSERTAR
            $AI = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_acreedores.ID_ACREEDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_acreedores ON t_acreedores.DOCUMENTO=t_notificaciones.ACCION

                WHERE TIPO='ai' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($AI != '')
            {
                $ai = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Registrado por</th>
                                    <th>Nombre del acreedor</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($AI->result() as $campo)
                {
                    $ai .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_ACREEDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a target="_blank" href="' . site_url('veracreedor/' . $campo->ID_ACREEDOR) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver acreedor"></a></td>
                                </tr>';
                }
                if ($c == 0) $ai = '';
                else $ai .= '</tbody></table>';
            }
            #ACREEDORES ACTUALIZAR
            $AA = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_acreedores.ID_ACREEDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_notificaciones.ACCION

                WHERE TIPO='aa' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($AA != '')
            {
                $aa = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>modificado por</th>
                                    <th>Nombre del acreedor</th>
                                    <th>Fecha de modificación</th>
                                     <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($AA->result() as $campo)
                {
                    $aa .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_ACREEDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a target="_blank" href="' . site_url('veracreedor/' . $campo->ID_ACREEDOR) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver acreedor"></a></td>
                                </tr>';
                }
                if ($c == 0) $aa = '';
                else $aa .= '</tbody></table>';
            }
            #ACREEDORES ELIMINAR
            $AE = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_acreedores.ID_ACREEDOR

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_notificaciones.ACCION

                WHERE t_acreedores.ESTADO=0 AND TIPO='ae' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($AE != '')
            {
                $ae = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>modificado por</th>
                                    <th>Nombre del acreedor</th>
                                    <th>Fecha de modificación</th>
                                     <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($AE->result() as $campo)
                {
                    $ae .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_ACREEDOR . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                   <td> <a href="' . site_url('RestaurarAcreedor/' . $campo->ID_ACREEDOR) . '" style="font-size:20pt;color:  #5094ba" class="ion ion-ios-redo" data-toggle="tooltip" title="Restaurar"></a></td>
                                  </tr>';
                }
                if ($c == 0) $ae = '';
                else $ae .= '</tbody></table>';
            }
            #USUARIOS INSERTAR
            $UI = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             USUARIO_REGISTRA.AVATAR,
             USUARIO_REGISTRA.NOMBRE AS NOMBRE_REGISTRA,
             USUARIO.NOMBRE AS NOMBRE_USUARIO,
             USUARIO_REGISTRA.ID_USUARIO

               FROM t_notificaciones

               INNER JOIN t_usuarios AS USUARIO_REGISTRA ON USUARIO_REGISTRA.ID_USUARIO=t_notificaciones.ACCION
               INNER JOIN t_usuarios AS USUARIO ON USUARIO.ID_USUARIO=t_notificaciones.USUARIO_ACCION

                WHERE TIPO='ui' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($UI != '')
            {
                $ui = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Registrado por</th>
                                    <th>Nombre del usuario</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($UI->result() as $campo)
                {
                    $ui .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_REGISTRA . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a target="_blank" href="' . site_url('verusuario/' . $campo->ID_USUARIO) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver usuario"></a></td>
                                </tr>';
                }
                if ($c == 0) $ui = '';
                else $ui .= '</tbody></table>';
            }
            #USUARIOS ACTUALIZAR
            $UA = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             USUARIO.AVATAR,
             USUARIO_REGISTRA.NOMBRE AS NOMBRE_REGISTRA,
             USUARIO.NOMBRE AS NOMBRE_USUARIO,
             USUARIO_REGISTRA.ID_USUARIO

               FROM t_notificaciones

               INNER JOIN t_usuarios AS USUARIO_REGISTRA ON USUARIO_REGISTRA.ID_USUARIO=t_notificaciones.ACCION
               INNER JOIN t_usuarios AS USUARIO ON USUARIO.ID_USUARIO=t_notificaciones.USUARIO_ACCION

                WHERE TIPO='ua' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($UA != '')
            {
                $ua = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Actualizado por</th>
                                    <th>Nombre del usuario</th>
                                    <th>Fecha de actualización</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($UA->result() as $campo)
                {
                    $ua .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_REGISTRA . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a target="_blank" href="' . site_url('verusuario/' . $campo->ID_USUARIO) . '" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver usuario"></a></td>
                                </tr>';
                }
                if ($c == 0) $ua = '';
                else $ua .= '</tbody></table>';
            }
            #USUARIOS ELIMINAR
            $UE = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             USUARIO_REGISTRA.AVATAR,
             USUARIO_REGISTRA.NOMBRE AS NOMBRE_REGISTRA,
             USUARIO.NOMBRE AS NOMBRE_USUARIO,
             USUARIO_REGISTRA.ID_USUARIO

               FROM t_notificaciones

               INNER JOIN t_usuarios AS USUARIO_REGISTRA ON USUARIO_REGISTRA.ID_USUARIO=t_notificaciones.ACCION
               INNER JOIN t_usuarios AS USUARIO ON USUARIO.ID_USUARIO=t_notificaciones.USUARIO_ACCION

                WHERE USUARIO_REGISTRA.ESTADO=0 AND TIPO='ue' AND t_notificaciones.ID_USUARIO=" . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($UE != '')
            {
                $ue = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Eliminado por</th>
                                    <th>Nombre del usuario</th>
                                    <th>Fecha de eliminación</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($UE->result() as $campo)
                {
                    $ue .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->NOMBRE_REGISTRA . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a href="' . site_url('RestaurarUsuario/' . $campo->ID_USUARIO) . '" style="font-size:20pt;color:  #5094ba" class="ion ion-ios-redo" data-toggle="tooltip" title="Restaurar"></a></td>

                                     </tr>';
                }
                if ($c == 0) $ue = '';
                else $ue .= '</tbody></table>';
            }
            #RECIBOS INSERTAR
            $RI = $this->db->query("SELECT DISTINCT
             t_notificaciones.FECHA,
             t_usuarios.AVATAR,
             t_usuarios.NOMBRE AS NOMBRE_USUARIO,
             t_movimientos.VALOR,
             t_movimientos.CONSECUTIVO

               FROM t_notificaciones

               INNER JOIN t_usuarios ON t_usuarios.ID_USUARIO=t_notificaciones.USUARIO_ACCION
               INNER JOIN t_movimientos ON t_movimientos.CONSECUTIVO=t_notificaciones.ACCION

                WHERE t_notificaciones.TIPO='ri' AND t_movimientos.DESCRIPCION= 'TOTAL_RECIBO' AND t_notificaciones.ID_USUARIO=
                " . $this->session->userdata('ID_USUARIO') . ' ORDER BY t_notificaciones.FECHA DESC');
            if ($RI != '')
            {
                $ri = '<table class="table table-striped">
                                <thead><tr>
                                    <th style="width: 20px">#</th>
                                    <th>Avatar</th>
                                    <th>Creado por</th>
                                    <th>#Consecutivo</th>
                                    <th>Valor del recibo</th>
                                    <th>Fecha de creación</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($RI->result() as $campo)
                {
                    $ri .= ' <tr>
                                    <td>' . ++ $c . '.</td>
                                    <td><img class="img-circle" style="height:25px;width:25px;" src="' . base_url('public/images/Avatars/avatar' . $campo->AVATAR) . '.png"/></td>
                                    <td>' . $campo->NOMBRE_USUARIO . '</td>
                                    <td>' . $campo->CONSECUTIVO . '</td>
                                    <td>' . number_format($campo->VALOR, 0, '', ',') . '</td>
                                    <td>' . Fecha($campo->FECHA) . '</td>
                                    <td> <a href="' . site_url('verrecibo/' . $campo->CONSECUTIVO) . '" target="_blank" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver recibo"></a></td>
                                </tr>';
                }
                if ($c == 0) $ri = '';
                else $ri .= '</tbody></table>';
            }
            #VENCE SOLICITUD
            $VS = $this->db->query("SELECT DISTINCT
             t_solicitudes.SOLICITUD,
             t_solicitudes.ID_SOLICITUD,
             t_solicitudes.CAPITAL_INICIAL,
             t_deudores.NOMBRE AS NOMBRE_DEUDOR,
             t_acreedores.NOMBRE AS NOMBRE_ACREEDOR,
             t_solicitudes.FECHA_INICIO,
             t_solicitudes.FECHA_FIN

               FROM t_notificaciones

               INNER  JOIN t_solicitudes ON t_solicitudes.ID_SOLICITUD=t_notificaciones.ACCION
               INNER  JOIN t_inmuebles ON t_inmuebles.ID_INMUEBLE=t_solicitudes.ID_INMUEBLE
               INNER  JOIN t_deudores ON t_deudores.ID_DEUDOR=t_solicitudes.ID_DEUDOR
               INNER  JOIN t_acreedores ON t_acreedores.ID_ACREEDOR=t_solicitudes.ID_ACREEDOR
               WHERE t_solicitudes.ESTADO=1 AND  t_deudores.ESTADO=1 AND t_acreedores.ESTADO=1 AND t_inmuebles.ESTADO=1
                AND  t_notificaciones.TIPO='vs'  ORDER BY t_notificaciones.FECHA DESC")->result();
            if ($VS != '')
            {
                $vs = '<table class="table table-striped">
                                <thead><tr>
                                    <th>#</th>
                                    <th>Deudor</th>
                                    <th>#Acreedor</th>
                                    <th>Capital inicial</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Vence en</th>
                                    <th>Acción</th>
                              </tr></thead><tbody>';
                $c = 0;
                foreach ($VS as $campo)
                {
                    $dias = (strtotime($campo->FECHA_FIN) - strtotime($campo->FECHA_INICIO)) / (3600 * 24) . ' días';
                    $c ++;
                    $vs .= ' <tr>
                                    <td>' . $campo->SOLICITUD . '</td>
                                    <td>' . $campo->NOMBRE_DEUDOR . '</td>
                                    <td>' . $campo->NOMBRE_ACREEDOR . '</td>
                                    <td>' . number_format($campo->CAPITAL_INICIAL, 0, '', ',') . '</td>
                                    <td>' . date_format(new DateTime($campo->FECHA_INICIO), 'd/m/Y') . '</td>
                                    <td>' . date_format(new DateTime($campo->FECHA_FIN), 'd/m/Y') . '</td>
                                    <td>' . ($dias > 0 ? $dias : 'ya venció') . '</td>
                                    <td> <a href="' . site_url('versolicitud/' . $campo->ID_SOLICITUD) . '" target="_blank" style="font-size:20pt;color:  #29a84b" class="ion ion-ios-paper" data-toggle="tooltip" title="Ver solicitud"></a></td>
                                </tr>';
                }
                if ($c == 0) $vs = '';
                else $vs .= '</tbody></table>';
            }
            $Note['DI'] = $di;
            $Note['DA'] = $da;
            $Note['DE'] = $de;
            $Note['AI'] = $ai;
            $Note['AA'] = $aa;
            $Note['AE'] = $ae;
            $Note['UI'] = $ui;
            $Note['UA'] = $ua;
            $Note['UE'] = $ue;
            $Note['RI'] = $ri;
            $Note['VS'] = $vs;
            return $Note;
        }

        public function ActualizaNotificacion($Tipo)
        {
            $this->db->update('t_notificaciones', ['VISTO' => 1, 'FECHA_DISPONIBLE' => date('Y-m-d', time() + 604800 /* = 1 semana*/ * 8)], ['TIPO' => $Tipo, 'ID_USUARIO' => $this->session->userdata('ID_USUARIO')]);
        }
    }