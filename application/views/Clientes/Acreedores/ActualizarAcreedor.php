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
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.js"></script>

<script src="<?= base_url() ?>public/plugins/priceFormat/priceFormat.js"></script>


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
                Actualizar Acreedor
            </h1>
        </section>
        <!-- Main content -->

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">
                <hr style="border: 1px solid #0000c0;"/>
                <div class="form-group">
                    <label  class="col-lg-2 control-label">Nombre:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" placeholder="Ingrese el nombre" value="<?=$Info->NOMBRE ?>"
                               name="NOMBRE"
                            >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Documento:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero documento"
                               name="DOCUMENTO" value="<?=$Info->DOCUMENTO ?>"
                               placeholder="Ingrese el número del documento">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Ciudad:</label>

                    <div class="col-lg-10">
                        <select  name="ID_CIUDAD" class="form-control chosen-select"
                                style="width:220px;">
                            <?= $Ciudades ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" value="<?=$Info->DIRECCION ?>" name="DIRECCION"
                               placeholder="Ingrese la dirección">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero telefono" name="TELEFONO" value="<?=$Info->TELEFONO ?>"
                               placeholder="Ingrese el teléfono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Celular:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control numero telefono" name="CELULAR" value="<?=$Info->CELULAR ?>"
                               placeholder="Ingrese el celular">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Correo:</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control correo" name="CORREO" value="<?=$Info->CORREO ?>"
                               placeholder="Ingrese el correo electrónico">
                    </div>
                </div>
                <h3 style="text-align: center;color:#149311"><span class="ion ion-cash"></span> Financiero</h3>
                <hr style="border: 1px solid #149311;"/>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre Cuenta:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio" name="NOMBRE_CUENTA" value="<?=$Info->NOMBRE_CUENTA ?>"
                               placeholder="Nombre de la cuenta">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Número Cuenta:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio numero" name="NUMERO_CUENTA" value="<?=$Info->NUMERO_CUENTA ?>"
                               placeholder="Número de la cuenta">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Interés Cartera%:</label>

                    <div class="col-lg-2">
                        <input type="text" class="form-control numero porcentaje" value="<?=$Info->INTERES_CARTERA ?>" min="0" max="100"
                               name="INTERES_CARTERA">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label"></label>

                    <div class="col-lg-8">
                        <input type="checkbox" name="MANEJO_CARTERA" <?=$Info->MANEJO_CARTERA==1?'checked':'' ?>> <strong> Manejo Cartera</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label"></label>

                    <div class="col-lg-8">
                        <input type="checkbox" name="RECLAMA_PERSONALMENTE"  <?=$Info->RECLAMA_PERSONALMENTE==1?'checked':'' ?>>  <strong> Reclama
                            Personalmente</strong>
                    </div>
                </div>
                <br>
                <input name="Idacreedor" value="<?= $Info->ID_ACREEDOR ?>" type="hidden"/>
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
    cliente='Acreedor';

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
            $.post('ValidaCampos', {'DOCUMENTO': $('input.documento').val(),CLIENTE:cliente}, function (data)
            {
                if (data == 'no')
                {
                    $('input.documento').closest('div').addClass('has-error error_documento');
                    $('body,html').animate({scrollTop: 0}, 200);
                }
                else Update();
            });
        }
    });
    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El acreedor se ha actualizado correctamente...',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (dialogItself)
                {
                    dialogItself.close();
                    location.href = '<?=site_url('actualizaracreedor').'/'.$Info->ID_ACREEDOR ?>';
                }
            }]
        });
    }

    function Update()
    {
        $('.dinero').eq(0).val($('.dinero').eq(0).unmask());
        $('.dinero').eq(1).val($('.dinero').eq(1).unmask());
        $.ajax({
            type: 'post', url: '<?=site_url('actualizaAcreedor') ?>', data: $('form').serialize(),
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

</script>


<script>
    $(function ()
    {
        $('input:checkbox').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '70%' // optional
        });
        $('.dinero').priceFormat({
            prefix: '$ ',
            thousandsSeparator: ','
        });
    });
</script>
<?= $Footer ?>

</body>
</html>
