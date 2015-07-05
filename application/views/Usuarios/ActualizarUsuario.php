<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<!--Spin.js-->
<script src="<?= base_url() ?>public/plugins/spin/spin.min.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.js"></script>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#0000c0;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-edit"></span>
                Actualizar Usuario
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #0000c0;"/>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control obligatorio" value="<?= $Info->NOMBRE ?>"
                               placeholder="Ingrese el nombre" readonly
                               name="NOMBRE">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Correo:</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control obligatorio" name="CORREO" value="<?= $Info->CORREO ?>"
                               readonly
                               placeholder="Ingrese el correo electrónico">
                    </div>
                </div>

                <h3 style="text-align: center;color:#615963"><span class="ion ion-key"></span> Roles y permisos</h3>
                <hr style="border: 1px solid #615963;"/>

                <div class="form-group">
                    <label class="col-lg-push-1 col-lg-4 control-label">Tipo usuario:</label>

                    <div class="col-lg-push-1 col-lg-4">
                        <?php if ($Info->NIVEL > 0): ?>
                            <select name="NIVEL" class="form-control">
                                <option value="0">Común</option>
                                <option value="1" selected>Administrador</option>
                            </select>
                        <?php else: ?>
                            <select name="NIVEL" class="form-control">
                                <option value="0">Común</option>
                                <option value="1">Administrador</option>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>

                <?= $Modulos ?>

                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg enviar"><span
                                class="glyphicon glyphicon-send"></span>&nbsp; Guardar
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

    $('form').on(events, elements, function () {jValidate($(this), event)});

    function ListarCheckBox()
    {
        var Checks = [];
        $('input:checkbox').not('.all').each(function (i, e)
        {
            Checks.push($(e).val());
        });
        return Checks;
    }

    $('body').on('ifChecked', 'input:checkbox', function ()
    {
        $(this).val(1);
    });

    $('body').on('ifUnchecked', 'input:checkbox', function ()
    {
        $(this).val(0);
    });

    (new Spinner({
        lines: 10, width: 4,
        radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
    })).spin(document.getElementById("spin"));

    //Envíar
    $('.enviar').click(function ()
    {
        if (validateForm())
        {
            $.ajax({
                type: 'post',
                url: '<?=site_url('actualizaUsuario') ?>',
                data: {Chks: ListarCheckBox(), NIVEL: $('select[name=NIVEL] :selected').val(),ID_USUARIO:<?= $Info->ID_USUARIO ?>},
                beforeSend: function ()
                {
                    $('body').addClass('Wait');
                    $('body').animate({scrollTop: 0}, 200);
                    $('#spin').show();
                },
                success: function ()
                {
                    $('body').removeClass('Wait');
                    Alerta();
                    $('#spin').hide();
                }
            });
        }
    });
    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El usuario se ha actualizado correctamente...',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (dialogItself)
                {
                    dialogItself.close();
                }
            }]
        });
    }

</script>

<style>
    tbody tr:hover {
        background: #ebf0ff !important;
        cursor: pointer;
    }
</style>
<script>
    $(function ()
    {
        $('input:checkbox').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '70%' // optional
        });
    });
</script>
<?= $Footer ?>
</body>
</html>
