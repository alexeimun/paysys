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
<link href="<?= base_url() ?>public/plugins/iCheck/square/purple.css" rel="stylesheet" type="text/css"/>
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
                                                                                 class="ios ion-ios-shuffle"></span>
                Relación Acreedores y Deudores
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">
                <h3 style="text-align: center;color:#7f7c7c;"> Solicitud #<span
                        style="color: #515151"><?= $Solicitud ?></span></h3>
                <hr style="border: 1px solid #3c8dbc;"/>
                <br>

                <div id="msg"></div>
                <input type="hidden" name="SOLICITUD" value="<?= $Solicitud ?>"/>
                <input type="hidden" name="ID_INMUEBLE"/>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Acreedor:</label>

                    <div class="col-lg-9">
                        <select name="ID_ACREEDOR" class="form-control chosen-select"
                                style="width:320px;">
                            <?= $Acreedores ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Deudor:</label>

                    <div class="col-lg-9">
                        <select name="ID_DEUDOR" class="form-control chosen-select"
                                style="width:320px;">
                            <?= $Deudores ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Inicio:</label>

                    <div class="col-lg-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha" name="FECHA_INICIO"
                                   value="<?= date('Y-m-d') ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Vence:</label>

                    <div class="col-lg-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control fecha" name="FECHA_FIN"
                                   value="<?= (date('Y') + 1) . '-' . date('m-d') ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">% Hipotecado</label>

                    <div class="col-lg-3">
                        <input type="text" style="text-align: center" value="100"
                               class="form-control obligatorio numero"
                               name="HIPOTECADO">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo hipoteca:</label>

                    <div class="col-lg-3">
                        <select name="TIPO_HIPOTECA" class="form-control">
                            <option value="0">Cerrada</option>
                            <option value="1">Abierta</option>
                        </select>
                    </div>
                </div>

                <div id="pagares"></div>
                <div id="addpagare" style="text-align: center;"></div>


                <h3 style="text-align: center;color:#8f395f" id="inmueble"><span class="ion ion-ios-home"></span>
                    Inmueble</h3>
                <hr style="border: 1px solid #8f395f;"/>
                <div id="inmueblemsg"></div>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header" style="background: #868588">
                                <h4 style=";color: #ffffff;text-align: center;">Inmuebles del deudor</h4>

                            </div>
                            <!-- /.box-header -->

                            <div id="inmuebles" class="box-body no-padding">
                                <table class="table table-striped" border="0"></table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

                <h3 style="text-align: center;color:#149311"><span class="ion ion-cash"></span> Intereses</h3>
                <hr style="border: 1px solid #149311;"/>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Capital Inicial:</label>

                    <div class="col-lg-4">
                        <input type="text" class="form-control obligatorio numero dinero" value="0"
                               name="CAPITAL_INICIAL"
                               placeholder="Capital inicial">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-4 control-label">Interés %:</label>

                        <div class="col-lg-2">
                            <input type="text" value="2" class="form-control obligatorio numero porcentaje"
                                   name="INTERES_MENSUAL">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-btn" style="text-align: center;width: 120px;">
                                    <select name="" class="form-control" id="periodointeres">
                                        <option value="1">Mensual</option>
                                        <option value="6">Semestral</option>
                                        <option value="12">Anual</option>
                                    </select>
                                </div>
                                <input type="text" id="interes" class="visor form-control" value="$ 0"
                                       class="form-control obligatorio numero porcentaje" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-4 control-label">ajuste %:</label>

                        <div class="col-lg-2">
                            <input type="text" value="0.5" class="form-control obligatorio numero porcentaje"
                                   name="AJUSTE">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-btn" style="text-align: center;width: 120px;">
                                    <select name="" class="form-control" id="periodoajuste">
                                        <option value="1">Mensual</option>
                                        <option value="6" selected>Semestral</option>
                                        <option value="12">Anual</option>
                                    </select>
                                </div>
                                <input type="text" id="ajuste" class="visor form-control" value="$ 0"
                                       class="form-control obligatorio numero porcentaje" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-4 control-label">Comisión oficina %:</label>

                        <div class="col-lg-2">
                            <input type="text" value="3.5" class="form-control obligatorio numero porcentaje"
                                   name="COMISION_OFICINA">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-btn" style="text-align: center;width: 120px;">
                                    <select name="" class="form-control" id="periodocomision">
                                        <option value="1">Mensual</option>
                                        <option value="6">Semestral</option>
                                        <option value="12">Anual</option>
                                    </select>
                                </div>
                                <input type="text" id="comision" class="visor form-control" value="$ 0"
                                       class="form-control obligatorio numero porcentaje" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-4 control-label">Administración %:</label>

                        <div class="col-lg-2">
                            <input type="text" value="3" class="form-control obligatorio numero porcentaje"
                                   name="CUOTA_ADMINISTRACION">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-btn" style="text-align: center;width: 120px;">
                                    <select name="" class="form-control" id="periodoadmin">
                                        <option value="1">Mensual</option>
                                        <option value="6">Semestral</option>
                                        <option value="12">Anual</option>
                                    </select>
                                </div>
                                <input type="text" id="admin" class="visor form-control" value="$ 0"
                                       class="form-control obligatorio numero porcentaje" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" id="save" class="btn btn-success btn-lg"><span
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
    url = '<?=site_url('ValidaCampos') ?>';

    $('form').on(events, elements, function () {jValidate($(this), event); });

    (new Spinner({
        lines: 10, width: 4,
        radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
    })).spin(document.getElementById("spin"));

    //Envíar
    $('#save').click(function ()
    {
        if (validateForm())
        {
            if ($('select[name=ID_ACREEDOR] :selected').val() != 0)
            {
                if ($('select[name=ID_DEUDOR] :selected').val() != 0)
                {
                    if ($('input:checked').length)
                    {
                        if ($('input[name=CAPITAL_INICIAL]').unmask() != 0)
                        {
                            Save()
                        }
                        else Message('El capital inicial debe ser mayor a 0');
                    }
                    else
                    {
                        $('#inmueblemsg').html('<div class="callout callout-danger no-margin"><span class="ion ion-close-circled"></span> Selecione un inmueble...</div>').hide().show(500);
                        $('body,html').animate({scrollTop: $('#inmueble').offset().top}, 200);
                    }
                }
                else
                    Message('Debe seleccionar un deudor para continuar...');
            }
            else
                Message('Debe seleccionar un acreedor para continuar...');
        }
    });

    function Alerta()
    {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'La solicitud se ha creado correctamente...',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function ()
                {
                    location.href = 'crearsolicitud';
                }
            }]
        });
    }

    function Save()
    {
        $('input[name=CAPITAL_INICIAL]').val($('input[name=CAPITAL_INICIAL]').unmask().trim());
        var valor = 0;
        $('#pagares div input').each(function (index, element)
        {
            valor += Number($(element).unmask());
            $(element).val($(element).unmask());
        });
        $('input[name=ID_INMUEBLE]').val($('input:checked').val());

        if ($('select[name=TIPO_HIPOTECA] :selected').val() == 0 || $('select[name=TIPO_HIPOTECA] :selected').val() == 1 && valor == $('input[name=CAPITAL_INICIAL]').val())
        {
            $.ajax({
                type: 'post', url: 'insertaSolicitud', data: $('form').serialize(),
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
        else Message('La suma de los pagares debe ser igual al capital inicial');
    }

    $('input[name=CAPITAL_INICIAL], .porcentaje').on('click, change', function ()
    {
        Intereses();
    });

    $('input[name=CAPITAL_INICIAL], .porcentaje').on('keyup', function ()
    {
        Intereses();
    });

    $('.input-group-btn select').on('change', function ()
    {
        console.log('ww');
        Intereses();
    });

    function Intereses()
    {
        var capital = $('input[name=CAPITAL_INICIAL]').unmask();
        var interes = Math.round(capital * ($('input[name=INTERES_MENSUAL]').val() / 100))
        $('#admin').val(Math.round($('#periodoadmin :selected').val() * interes * ($('input[name=CUOTA_ADMINISTRACION]').val() / 100)));
        $('#interes').val($('#periodointeres :selected').val() * interes);
        $('#ajuste').val(Math.round($('#periodoajuste :selected').val() * capital * ($('input[name=AJUSTE]').val() / 100)));
        $('#comision').val(Math.round($('#periodocomision :selected').val() * capital * ($('input[name=COMISION_OFICINA]').val() / 100)));

        $('.visor').priceFormat({
            prefix: '$ ',
            thousandsSeparator: ','
        });
    }

    $('input[name=CAPITAL_INICIAL]').priceFormat({
        prefix: '$ ',
        thousandsSeparator: ','
    });

</script>


<script>

    var hipoteca = $('select[name=TIPO_HIPOTECA]');

    hipoteca.change(function ()
    {
        if ($('select[name=TIPO_HIPOTECA] :selected').val() == 1)
        {
            $('#pagares').html('<div class="form-group">' +
            '<label class="col-lg-3 control-label">Pagare #1:</label>' +
            '<div class="col-lg-4">' +
            '<div class="input-group">' +
            '<input type="text" class="form-control obligatorio numero dinero"  value="$ 0" name="PAGARE[]">' +
            '<div class="input-group-addon" style="cursor: pointer;background: #e54040" onclick="Eliminar(this)" data-toggle="tooltip" title="Eliminar">' +
            '<i  style="color:#ffffff" class="ion ion-android-delete"></i>' +
            '</div></div></div></div>');

            $('#addpagare').html('<span  data-toggle="tooltip" title="Agregar pagare" style="font-size: 25pt;font-weight: bold; color:  #00A65A;cursor: pointer;" class="ion ion-android-add"></span>');
        }
        else
        {
            $('#pagares').html('');
            $('#addpagare').html('')
        }
    });

    $('body').on('click', '.ion-android-add', function ()
    {
        $('#pagares').append('<div class="form-group">' +
        '<label class="col-lg-3 control-label">Pagare #' + (++rows) + ':</label>' +
        '<div class="col-lg-4">' +
        '<div class="input-group">' +
        '<input type="text" class="form-control obligatorio numero dinero"  value="$ 0" name="PAGARE[]">' +
        '<div class="input-group-addon" style="cursor: pointer;background: #e54040" onclick="Eliminar(this)" data-toggle="tooltip" title="Eliminar">' +
        '<i  style="color:#ffffff" class="ion ion-android-delete"></i>' +
        '</div></div></div></div>');
        $('#pagares .form-group').last().hide().show(500);
    });
    var rows = 1;
    function Eliminar(obj)
    {
        if (rows > 1)
        {
            $(obj).closest('.form-group').hide(500, function ()
            {
                $(obj).closest('.form-group').remove();
                rows--;
                $('#pagares div label').each(function (index, element)
                {
                    $(element).text('Pagare #' + (index + 1));
                });
            });
        }
    }

    $(function ()
    {
        $('html').on('ifChecked', 'input:checkbox', function ()
        {
            $(':checked').not($(this)).iCheck('uncheck');
        });

        $('select[name=ID_DEUDOR]').change(function ()
        {
            var deudor = $('select[name=ID_DEUDOR] :selected').val();
            if (deudor == 0) $('.table').html('');
            else
            {
                $.post('<?=site_url('traeInmueblesDropdown') ?>', {ID_DEUDOR: deudor}, function (data)
                {
                    $('.table').html($(data).html());
                    $('table input:checkbox').iCheck({
                        checkboxClass: 'iradio_square-purple',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '70%' // optional
                    });
                });
            }
        });
    });
</script>
<?= $Footer ?>

<style>
    .visor, input[name=CAPITAL_INICIAL] {
        color: #149311;
        font-weight: bold;
        text-align: center;
        border: 1px solid #149311;
    }

    .input-group-btn select {
        background: #f55a69;
        color: white;
        border: 0;
    }

    .input-group-btn option {
        color: #000000;
        background: white;
        border: 0;
    }
</style>

</body>
</html>