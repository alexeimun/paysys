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

        <br>
        <br>

        <div class="container">

            <form class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post">


                <div class="form-group">
                    <span class="col-lg-push-1 col-lg-2 badge bg-yellow-gradient"
                          style="padding: 5px;">Prioridad: <?= $Info->PRIORIDAD ?></span>
                    <?php if ($Info->ESTADO == 1): ?>
                        <span class="col-lg-push-1 col-lg-3 badge bg-green-gradient"
                              style="padding: 5px;margin-left: 10px;"><span class="ion ion-checkmark-round"></span> Solucionado</span>
                    <?php else: ?>
                        <span class="col-lg-push-1 col-lg-3 badge bg-red-gradient"
                              style="padding: 5px;margin-left: 10px;"><span class="ion ion-close-circled"> </span> Sin Solucionar</span>
                    <?php endif ?>

                    <?php if ($Info->VISTO == 1): ?>
                        <span class="col-lg-push-1 col-lg-2 badge bg-green-gradient"
                              style="padding: 5px;margin-left: 10px;"><span class="ion ion-checkmark-round"></span> Visto</span>

                    <?php else: ?>
                        <span class="col-lg-push-1 col-lg-2 badge bg-red-gradient"
                              style="padding: 5px;margin-left: 10px;"><span
                                class="ion ion-close-circled"></span> No Visto</span>
                    <?php endif; ?>

                    <span class="col-lg-push-1 col-lg-3 badge bg-blue-gradient"
                          style="padding: 5px;margin-left: 10px;"><?= Fecha($Info->FECHA) ?></span>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-lg-1 control-label">Autor</label>

                    <div class="col-lg-11">
                        <input type="text" class="form-control" value="<?= $Info->NOMBRE ?>"
                               style="cursor: text;background: #ffffff;" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-1 control-label">Asunto</label>

                    <div class="col-lg-11">
                        <input type="text" class="form-control" value="<?= $Info->ASUNTO ?>"
                               style="cursor: text;background: #ffffff;" readonly>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">

                        <div class='box'>
                            <div class='box-header' style="background: #d8d7d7">
                                <h3 class='box-title'>Observación</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class='box-body pad' style="padding: 20px;">
                                <?= $Info->OBSERVACION ?>
                            </div>
                        </div>

                    </div>
                </div>

                <?php if($Galeria!=''): ?>
                <h3 style="text-align: left;color:#8b8c8f" id="inmueble"><span style="font-size: 23pt;"
                                                                               class="ion ion-paperclip"></span>
                    Archivos adjuntos...</h3>
                <hr style="border: 1px dashed #8b8c8f;"/>
                <div class="form-group galeria">
                    <?= $Galeria ?>
                </div>
                <hr style="border: 1px dashed #8b8c8f;"/>
                <?php endif ?>
            </form>

            <br><br>

            <?php if ($Autor && $Info->ESTADO == 0): ?>
                <form id="solucionar" class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                      method="post">
                    <div class="form-group">
                        <div class="col-lg-push-2 col-lg-12" style="color:lightslategrey;font-size: 15pt;">
                            <input type="hidden" value="<?= $Info->ID_OBSERVACION ?>" name="ID_OBSERVACION"/>
                            ¿Ya se ha solucionado la observación? &nbsp;<input type="button"
                                                                               class="btn btn-primary solucionar"
                                                                               value="Sí, solucionado"/>
                        </div>
                    </div>
                </form>
            <?php endif ?>
            <form id="comment" class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post">
                <h3 style="color:lightslategrey ">Comentarios...</h3>
                <br/>

                <div class="form-group">
                    <img style="width: 70px;height: 60px;"
                         src="<?= base_url() ?>public/images/Avatars/avatar<?= $this->session->userdata('AVATAR') ?>.png"
                         class="col-lg-2 img-responsive form-control" alt="User Image"/>
                    <div class="col-lg-10">

                        <div class="input-group">
                            <input type="hidden" value="<?= $Info->ID_OBSERVACION ?>" name="ID_OBSERVACION"/>
                            <textarea class="form-control " style="height: 60px;max-width: 500px;" name="COMENTARIO"
                                      placeholder="Deja tu comentario..."></textarea>

                            <div class="input-group-addon bg-blue-gradient comentar"
                                 style="cursor: pointer;font-size: 13pt;padding-left:10px;padding-right:10px;color: #ffffff ">
                                Comentar
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <form id="comments" class="form-horizontal col-md-7" role="form" style="margin-left: 20%;">
                <?= $Comentarios ?>
            </form>
        </div>
        <br/><br/>
    </div>

</div>

<script>
    $('.cajon').hover(function ()
    {
        $(this).addClass('op');
        $(this).find('img').hide(200);
        $(this).append('<h2 style="color: #00994d;padding:10px;"><span class="glyphicon glyphicon-download"></span> Descargar</h2>');
    });
    $('body').on('mouseleave', '.galeria .cajon', function ()
    {
        $(this).find('h2').remove();
        $(this).find('img').show(200);
        $(this).removeClass('op');
    });

    $('body').on('click', '.cajon', function ()
    {
        if($(this).hasClass('doc'))
        {
            window.open('<?=base_url('observacionesimages') ?>' + '/' + $(this).attr('data-id'));
        }
        else window.open('<?=site_url('DescargarArchivo') ?>' + '/' + $(this).attr('data-id')+'/'+$(this).attr('data-name'));
    });

    $('.comentar').click(function ()
    {
        if ($('textarea[name=COMENTARIO]').val().trim() != '')
        {
            killMessage();
            $.post('<?=site_url('crearcomentario') ?>', $('#comment').serialize(), function (reply)
            {
                $('textarea[name=COMENTARIO]').val('');
                $('#comments').html(reply);
            });
        }
        else Message('El comentario no puede estar vacío...', 'danger', '#comment');
    });

    $('.solucionar').click(function ()
    {
        $.post('<?=site_url('solucionar') ?>', $('#solucionar').serialize(), function ()
        {
            location.href = '<?=site_url('verobservacion/'.$Info->ID_OBSERVACION) ?>';
        });
    });

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
