<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<!--Jvalidator-->

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#3c8dbc;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-ios-grid-view"></span>
                Información Inmueble
            </h1>
        </section>
        <!-- Main content -->
        <br><br>

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">

                <div style="text-align: center;" id="cont">
                    <img src="<?= base_url('public/images/Inmuebles/' . $Info->TIPO . '.png') ?>" draggable="false"
                         class="img-responseive" alt="Tipo inmueble"/></div>
                <br>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Tipo:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?= $Info->TIPO_INMUEBLE ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label">Propietario:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?= $Info->NOMBRE_DEUDOR ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Estado:</label>

                    <div class="col-lg-10">
                        <?php if($Info->UTILIZADO==0): ?>
                        <small class="label bg-green" style="font-size: 10pt;" data-toggle="tooltip" title="Libre!">Disponible</small>
                        <?php else: ?>
                        <small class="label" style="font-size: 10pt;background: #ef205c" data-toggle="tooltip" title="Este inmueble esta siendo usado por una solicitud">No Disponible</small>
                        <small class="label btn" onclick="window.open('<?=site_url('versolicitud'.'/'.$Info->ID_SOLICITUD) ?>')" style="font-size: 10pt;background: #1e7ef2" data-toggle="tooltip" title="ver solicitud"><span style="font-size: 10pt;" class="ion ion-alert"></span> Ver solicitud</small>
                        <?php endif?>
                    </div>
                </div>

                <h3 style="text-align: center;color:#00979a;"><span class="ion ion-ios-location"></span> Ubicación</h3>
                <hr style="border: 1px solid #00979a;"/>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Ciudad:</label>

                    <div class="col-lg-10">
                        <input type="text" id="ciudad" class="form-control" value="<?= $Info->NOMBRE_CIUDAD ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="DIRECCION"
                               placeholder="Ingrese la dirección" value="<?= $Info->DIRECCION ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Cerca a:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control"
                               value="<?= $Info->CERCA ?>"
                               placeholder="Lugares o sitios cercanos al inmueble">
                    </div>
                </div>

                <h3 style="text-align: center;color:#d64219;"><span class="glyphicon glyphicon-book"></span> Jurídico
                </h3>
                <hr style="border: 1px solid #d64219;"/>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Número notaría:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= $Info->NUMERO_NOTARIA ?>"
                               placeholder="Ingrese el número de notaría">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Número escritura:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio numero"
                               value="<?= $Info->NUMERO_ESCRITURA ?>"
                               placeholder="Ingrese el número de la escritura">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Matrícula inmobiliaria:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio" value="<?= $Info->MATRICULA ?>"
                               placeholder="Ingrese la matrícula inmobiliaria">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha constitución:</label>

                    <div class="col-lg-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha"
                                   value="<?= $Info->FECHA_CONSTITUCION ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha entrega escritura: </label>

                    <div class="col-lg-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha"
                                   value="<?= $Info->FECHA_ENTREGA_ESCRITURA ?>"
                                   required>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <br/><br/>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>