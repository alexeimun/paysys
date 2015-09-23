<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue sidebar-mini">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/chosen.css">
<script src="<?= base_url() ?>public/js/DropDown/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/combo.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
<script src="<?= base_url() ?>public/plugins/priceFormat/priceFormat.js"></script>


<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#0d9155;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ion-checkmark"></span>
                Paz y Salvo
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" target="_blank"
                  style="margin-left: 20%;" action="<?= site_url('pazysalvo') ?>"
                  method="post">
                <hr style="border: 1px solid #0d9155;"/>
                <br>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Solicitud:</label>

                    <div class="col-lg-9">
                        <select name="ID_SOLICITUD" class="form-control chosen-select"
                                style="width:350px;">
                            <?= $Solicitudes ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Cancelación:</label>

                    <div class="col-lg-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha" name="FECHA_CANCELACION"
                                   value="<?= date('Y-m-d') ?>"
                                   required>
                        </div>
                    </div>
                </div>

                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-10">
                        <button type="submit" id="save" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-print"></span>&nbsp; Imprimir
                        </button>
                    </div>
                </div>
                <br>

                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>

<script>

    $('form').on('submit', function () {
        if ($('select[name=ID_SOLICITUD] :selected').val() == 0) {
            event.preventDefault();
            Message('Debe selecccionar una solicitud...');
        }
    });
</script>

<?= $Footer ?>


</body>
</html>