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
            <h1 style="color:#3c8dbc;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-edit"></span>
                Actualizar Inmueble
            </h1>
        </section>
        <!-- Main content -->
        <br><br>

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">

                <div style="text-align: center;" id="cont">
                    <img src="<?= base_url('public/images/Inmuebles/'.$Info->TIPO.'.png') ?>" draggable="false"
                         class="img-responseive" alt="Tipo inmueble"/></div>
                <br>

                <div id="msg"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tipo: </label>

                    <div class="col-lg-8" id="tipo">
                        <select class="form-control obligatorio" name="TIPO_INMUEBLE">
                            <?php if($Info->TIPO==0):?>
                            <option value="0" selected>Casa</option>
                            <option value="1">Apartamento</option>
                            <option value="2">Finca</option>
                                <option value="2">Lote</option>
                            <?php endif; ?>

                            <?php if($Info->TIPO==1):?>
                                <option value="0">Casa</option>
                                <option value="1" selected>Apartamento</option>
                                <option value="2">Finca</option>
                                <option value="2">Lote</option>
                            <?php endif; ?>

                            <?php if($Info->TIPO==2):?>
                                <option value="0">Casa</option>
                                <option value="1">Apartamento</option>
                                <option value="2" selected>Finca</option>
                                <option value="2">Lote</option>
                            <?php endif; ?>

                            <?php if($Info->TIPO==3):?>
                                <option value="0">Casa</option>
                                <option value="1">Apartamento</option>
                                <option value="2" >Finca</option>
                                <option value="2" selected>Lote</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Propietario:</label>

                    <div class="col-lg-10">
                        <select name="ID_PROPIETARIO" class="form-control chosen-select"
                                style="width:350px;">
                            <?= $Deudores ?>
                        </select>
                    </div>
                </div>

                <h3 style="text-align: center;color:#00979a;"><span class="ion ion-ios-location"></span> Ubicación</h3>
                <hr style="border: 1px solid #00979a;"/>

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
                        <input type="text" class="form-control obligatorio" name="DIRECCION" value="<?= $Info->DIRECCION ?>"
                               placeholder="Ingrese la dirección">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Cerca a:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?= $Info->CERCA ?>"
                               name="CERCA"
                               placeholder="Lugares o sitios cercanos al inmueble">
                    </div>
                </div>

                <h3 style="text-align: center;color:#d64219;"><span class="glyphicon glyphicon-book"></span> Jurídico
                </h3>
                <hr style="border: 1px solid #d64219;"/>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Número notaría:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio numero" name="NUMERO_NOTARIA" value="<?= $Info->NUMERO_NOTARIA ?>"
                               placeholder="Ingrese el número de notaría">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Número escritura:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio numero" name="NUMERO_ESCRITURA"
                               placeholder="Ingrese el número de la escritura" value="<?= $Info->NUMERO_ESCRITURA ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Matrícula inmobiliaria:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control obligatorio" name="MATRICULA"
                               placeholder="Ingrese la matrícula inmobiliaria" value="<?= $Info->MATRICULA ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha constitución:</label>

                    <div class="col-lg-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha" name="FECHA_CONSTITUCION"
                                   value="<?= $Info->FECHA_CONSTITUCION ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha entrega escritura:</label>

                    <div class="col-lg-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha" name="FECHA_ENTREGA_ESCRITURA"
                                   value="<?= $Info->FECHA_ENTREGA_ESCRITURA ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <input name="ID_INMUEBLE" value="<?= $Info->ID_INMUEBLE ?>" type="hidden"/>
                <br>
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
            Update();
        }
    });
    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El inmueble se ha actualizado correctamente...',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (dialogItself)
                {
                    dialogItself.close();
                    location.href = '<?=site_url('actualizarinmueble').'/'.$Info->ID_INMUEBLE ?>';
                }
            }]
        });
    }

    function Update()
    {
        $('.dinero').eq(0).val($('.dinero').eq(0).unmask());
        $('.dinero').eq(1).val($('.dinero').eq(1).unmask());
        $.ajax({
            type: 'post', url: '<?=site_url('actualizaInmueble') ?>', data: $('form').serialize(),
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
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-blue',
            increaseArea: '70%' // optional
        });
        $('.dinero').priceFormat({
            prefix: '$ ',
            thousandsSeparator: ','
        });
    });

    $(function ()
    {
        $('select[name=TIPO_INMUEBLE]').change(function ()
        {
            $('#cont').
                html('<img draggable="false" src="<?= base_url('public/images/Inmuebles') ?>' + '/' + $('select[name=TIPO_INMUEBLE] :selected').val() + '.png" class="img-responseive" alt="Tipo inmueble"/>');
        });
    });
</script>
<?= $Footer ?>

</body>
</html>
