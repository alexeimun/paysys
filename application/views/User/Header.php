<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('app') ?>" class="logo"><b>Admin</b> InverBienes</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="">
                    <a href="<?= site_url('crearobservacion') ?>" data-toggle="tooltip" title="Crear una observación">
                        <span class="badge info" style="background: #ff7701"> <span class="ion ion-plus"></span> OBSERVACION !!</span>
                    </a>
                </li>

                <!-- Full screen -->
                <li class="dropdown fullscreen">
                    <a href="#" onclick="BigScreen.toggle()" class="dropdown-toggle" id="screen" data-toggle="dropdown"
                       data-toggle="tooltip" title="Pantalla completa">
                        <i class="ion ion-monitor"></i>
                    </a>
                </li>


                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i style="font-size: 14pt;" class="fa ion-ios-bell-outline"></i>
                        <?php if ($Notify['Cantidad'] > 0) echo '<span class="label label-danger" style="padding: 8px;font-size: 12pt">' . $Notify['Cantidad'] . '</span>' ?>
                    </a>
                    <?= $Notify['Filas'] ?>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img
                            src="<?= base_url('public/images/Avatars/avatar' . $this->session->userdata('AVATAR')) ?>.png"
                            class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= $this->session->userdata('NOMBRE_USUARIO') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img
                                src="<?= base_url('public/images/Avatars/avatar' . $this->session->userdata('AVATAR')) ?>.png"
                                class="img-circle" alt="User Image"/>

                            <p>
                                <?= $this->session->userdata('NOMBRE_USUARIO') ?>
                                - <?= $this->session->userdata('NIVEL') > 0 ? 'Admistrador' : 'Usuario' ?>
                                <small>Miembro desde <?= $this->session->userdata('FECHA_REGISTRO') ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= site_url('perfil') ?>" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= site_url('home/logout') ?>" style="" id="logout"
                                   class="btn btn-default btn-flat">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <script>
    </script>
</header>