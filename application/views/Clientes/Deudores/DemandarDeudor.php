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
            <h1 style="color:#ba0806;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="glyphicon glyphicon-briefcase"></span>
                Demandas
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" target="_blank"
                  style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #ba0806;"/>
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

                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div id="but">
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

    var Solicitud = $('select[name=ID_SOLICITUD]');

    Solicitud.change(function () {
        if ($('select[name=ID_SOLICITUD] :selected').val() != 0) {
            $.post('<?=site_url('cliente/DemandarDeudor') ?>', {
                ID_SOLICITUD: Solicitud.val(),
                ACTION: 'switch'
            }, function (data) {
                $('#but').html(data);
            });
        }
        else {
            $('#but').html('');
        }
    });
    $('body').on('click', '#send-ajax', function () {
        var status = $(this).data('tipo');
        $.ajax({
            type: 'post', url: '<?=site_url('cliente/DemandarDeudor') ?>', data: {
                'ESTADO': status,
                ID_SOLICITUD: $('select[name=ID_SOLICITUD] :selected').val(),
                'ACTION':'a'
            },
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
    });

    function Alerta() {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'La petición se ha realizado correctamente..',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (close) {
                    location.href='';
                }
            }]
        });
    }

</script>

<?= $Footer ?>

<style>
    .visor, input[name=CAPITAL_INICIAL]
    {
        color: #149311;
        font-weight: bold;
        text-align: center;
        border: 1px solid #149311;
    }

</style>

</body>
</html>