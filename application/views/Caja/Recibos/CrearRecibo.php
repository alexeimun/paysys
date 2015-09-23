<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue sidebar-mini">
<link rel="stylesheet" href="<?= base_url() ?>/public/js/DropDown/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>/public/js/DropDown/chosen.css">
<script src="<?= base_url() ?>/public/js/DropDown/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/public/js/DropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>/public/js/DropDown/docsupport/combo.js"></script>
<!--Spin.js-->
<script src="<?= base_url() ?>/public/plugins/spin/spin.min.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>/public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>/public/plugins/iCheck/square/green.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>/public/plugins/iCheck/icheck.js"></script>
<script src="<?= base_url() ?>/public/plugins/priceFormat/priceFormat.js"></script>
<!--knob-->
<script src="<?= base_url() ?>//public/plugins/knob/jquery.knob.js"></script>
<!--morris charts-->
<script src="<?= base_url() ?>/public/plugins/morris/raphael-min.js"></script>
<link href="<?= base_url() ?>/public/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>/public/plugins/morris/morris.min.js" type="text/javascript"></script>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#299d2c;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-android-list"></span>
                Crear Nuevo Recibo
            </h1>
        </section>
        <!-- Main content -->

        <div class="container">

            <form class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">

                <h3 style="text-align: center;color:#7f7c7c;">Recibo #<span
                        style="color: #515151"><?= $RECIBO ?></span></h3>
                <hr style="border: 1px solid #3c8dbc;"/>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Solicitud:</label>

                    <div class="col-lg-10">
                        <select name="ID_SOLICITUD" class="form-control chosen-select"
                                style="width:350px;">
                            <?= $Solicitudes ?>
                        </select>
                    </div>
                </div>
                <div id="chart-pay"></div>

                <h3 style="text-align: center;color:#3fabd6;"><span class="ion-pie-graph"></span>
                    Información
                </h3>
                <hr style="border: 1px solid #3fabd6;"/>

                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom" id="tabs">
                        <ul class="nav nav-tabs" style="background: #ECF0F5;">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><span
                                        class="ion-person-stalker"></span> Datos</a></li>
                            <li><a href="#tab_2" data-toggle="tab"><span class="glyphicon glyphicon-briefcase"></span>
                                    Abonos</a></li>
                            <li id="interes-tab"><a href="#tab_3" data-toggle="tab"><span
                                        class="glyphicon glyphicon-list-alt"></span> Intereses</a></li>
                            <li><a href="#tab_4" data-toggle="tab"><span class="ion-stats-bars"></span> Estadísticas</a>
                            </li>
                        </ul>

                        <div class="tab-content"
                             style="height: 50px;background: #ECF0F5;overflow-x: hidden;overflow-y: auto;border-top: 4px solid white;">
                            <div class="tab-pane active" id="tab_1">
                                <div id="info"></div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div id="Abonos"></div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div id="Intereses"></div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <div id="statics"></div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.col -->

                <h3 style="text-align: center;color:#149311"><span class="ion ion-cash"></span> Pago</h3>
                <hr style="border: 1px solid #149311;"/>

                <div id="tipopago"></div>
                <div id="btnagregarpago"></div>

                <div id="pago"></div>

                <div id="pagodropdown"></div>

                <div id="tablapagos"></div>

                <div id="formapagodd"></div>
                <div id="formapago"></div>

                <br><br><br>

                <div id="pagarbtn"></div>
                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>

<script>

    $('form').on(events, elements, function () {
        jValidate($(this), event);
    });

    (new Spinner({
        lines: 10, width: 4,
        radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
    })).spin(document.getElementById("spin"));

    function Alerta(param) {
        BootstrapDialog.show({
            title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
            message: 'El recibo se ha creado correctamente...',
            draggable: true,
            buttons: [{
                label: 'Cerrar',
                action: function (dialogItself) {
                    dialogItself.close();
                    if (!param) {
                        window.open('ImprimeRecibo');
                    }
                    location.href = 'crearrecibo';
                }
            }]
        });
    }
</script>

<script type="text/javascript">
    function PieChart(pago) {
        "use strict";
        var donut = new Morris.Donut({
            element: "pagos",
            resize: true,
            colors: ["#3aadbc", "#11fb5a", "#bf11ff", "#f56954"],
            data: [
                {label: "Préstamo", value: pago.CAPITAL_INICIAL},
                {label: "Abonado", value: pago.ABONADO},
                {label: "Total deuda", value: pago.CAPITAL_INICIAL - pago.ABONADO},
                {label: "Intereses", value: pago.ABONO_INTERES}
            ],
            hideHover: "auto"
        });
    }

</script>

<script>

    function Total(tipo) {
        var Total = 0;
        $('#tpagos tbody tr').not(':last').each(function (index, element) {
            if ($(element).find('td:nth-of-type(1)').text() == tipo) {
                Total += Number($(element).find('td:nth-of-type(5)').unmask());
            }
        });
        return Total;
    }

    $('body').on('click', '.pagartodo', function () {
        if ($('#tpagos  tbody tr').length > 1) {
            if (Total('Abono') + Abonado <= Capital) {
                if (validateForm()) {
                    var banco = $('input[name=BANCO]').length ? $('input[name=BANCO]').val() : '';
                    var cheque = $('input[name=CHEQUE]').length ? $('input[name=CHEQUE]').val() : '';

                    $.ajax({
                        type: 'post',
                        url: 'insertaRecibo',
                        data: {ID_SOLICITUD: Solicitud.val(), BANCO: banco, CHEQUE: cheque},
                        beforeSend: function () {
                            $('body').addClass('Wait');
                            $('body,html').animate({scrollTop: 0}, 200);
                            $('#spin').show();
                        },
                        success: function (data) {
                            $('body').removeClass('Wait');
                            Alerta(data);
                            $('#spin').hide();
                        }
                    });
                }
            }
            else Message('La suma del pago y el abono es mayor al préstamo...');
        }
        else {
            Message('Debe agregar al menos un pago...');
        }
    });

    $('body').on('change', 'select[name=FORMA_PAGO]', function () {
        $('#pagodropdown').html(PagoDropDown());
    });

    var Solicitud = $('select[name=ID_SOLICITUD]');
    var Capital = 0;
    var Abonado = 0;

    Solicitud.change(function () {
        $.post('relaciones', {IdSol: Solicitud.val(), Tipo: 0}, function (solicitud) {
            if (solicitud == '') {
                $('#info').html('');
                $('#Intereses').html('');
                $('#Abonos').html('');
                $('.tab-content').css('height', '50px');
                $('#pago').html('');
                $('#pagodropdown').html('');
                $('#tablapagos').html('');
                $('#pagarbtn').html('');
                $('#chart-pay').html('');
                $('#statics').html('');
                $('#btnagregarpago').html('');
                $('#tipopago').html('');
                $('#formapagodd').html('');
                $('#formapago').html('');
            }
            else {
                var solicitud = JSON.parse(solicitud);
                Capital = solicitud.ChartPagos.CAPITAL_INICIAL;
                Abonado = solicitud.ChartPagos.ABONADO;
                $('#Intereses').html(solicitud.Intereses);
                $('.tab-content').css('height', '300px');
                $('#info').html(solicitud.Datos.Clientes);
                $('#Abonos').html(solicitud.Abonos);
                $('#chart-pay').html(solicitud.ChartPagos.Pie);
                PieChart(solicitud.ChartPagos);
                $('#statics').html(solicitud.Estadisticas);
                $('#tipopago').html(tipoRecibo());
                $('#formapagodd').html(Pago());
                $('#formapago').html(FormaPago(1));

                $('table input:checkbox').iCheck({
                    checkboxClass: 'iradio_square-green',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '70%' // optional
                });
                traeTablaPagos();

                if ($('#jmsg').length)killMessage();
                $('#pagodropdown').html(PagoDropDown(0));
                $('#pagarbtn').html('<div class="form-group">' +
                    '<div class="col-lg-offset-9 col-lg-10">' +
                    '<button type="button" class="pagartodo btn btn-success btn-lg"><span class="ion-social-usd"></span>&nbsp;Pagar recibo' +
                    '</button>' +
                    '</div>' +
                    '</div>');
                if (Capital == Abonado) Message('La solicitud ya ha sido cancelada...', 'success', 0);
            }
        });
    });
    $('#tipopago').change(function () {
        if ($('#tipopago :selected').val() == 1) {
            $('#pagodropdown').html('');
            $('#pago').html('');
            $('#btnagregarpago').html('<div style="margin-left: 45%;"><button type="button" class="btn btn-info btn-lg agregar-interes"><span class="ion-android-add"></span>&nbsp;Agregar pago </button></div><br>');
            $('#interes-tab a').trigger("click");
            $('body').animate({scrollTop: $('#tabs').offset().top}, 200);
        }
        else {
            $('#btnagregarpago').html('');
            $('#pagodropdown').html(PagoDropDown(+$('#tipopago :selected').val()));
            $('input.dinero').priceFormat({
                prefix: '$ ',
                thousandsSeparator: ','
            });

        }
    });


    function tipoRecibo() {
        var statement = '<div class="form-group">' +
            '<label class= "col-lg-5 control-label" >Tipo recibo:</label > ' +
            '<div class="col-lg-4">' +
            '<select name="TIPO_RECIBO" class="form-control">';
        if (Capital != Abonado)
            statement += '<option value="0">Abono a capital</option>';
        statement += '<option value="1">Pago intereses</option>' +
            '<option value="2">Ampliación de capital</option>' +
            '<option value="3">Ampliación de plazo</option>' +
            '<option value="4">Comisión</option>' +
            '</select>' +
            '</div>' +
            '</div>';
        return statement;
    }

    function Pago() {
        return '<div class="form-group">' +
            '<label class= "col-lg-5 control-label" >Tipo pago:</label > ' +
            '<div class="col-lg-4">' +
            '<select  name="FORMA_PAGO" class="form-control">' +
            '<option value="1">Efectivo</option>' +
            '<option value="0">Consignación</option>' +
            '</select>' +
            '</div>' +
            '</div>';
    }

    function PagoDropDown(tipo) {
        switch (tipo) {
            case 0:
                return '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Valor:</label>' +
                    '<div class="col-lg-6">' +
                    '<input type="text" class="form-control numero dinero" name="VALOR" placeholder="Ingrese el valor apagar">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Concepto:</label>' +
                    '<div class="col-lg-7">' +
                    '<input type="text" value="ABONO A CAPITAL" class="form-control obligatorio" name="CONCEPTO" placeholder="Ingrese el concepto">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class = "col-lg-offset-5 col-lg-10"><button type="button" class="btn btn-info btn-lg agregar"><span class="ion-android-add"></span>&nbsp;Agregar pago </button>' +
                    ' </div>' +
                    ' </div>';
                break;
            case 2:
                return '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Valor:</label>' +
                    '<div class="col-lg-5">' +
                    '<input type="text" class="form-control numero dinero" name="VALOR"' +
                    'placeholder="Ingrese el valor apagar">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class = "col-lg-offset-5 col-lg-10"><button type="button" class="btn btn-info btn-lg agregar"><span class="ion-android-add"></span>&nbsp;Agregar pago </button>' +
                    ' </div>' +
                    ' </div>';
                break;
            case 3:
                return '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Plazo(Meses):</label>' +
                    '<div class="col-lg-2">' +
                    '<input class="form-control numero porcentaje"  name="MESES" value="12">' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">%:</label>' +
                    '<div class="col-lg-2">' +
                    '<input class="form-control porcentaje numero"  id="ap" value="0.5">' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Valor:</label>' +
                    '<div class="col-lg-5">' +
                    '<input type="text" class="form-control numero dinero" value="' + (Math.round((Capital - Abonado) * .005)) + '" name="VALOR" placeholder="Ingrese el valor apagar">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Concepto:</label>' +
                    '<div class="col-lg-6">' +
                    '<input type="text" value="Ampliación de plazo" class="form-control mouse-default"  name="CONCEPTO">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class = "col-lg-offset-5 col-lg-10"><button type="button" class="btn btn-info btn-lg agregar"><span class="ion-android-add"></span>&nbsp;Agregar pago </button>' +
                    ' </div>' +
                    ' </div>';
                break;
            case 4:
                return '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Valor:</label>' +
                    '<div class="col-lg-5">' +
                    '<input type="text" class="form-control numero dinero" value="' + (Math.round((Capital - Abonado) * .03)) + '" name="VALOR" id="comisionvalor" placeholder="Ingrese el valor apagar">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">%:</label>' +
                    '<div class="col-lg-2">' +
                    '<input class="form-control porcentaje numero"  id="porcentcomision" value="3">' +
                    '</div></div>' +
                    '<div class="form-group">' +
                    ' <label class="col-lg-4 control-label">Concepto:</label>' +
                    '<div class="col-lg-7">' +
                    '<input type="text" value="Comisión <?=MesNombreAbr(round(date('m'))).' '.date('d/Y') ?>" class="form-control obligatorio" name="CONCEPTO" placeholder="Ingrese el concepto">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class = "col-lg-offset-5 col-lg-10"><button type="button" class="btn btn-info btn-lg agregar"><span class="ion-android-add"></span>&nbsp;Agregar pago </button>' +
                    ' </div>' +
                    ' </div>';
                break;

        }
    }
    $('body').on('keyup', '#porcentcomision', function () {
        $('#comisionvalor').val(Math.round((+$(this).val() / 100) * (Capital - Abonado))).priceFormat({prefix: '$ '});
    });
    $('body').on('keyup', '#ap', function () {
        $('input[name=VALOR]').val(Math.round((Capital - Abonado) * (+$(this).val() / 100)));
        $('input[name=VALOR]').priceFormat({
            prefix: '$ ',
            thousandsSeparator: ','
        });
    });

    function FormaPago(tipo) {
        if (tipo == 0) {
            return '<div class="form-group">' +
                ' <label class="col-lg-4 control-label">Banco:</label>' +
                '<div class="col-lg-6">' +
                '<input type="text" class="form-control obligatorio" name="BANCO" placeholder="Ingrese el nombre de la entidad bancaria">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                ' <label class="col-lg-4 control-label">Cheque Nro:</label>' +
                '<div class="col-lg-6">' +
                '<input type="text" class="form-control obligatorio" name="CHEQUE" placeholder="Ingrese el número de cheque">' +
                '</div>' +
                '</div>';
        }
        else return '';
    }

    function traeTablaPagos() {
        $.post('pagostemp', {IdSol: Solicitud.val(), action: 'traer'}, function (data) {
            $('#tablapagos').html(data);
        });
    }

    $('body').on('click', '.agregar', function () {
        agregaPagoTemp();
    });

    $('body').on('change', 'select[name=FORMA_PAGO]', function () {
        $('#formapago').html(FormaPago($('select[name=FORMA_PAGO] :selected').val()));
    });

    $('body').on('click', '.agregar-interes', function () {
        var num = [];
        var concepto = [];
        var valor = [];
        var mes = [];
        var periodo = [];

        $('#tabs table tbody tr td:nth-of-type(5) input:checked').not(':disabled').each(function (index, element) {
            if ($(this).val() != 'ok') {
                var tr = $(element).closest('tr');
                concepto.push(tr.find('td:nth-of-type(3)').text());
                valor.push(tr.find('td:nth-of-type(2)').unmask());
                mes.push(tr.data('mes'));
                periodo.push(tr.data('periodo'));
                $(this).val('ok');
            }
        });
        if (mes.length > 0) {
            var Field = [];
            Field.push(mes, periodo, concepto, valor);
            console.log(Field);
            $.post('pagostemp', {
                REG: Field,
                TIPO_RECIBO: 1,
                IdSol: Solicitud.val(),
                action: 'agregar'
            }, function (data) {
                $('#tablapagos').html(data);
            });
        }
    });

    function agregaPagoTemp() {
        if (validateForm()) {
            $.post('pagostemp', {
                IdSol: Solicitud.val(),
                CONCEPTO: $('input[name=CONCEPTO]').length ? $('input[name=CONCEPTO]').val().trim() : '',
                METADATO: $('input[name=MESES]').length ? $('input[name=MESES]').val() : '',
                VALOR: $('input[name=VALOR]').unmask(),
                TIPO_RECIBO: $('select[name=TIPO_RECIBO] :selected').val(),
                action: 'agregar'
            }, function (data) {
                $('#tablapagos').html(data);
            });
        }
    }

    function eliminarpago(Id) {
        $.post('pagostemp', {IdPago: Id, IdSol: Solicitud.val(), action: 'eliminar'}, function (data) {
            $('#tablapagos').html(data);
        });
    }
</script>
<?= $Footer ?>

</body>
</html>