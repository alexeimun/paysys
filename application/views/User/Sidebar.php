<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img
                    src="<?= base_url() ?>/public/images/Avatars/avatar<?= $this->session->userdata('AVATAR') ?>.png"
                    class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('NOMBRE_USUARIO') ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><span style="color:#ffffff;">MENU PRINCIPAL</span></li>

            <li class="treeview">
                <a href="#">
                    <i class="ion-person-stalker"></i> <span>&nbsp;&nbsp;Clientes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="ion ion-ios-people"></i> Deudores <i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('creardeudor') ?>"><i class="fa ion-person-add"></i> Crear Deudor</a>
                            </li>
                            <li><a href="<?= site_url('demandardeudor') ?>"><i class="fa ion-ios-briefcase"></i>
                                    Demandar Deudor</a>
                            </li>
                            <li><a href="<?= site_url('deudores') ?>"><i class="fa ion-clipboard"></i> Listado Deudores</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="ion ion-ios-people"></i> Acreedores<i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('crearacreedor') ?>"><i class="fa ion-person-add"></i> Crear
                                    Acreedor</a></li>
                            <li><a href="<?= site_url('acreedores') ?>"><i class="fa ion-clipboard"></i> Listado
                                    Acreedores</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="ion ion-social-usd"></i> <span>Financiero</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="#"><i class="ion ion-android-list"></i> Recibos <i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('crearrecibo') ?>"><i class="fa ion-android-add"></i> Crear Recibo</a>
                            </li>
                            <li><a href="<?= site_url('recibos') ?>"><i class="fa ion-android-list"></i> Listado Recibos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="ion ion-document-text"></i> Informes <i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('informedeudor') ?>"><i class="fa ion-ios-list-outline"></i>
                                    Informe
                                    Deudor</a>
                            </li>
                            <li><a href="<?= site_url('informeacreedor') ?>"><i class="fa ion-ios-list-outline"></i>
                                    Informe
                                    Acreedor</a>
                            </li>
                            <li><a href="<?= site_url('cuadrediario') ?>"><i class="fa ion-ios-list-outline"></i> Cuadre
                                    Diario</a>
                            </li>
                            <li><a href="<?= site_url('informeingresosdiarios') ?>"><i
                                        class="fa ion-ios-list-outline"></i> Ingresos diarios</a>
                            </li>
                            <li><a href="<?= site_url('pazysalvo') ?>"><i class="fa ion-ios-list-outline"></i> Paz y
                                    salvo</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="ion-ios-home"></i> <span>&nbsp;&nbsp;Hipotecas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>

                    <li>
                        <a href="#"><i class="ion ion-shuffle"></i> Solicitudes<i
                                class="fa fa-angle-left pull-right"></i></a>

                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('crearsolicitud') ?>"><i class="fa ion-android-add-circle"></i>
                                    Crear Solicitud</a></li>

                            <li><a href="<?= site_url('solicitudes') ?>"><i class="fa ion-clipboard"></i> Lista
                                    Solicitudes</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Inmuebles<i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('crearinmueble') ?>"><i class="fa ion-android-add-circle"></i>
                                    Crear Inmueble</a></li>
                            <li><a href="<?= site_url('inmuebles') ?>"><i class="fa ion-clipboard"></i> Lista Inmuebles</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="ion-person"></i> <span>&nbsp;&nbsp;Sesión de crédito</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                    <li><a href="<?= site_url('sesion_credito_acreedor') ?>"><i class="fa ion-person"></i>
                            Acreedores</a></li>
                    <li><a href="<?= site_url('sesion_credito_deudor') ?>"><i class="fa ion-person"></i> Deudores</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="ion-person"></i> <span>&nbsp;&nbsp;Usuarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                    <li><a href="<?= site_url('crearusuario') ?>"><i class="fa ion-person-add"></i> Crear Usuario</a>
                    </li>
                    <li><a href="<?= site_url('usuarios') ?>"><i class="fa ion-clipboard"></i> Listado Usuarios</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="ion-gear-a"></i> <span>&nbsp;&nbsp;Parámetros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                    <li><a href="#"><i class="fa ion-person-stalker"></i> Clientes</a>

                        <ul class="treeview-menu">
                            <li>
                                <a href="#"><i class="ion ion-ios-people"></i> Deudores<i
                                        class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= site_url('exportardeudores') ?>"><i class="ion ion-ios-folder"></i>
                                            Exportar Deudores</a></li>
                                    <li><a href="<?= site_url('importardeudores') ?>"><i class="ion ion-ios-folder"></i>
                                            Importar Dudores</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="ion ion-ios-people"></i> Acreedores<i
                                        class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= site_url('exportaracreedores') ?>"><i
                                                class="ion ion-ios-folder"></i>
                                            Exportar Acreedores</a></li>
                                    <li><a href="<?= site_url('importaracreedores') ?>"><i
                                                class="ion ion-ios-folder"></i>
                                            Importar Acreedores</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('empresa') ?>"><i class="fa ion-cube"></i> Empresa</a>
                    </li>
                    <li><a href="<?= site_url('consecutivos') ?>"><i class="fa ion-pound"></i> Consecutivos</a>
                    </li>
                    <li><a href="<?= site_url('parametro/pazysalvo') ?>"><i class="fa ion-ios-list-outline"></i> Paz y salvo</a>
                    </li>
                    </li>
                </ul>
            <li class="treeview">
                <a href="<?= site_url('observaciones') ?>" style="background: #b95801">
                    <i class="ion ion-alert"></i> <span>&nbsp;&nbsp;Observaciones</span>
                </a>

            </li>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>