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
                                                                                 class="ios ion-person-add"></span>
                Crear Usuario
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #0000c0;"/>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio" placeholder="Ingrese el nombre"
                               name="NOMBRE">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Correo:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio correo correo_unico" name="CORREO"
                               placeholder="Ingrese el correo electrónico">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Contraseña:</label>

                    <div class="col-lg-8">
                        <input type="password" class="form-control obligatorio clave claveinicial" name="CLAVE"
                               placeholder="Ingrese la contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Confirmar Contraseña:</label>

                    <div class="col-lg-8">
                        <input type="password" class="form-control obligatorio clave confirmar"
                               placeholder="Confirmar contraseña">
                    </div>
                </div>

                <h3 style="text-align: center;color:#615963"><span class="ion ion-key"></span> Roles y permisos</h3>
                <hr style="border: 1px solid #615963;"/>

                <div class="form-group">
                    <label class="col-lg-push-1 col-lg-4 control-label">Tipo usuario:</label>

                    <div class="col-lg-push-1 col-lg-4">
                        <select name="NIVEL" id="" class="form-control">
                            <option value="0">Común</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                </div>

                <?= $Modulos ?>

                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg enviar"><span
                                class="glyphicon glyphicon-send"></span>&nbsp; Actualizar
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
    url = '<?=site_url('ValidaCampos') ?>';

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

    $('body').on('ifChanged', 'input:checkbox', function ()
    {
        var check = $(this);

        if (check.hasClass('all'))
        {
            if (check.prop('checked'))
            {
                check.closest('.box').find('table input:checkbox').each(function (i, e)
                {
                    $(e).iCheck('check');
                });
            }
            else
            {
                check.closest('.box').find('table input:checkbox').each(function (i, e)
                {
                    $(e).iCheck('uncheck');
                });
            }
        }
        else
        {
            if (!check.prop('checked'))
            {
                check.closest('.box').find('.all').iCheck('uncheck');
            }
        }
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
            if ($('.confirmar').val() == $('.claveinicial').val())
            {
                if ($('.claveinicial').val().length > 5)
                {
                    $.ajax({
                        type: 'post', url: 'insertarUsuario', data: {
                            Chks: ListarCheckBox(),
                            NOMBRE: $('input[name=NOMBRE]').val(),
                            CORREO: $('input[name=CORREO]').val(),
                            CLAVE: $('input[name=CLAVE]').val(),
                            NIVEL: $('select[name=NIVEL] :selected').val()
                        },
                        beforeSend: function ()
                        {
                            $('body').addClass('Wait');
                            $('body,html').animate({scrollTop: 0}, 200);
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
                else Message('La longitud de la contraseña debe ser al menos de 6 dígitos');
            }
            else Message('Las contraseñas deben coinsidir');
        }
    });
    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El usuario se ha creado correctamente...',
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
