<!DOCTYPE html>
<html>
<body class="skin-blue">
<?= $Head ?>
<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <br>
        <?php if ($Notificacion['DI'] != '' OR $Notificacion['DA'] != '' OR $Notificacion['DE'] != ''
            OR $Notificacion['AI'] != '' OR $Notificacion['AA'] != '' OR $Notificacion['AE'] != ''
            OR $Notificacion['UI'] != '' OR $Notificacion['UA'] != '' OR $Notificacion['UE'] != ''OR $Notificacion['RI'] != '' OR $Notificacion['VS'] != ''
        ) : ?>
            <!-- Vencimientos -->
            <?php if ($Notificacion['VS'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #85455f;"><span
                                            class="ion-clock"></span>
                                        &nbsp;Vencimiento de solicitudes</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['VS'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Deudores Ingresados -->
            <?php if ($Notificacion['DI'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Deudores Ingresados</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['DI'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--  Deudores  Actulaizados-->
            <?php if ($Notificacion['DA'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Deudores Actualizados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['DA'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Deudores  Eliminados-->
            <?php if ($Notificacion['DE'] != ''): ?>
                <section id="de" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #bc2904;"><span
                                            class="ios ion-android-delete"></span>
                                        &nbsp;Deudores Eliminados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['DE'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Acreedores Ingresados -->
            <?php if ($Notificacion['AI'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Acreedores Ingresados</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['AI'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--  Acreedores  Actulaizados-->
            <?php if ($Notificacion['AA'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Acreedores Actualizados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['AA'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Acreedores  Eliminados-->
            <?php if ($Notificacion['AE'] != ''): ?>
                <section id="de" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #bc2904;"><span
                                            class="ios ion-android-delete"></span>
                                        &nbsp;Acreedores Eliminados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['AE'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Usuarios Ingresados -->
            <?php if ($Notificacion['UI'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Usuarios Ingresados</h3>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['UI'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--  Usuarios  Actulaizados-->
            <?php if ($Notificacion['UA'] != ''): ?>
                <section id="dia" class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #3c8dbc;"><span
                                            class="ios ion-person-add"></span>
                                        &nbsp;Usuarios Actualizados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['UA'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Usuarios  Eliminados-->
            <?php if ($Notificacion['UE'] != ''): ?>
                <section id="de" class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #bc2904;"><span
                                            class="ios ion-android-delete"></span>
                                        &nbsp;Usuarios Eliminados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['UE'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Recibos insertados-->
            <?php if ($Notificacion['RI'] != ''): ?>
                <section id="de" class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 style="padding: 20px;color: #34a38e;"><span
                                            class="ios ion ion-android-add-circle"></span>&nbsp;Recibos Creados</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <?= $Notificacion['RI'] ?>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php else: ?>
            <br>
            <div class="text-center"  >

                    <span class="ion ion-ios-bell" style="font-size: 100pt;color:#3c8dbc;"><br/><span
                            style="font-size: 20pt;font-family: arial , sans-serif">Estas al día con todo!</span></span>
            </div>
        <?php endif; ?>
    </div>
</div>


<!-- /.content-wrapper -->
<style>
    tbody tr:hover {
        background: #ebf0ff !important;
        cursor: pointer;
    }
</style>
<?= $Footer ?>
</body>
</html>