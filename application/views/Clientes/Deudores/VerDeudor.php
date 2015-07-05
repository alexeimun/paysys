<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue sidebar-mini">
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#b00000;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-ios-grid-view"></span>
                Información Deudor
            </h1>
        </section>
        <!-- Main content -->

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #b00000;"/>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" value="<?= $Info->NOMBRE ?>"
                               name="NOMBRE"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Documento:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero documento"
                               value="<?= $Info->DOCUMENTO ?>"
                               name="DOCUMENTO">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Ciudad:</label>

                    <div class="col-lg-10">
                        <input type="text" id="ciudad" class="form-control" value="<?= $Ciudad ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="DIRECCION"
                               value="<?= $Info->DIRECCION ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero"
                               value="<?= $Info->TELEFONO ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Celular:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero telefono" name="CELULAR" value="<?=$Info->CELULAR ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Correo:</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control"
                               value="<?= $Info->CORREO ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Encargado:</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="ENCARGADO" value="<?= $Info->ENCARGADO ?>">
                    </div>
                </div>

                <?php if ($Solicitudes != ''): ?>
                    <br/><br/>
                    <div class="box">
                        <div class="box-header bg-gray">
                            <h3 style="color:#7d7d80;text-align: center"><span class="ion ion-shuffle"></span> Solicitudes</h3>
                        </div>
                        <div class="box-body">
                            <?= $Solicitudes ?>
                        </div>

                    </div>
                <?php endif ?>
            </form>
        </div>

        <?php if ($Referencias != ''): ?>
            <br/><br/>
            <div class="container" id="referencias">
                <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;">
                    <h3 style="color:#00A65A;text-align: center"><span class="ion ion-person-stalker"></span> Referencias</h3>
                    <hr style="border: 2px solid #00A65A"/>
                    <br>
                    <?= $Referencias ?>
                </form>
            </div>
        <?php endif ?>
        <br/><br/>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>