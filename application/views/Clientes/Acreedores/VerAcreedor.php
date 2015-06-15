<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.js"></script>
<script src="<?= base_url() ?>public/plugins/priceFormat/priceFormat.js"></script>

<script>
        $('input:checkbox').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '70%' // optional
        });

</script>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#0000c0;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-ios-grid-view"></span>
                Información Acreedor
            </h1>
        </section>
        <!-- Main content -->

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #0000c0;"/>
                <div class="form-group">
                    <label  class="col-lg-2 control-label">Nombre:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" value="<?= $Info->NOMBRE ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Documento:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero documento"
                               value="<?= $Info->DOCUMENTO ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Ciudad:</label>

                    <div class="col-lg-10">
                        <input type="text" id="ciudad" class="form-control"  value="<?= $Ciudad ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="DIRECCION"
                               value="<?= $Info->DIRECCION ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control"
                               value="<?= $Info->TELEFONO ?>"
                          >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Celular:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero telefono" name="CELULAR" value="<?=$Info->CELULAR ?>"
                             >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Correo:</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control"
                               value="<?= $Info->CORREO ?>">
                    </div>
                </div>

                <h3 style="text-align: center;color:#149311"><span class="ion ion-cash"></span> Financiero</h3>
                <hr style="border: 1px solid #149311;"/>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre cuenta:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control"
                               value="<?= $Info->NOMBRE_CUENTA ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Número cuenta:</label>

                    <div class="col-lg-8">
                        <input type="email" class="form-control"
                               value="<?= $Info->NUMERO_CUENTA ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label"></label>

                    <div class="col-lg-8">
                        <input type="checkbox"  <?= $Info->MANEJO_CARTERA == 1 ? 'checked' : '' ?> disabled> <strong> Manejo
                            Cartera</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label"></label>

                    <div class="col-lg-8">
                        <input type="checkbox"  <?= $Info->RECLAMA_PERSONALMENTE == 1 ? 'checked' : '' ?> disabled> <strong>
                            Reclama Personalmente</strong>
                    </div>
                </div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>
<script>
    $('input:checkbox').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '70%' // optional
    });

    $('input.dinero').priceFormat({
        prefix: '$ ',
        thousandsSeparator: ','
    });
</script>

<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>