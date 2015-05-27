<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/chosen.css">
<script src="<?= base_url() ?>public/js/DropDown/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/combo.js"></script>
<!--Spin.js-->
<script src="<?= base_url() ?>public/plugins/spin/spin.min.js"></script>
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
                                                                                 class="ios ion-edit"></span> Actualizar
                Deudor
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
                               placeholder="Ingrese el nombre"
                               name="NOMBRE"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Documento:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero documento"
                               value="<?= $Info->DOCUMENTO ?>"
                               name="DOCUMENTO"
                               placeholder="Ingrese el número del documento">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Ciudad:</label>
                    <div class="col-lg-10">
                        <select name="ID_CIUDAD" class="form-control chosen-select"
                                style="width:220px;">
                            <?= $Ciudades ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="DIRECCION"
                               value="<?= $Info->DIRECCION ?>"
                               placeholder="Ingrese la dirección">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero telefono" name="TELEFONO"
                               value="<?= $Info->TELEFONO ?>"
                               placeholder="Ingrese el teléfono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Celular:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control numero telefono" name="CELULAR"
                               value="<?= $Info->CELULAR ?>"
                               placeholder="Ingrese el número de celular del deudor">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Correo:</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control correo" name="CORREO"
                               value="<?= $Info->CORREO ?>"
                               placeholder="Ingrese el correo electrónico" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Encargado:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="ENCARGADO" value="<?= $Info->ENCARGADO ?>"
                               placeholder="Ingrese el encargado del pago">
                    </div>
                </div>
                <h3 style="text-align: center;color:#00A65A;"><span class="ion ion-person-stalker"></span> Referencias
                </h3>
                <hr style="border: 2px solid #00A65A"/>

                <div id="ref"><?= $Referencias ?></div>
                <div style="text-align: center;">
                    <span data-toggle="tooltip" title="Agregar nueva referencia"
                          style="font-size: 35pt;font-weight: bold; color:  #00A65A;cursor: pointer;"
                          class="ion ion-android-add"></span>
                </div>
                <input name="Ideudor" value="<?= $Info->ID_DEUDOR ?>" type="hidden"/>

                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg"><span
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

    url = '<?=site_url('ValidaCampos') ?>';
    docId = <?=$Info->DOCUMENTO ?>;

    $(document).ready(function ()
    {


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
                if ($('input.documento').val() != docId)
                {
                    $.post(url, {'DOCUMENTO': $('input.documento').val(), CLIENTE: cliente}, function (data)
                    {
                        if (data == 'no')
                        {
                            $('input.documento').closest('div').addClass('has-error error_documento');
                            $('body,html').animate({scrollTop: 0}, 200);
                        }
                        else Save();
                    });
                }
                else Save();
            }
        });

        function Alerta()
        {
            BootstrapDialog.show({
                title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
                message: 'Se han actualizado los datos del deudor correctamente...',
                draggable: true,
                buttons: [{
                    label: 'Cerrar',
                    action: function (dialogItself)
                    {
                        dialogItself.close();
                        location.href = '<?=site_url('actualizardeudor').'/'.$Info->ID_DEUDOR ?>';
                    }
                }]
            });
        }

        function Save()
        {
            $.ajax({
                type: 'post', url: '<?=site_url('actualizaDeudor') ?>', data: $('form').serialize(),
                beforeSend: function ()
                {
                    $('body').addClass('Wait');
                    $('body,html').animate({scrollTop: 0}, 200);
                    $('#spin').show();
                },
                success: function (data)
                {
                    console.log(data);
                    $('body').removeClass('Wait');
                    Alerta();
                    $('#spin').hide();
                }
            });
        }
    });
</script>

<script>

    var rows = 0;
    $(document).ready(function ()
    {
        rows = $('#ref>div').length;
        $('div span.ion-android-add').click(function ()
        {
            if (rows <= 15)
                $('#ref').append('<div><div style="text-align:left;font-size: 14pt; color: #939695;">Referencia #' + (++rows) + '</div>' +
                '<div style="text-align: center;"><span onclick="Eliminar(this)" data-toggle="tooltip" title="Eliminar referencia" class="ion ion-android-delete" style="font-size: 25pt;font-weight: bold; color:  #e54040;cursor: pointer;"></span></div><br>' +
                '<div class="form-group"> <label  class="col-lg-2 control-label">Tipo:</label> <div class="col-lg-10"> <select class="form-control" name="TIPO_REFERENCIA[]"><option value="0">Personal</option><option value="1">Familiar</option> </select> </div> </div>' +
                '<div class="form-group"> <label  class="col-lg-2 control-label">Nombre:</label> <div class="col-lg-10"> <input type="text" name="NOMBRE_REFERENCIA[]" class="form-control obligatorio"  placeholder="Ingrese el nombre de la referencia"> </div> </div>' +
                '<div class="form-group"> <label  class="col-lg-2 control-label">Telefono:</label> <div class="col-lg-10"> <input type="text" class="form-control obligatorio numero telefono" name="TELEFONO_REFERENCIA[]"  placeholder="Ingrese el teléfono de la referencia"> </div> </div>' +
                '<div class="form-group"> <label  class="col-lg-2 control-label">Dirección:</label> <div class="col-lg-10"> <input type="text" class="form-control" name="DIRECCION_REFERENCIA[]" placeholder="Ingrese la dirección de la referencia"> </div> </div>' +
                '<br></div>');
            $('#ref > div').last().hide().show(500);
        });
    });
    $('html').length;

    function Eliminar(obj)
    {
        $(obj).parent().parent().hide(500, function ()
        {
            $(obj).parent().parent().remove();
            rows--;
            $('#ref div div:nth-child(1)').each(function (index, element)
            {
                $(element).text('Referencia #' + (index + 1));
            });
        });
    }
</script>
<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>