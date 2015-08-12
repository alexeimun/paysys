<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue sidebar-mini">
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?= base_url() ?>/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"
      type="text/css"/>
<!--Spin.js-->
<script src="<?= base_url() ?>public/plugins/spin/spin.min.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.js"></script>

<script src="<?= base_url() ?>public/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/plugins/uploadify/uploadify.css">
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>


<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <div class="container">

            <form class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">
                <h3 style="color:#b95801;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                     class="ios on-alert"></span>
                    Crear Observación
                </h3>

                <hr style="border: 1px solid #b95801;"/>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Prioridad:</label>

                    <div class="col-lg-4" id="tipo">
                        <select class="form-control obligatorio" name="PRIORIDAD">
                            <option value="0">Baja</option>
                            <option value="1" selected>Normal</option>
                            <option value="2">Alta</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Asunto:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="ASUNTO"
                               placeholder="Ingrese el asunto">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <div class='box'>
                            <div class='box-header'>
                                <h3 class='box-title'>Ingresa tu observación</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class='box-body pad'>
                                <textarea class="textarea" name="OBSERVACION"
                                          placeholder="Escriba su mensaje detalladamente"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 style="text-align: center;color:#8b8c8f" id="inmueble"><span style="font-size: 23pt;"
                                                                                 class="ion ion-paperclip"></span>
                    Adjuntar archivos</h3>
                <hr style="border: 1px solid #8b8c8f;"/>
                <div>
                    <div style="margin-left: 40%">
                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                    </div>
                </div>
                <br><br>

                <div class="form-group galeria">
                    <?= $Galeria ?>
                </div>
                <br><br>

                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg"><span
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

<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function ()
    {
        $('#file_upload').uploadify({
            'formData': {
                'timestamp': '<?= $timestamp;?>',
                'token': '<?= md5('unique_salt' . $timestamp);?>'
            },
            'swf': '<?=base_url('public/plugins/uploadify/uploadify.swf') ?>',
            'uploader': 'adjuntarobservacion',
            'onUploadSuccess': function (file, data)
            {
                $('.galeria').html(data).hide().show(500);
            }
        });
    });
</script>

<script>

    $('form').on(events, elements, function () {jValidate($(this), event); });

    (new Spinner({
        lines: 10, width: 4,
        radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
    })).spin(document.getElementById("spin"));

    //Envíar
    $('button:button').click(function ()
    {
        if (validateForm())
        {
            $.ajax({
                type: 'post', url: 'insertaObservacion', data: $('form').serialize(),
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
    });

    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'Observación correctamente creada...',
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

    $('.galeria').on('mouseover', '.cajon', function ()
    {
        $(this).addClass('op');
        $(this).find('img').hide(200);
        if($(this).find('h2').length==0)
        $(this).append('<h2 style="color: #E54040;padding:20px;"><span class="ion ion-android-delete"></span> Eliminar</h2>');
    });
    $('body').on('mouseleave', '.galeria .cajon', function ()
    {
        $(this).find('h2').remove();
        $(this).find('img').show(200);
        $(this).removeClass('op');
    });

    $('body').on('click', '.cajon', function ()
    {
        $.post('EliminarArchivo', {ARCHIVO: $(this).attr('data-id')}, function (data)
        {
            $('.galeria').html(data).hide().show(500);
        });
    });

    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

</script>
<style>

    .op {
        background: #ffffff;
        opacity: .8;
        cursor: pointer;
    }

</style>

<?= $Footer ?>

</body>
</html>
