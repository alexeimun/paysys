<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<link rel="stylesheet" href="<?= base_url() ?>/public/js/DropDown/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>/public/js/DropDown/chosen.css">
<script src="<?= base_url() ?>/public/js/DropDown/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/public/js/DropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>/public/js/DropDown/docsupport/combo.js"></script>
<!--Spin.js-->
<script src="<?= base_url() ?>/public/plugins/spin/spin.min.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>/public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>/public/plugins/Jvalidator/Jvalidator.css">


<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#0000c0;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-person"></span>
                Sesión de crédito del acreedor
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;">
                <hr style="border: 1px solid #0000c0;"/>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Transferir:</label>

                    <div class="col-lg-10">
                        <select name="FROM" class="form-control chosen-select" style="width:320px;">
                            <?= $FromAcreedores ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">A:</label>

                    <div class="col-lg-10">
                        <select name="TO" class="form-control chosen-select"
                                style="width:320px;">
                            <?= $Acreedores ?>
                        </select>
                    </div>
                </div>
                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="button" class="btn btn-success"><span
                                class="glyphicon glyphicon-send"></span>&nbsp; Realizar transacción
                        </button>
                    </div>
                </div>
                <div id="spin" style="text-align: center;position: static;"></div>
            </form>

        </div>
        <br/><br/>
    </div>
</div>

<script>

    (new Spinner({
        lines: 10, width: 4,
        radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
    })).spin(document.getElementById("spin"));

    //Envíar
    $('button:button').click(function () {
        var to = $('select[name=TO] :selected').val();
        var from = $('select[name=FROM] :selected').val();
        if (from == 0) Message('Debe selecionar un <b>Acreedor</b> para transferir');
        else if (to == 0) Message('Debe selecionar un <b>Acreedor</b> para que reciba la transferencia');
        else if (to == from)
            Message("Debe especificar dos acreedores distintos...");
        else Save();
    });
    function Alerta() {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El acreedor se ha transferido corectamente.',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }]
        });
    }
    function Save() {
        $.ajax({
            type: 'post', url: 'sesion_credito_acreedor', data: $('form').serialize(),
            beforeSend: function () {
                $('body').addClass('Wait');
                $('body,html').animate({scrollTop: 0}, 200);
                $('#spin').show();
            },
            success: function () {
                $('body').removeClass('Wait');
                Alerta();
                $('#spin').hide();
            }
        });
    }

</script>

<?= $Footer ?>

</body>
</html>