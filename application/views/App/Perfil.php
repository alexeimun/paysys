<!DOCTYPE html>
<html>
<body class="skin-blue sidebar-mini">
<?= $Head ?>
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
            <h1 style="color:#857ff0; text-align: center;margin-top: 20px;"><span class="ion ion-ios-paper"></span> Mi
                Perfil
                <small></small>
            </h1>
        </section>
        <br>
        <!-- Main content -->

        <div style="text-align: center;" id="imagen">
            <img style="width: 130px;height: 130px;cursor: pointer"
                 src="<?= base_url() ?>/public/images/Avatars/avatar<?= $this->session->userdata('AVATAR') ?>.png"
                 class="img-circle" alt="User Image"/>
        </div>
        <br>

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>

                    <div class="col-lg-9">
                        <input type="text" class="obligatorio form-control"
                               value="<?= $this->session->userdata('NOMBRE_USUARIO') ?>"
                               placeholder="Ingrese el nombre" name="NOMBRE">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Correo:</label>

                    <div class="col-lg-9">
                        <input type="email" class="form-control obligatorio correo correo_unico"
                               value="<?= $this->session->userdata('CORREO') ?>" name="CORREO"
                               placeholder="Ingrese el correo  electrónico">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Clave:</label>

                    <div class="col-lg-9">
                        <input type="password" class="form-control obligatorio clave claveinicial"
                               value="<?= $this->session->userdata('CLAVE') ?>" name="CLAVE"
                               placeholder="Ingrese la contraseña">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Comprobar Clave:</label>

                    <div class="col-lg-9">
                        <input type="password" class="form-control obligatorio clave confirmar"
                               value="<?= $this->session->userdata('CLAVE') ?>"
                               placeholder="Confirmar contraseña">
                    </div>
                </div>

                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-6 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-edit"></span>&nbsp; Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
    <script>
        var Avatares = 1;
        var Prev = null;

        $('form').on(events, elements, function () {jValidate($(this), event)});
        url = '<?=site_url('ValidaCampos') ?>';
        emailUser = '<?= $this->session->userdata('CORREO') ?>';

        $('button:button').click(function ()
        {
            if (validateForm())
            {
                if ($('.correo').val() != emailUser)
                {
                    $.post('ValidaCampos', {'CORREO': $('input.correo').val()}, function (data)
                    {
                        if (data == 'no')
                        {
                            $('.correo').closest('div').addClass('has-error error_correo_existe');
                            $('body,html').animate({scrollTop: 0}, 200);
                        }
                        else Update();
                    });
                }
                else Update();
            }

        });

        function Update()
        {
            $.ajax({
                type: 'post', url: '<?=site_url('actualizaUsuarioPerfil') ?>', data: $('form').serialize(),
                beforeSend: function ()
                {
                    $('body').addClass('Wait');
                    $('body,html').animate({scrollTop: 0}, 200);
                    $('#spin').show();
                },
                success: function ()
                {
                    console.log('popo');
                    $('body').removeClass('Wait');
                    Alerta();
                    $('#spin').hide();
                }
            });
        }

        function Alerta()
        {
            BootstrapDialog.show({
                title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
                message: 'Tu perfil se ha actualizado correctamente...',
                draggable: true,
                buttons: [{
                    label: 'Cerrar',
                    action: function (dialogItself)
                    {
                        dialogItself.close();
                        location.replace('<?=site_url('perfil')?>');
                    }
                }]
            });
        }


        $(document).ready(function ()
        {
            var avatars = '<div class="container imgs">' +
                '<img id="a1" draggable="false"  src="<?= base_url() ?>public/images/Avatars/avatar1.png"  class="image-responsive img-thumbnail"/>' +
                '<img id="a2" draggable="false"  src="<?= base_url() ?>public/images/Avatars/avatar2.png" class="image-responsive img-thumbnail"/>' +
                '<img id="a3" draggable="false" src="<?= base_url() ?>public/images/Avatars/avatar3.png" class="image-responsive img-thumbnail"/><br>' +
                '<img id="a4" draggable="false" src="<?= base_url() ?>public/images/Avatars/avatar4.png" class="image-responsive img-thumbnail"/>' +
                '<img id="a5" draggable="false" src="<?= base_url() ?>public/images/Avatars/avatar5.png"  class="image-responsive img-thumbnail"/>' +
                '</div>';

            $('body').on('click', '.container img', function ()
            {

                if (Prev != null)
                    Prev.removeClass('Selection');
                Prev = $(this);
                Prev.addClass('Selection');
                Avatares = Prev.attr('id').substring(1);
                console.log(Avatares);
            });

            $('img.img-circle').click(function ()
            {
                BootstrapDialog.show({
                    title: '<span class="ion ion-person" style="font-size: 20pt;font-weight: bold; color: white;"></span>&nbsp;&nbsp;&nbsp; <span  style="font-size: 18pt;">Selecciona tu avatar</span>',
                    type: BootstrapDialog.TYPE_SUCCESS,
                    draggable: true,
                    message: avatars,
                    buttons: [
                        {
                            label: 'Cerrar',
                            cssClass: 'btn-default',
                            action: function (dialogItself)
                            {
                                dialogItself.close();
                            }
                        },
                        {
                            label: 'Aceptar',
                            cssClass: 'btn-success',
                            autospin: true,
                            icon: 'glyphicon glyphicon-send',
                            action: function ()
                            {
                                $.post('ActualizaAvatarUsuario', {'Avatar': Avatares}, function ()
                                {
                                    location.href = 'perfil';
                                });
                            }
                        }
                    ]
                });
            });
        });
    </script>
    <style>
        img.img-thumbnail
        {
            min-width: 45px;
            min-height: 45px;
            max-height: 170px;
            max-width: 170px;
            width: 15%;
            height: 30%;
            margin: 5px;
            cursor: pointer;
        }

        img.img-thumbnail:hover
        {
            box-shadow: 2px 2px 2px 2px #3c9be4;
        }

        .Selection
        {
            box-shadow: 2px 2px 2px 2px #52b532;
        }

        #imagen img:hover
        {
            box-shadow: 1px 1px 20px 2px #3c9be4;
            transform: rotate(10deg);
        }

    </style>

    <!-- /.content-wrapper -->
    <?= $Footer ?>
</body>
<style>


</style>
</html>