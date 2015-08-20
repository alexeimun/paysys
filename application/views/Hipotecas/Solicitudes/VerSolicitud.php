<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
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
                                                                                 class="ios ion-ios-grid-view"></span>
                Información Solicitud
            </h1>
        </section>
        <!-- Main content -->


        <div class="container">
            <form class="form-horizontal col-md-7" role="form" style="margin-left: 20%;"
                  method="post" action="cliente/InsertaAcreedor">
                <h3 style="text-align: center;color:#7f7c7c;"> Solicitud #<span
                        style="color: #515151"><?= $Info->SOLICITUD ?></span></h3>
                <hr style="border: 1px solid #3c8dbc;"/>
                <br>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Acreedor:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= $Info->NOMBRE_ACREEDOR ?>"
                               placeholder="Número de la cuenta">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Deudor:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= $Info->NOMBRE_DEUDOR ?>"
                               placeholder="Número de la cuenta">
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
                                   value="<?= $Info->FECHA_INICIO ?>""
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
                                   value="<?= $Info->FECHA_FIN ?>"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo hipoteca:</label>

                    <div class="col-lg-5">
                        <input type="text" class="form-control" value="<?= $Info->TIPO_HIPOTECA ?>"
                               placeholder="Número de la cuenta">
                    </div>
                </div>

                <?=$Pagares ?>


                <h3 style="text-align: center;color:#8f395f" id="inmueble"><span class="ion ion-ios-home"></span>
                    Inmueble</h3>
                <hr style="border: 1px solid #8f395f;"/>
                <div id="inmueblemsg"></div>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header" style="background: #868588">
                                <h4 style=";color: #ffffff;text-align: center;">Inmueble del deudor</h4>

                            </div>
                            <!-- /.box-header -->

                            <div id="inmuebles" class="box-body no-padding">
                                <?= $Inmueble ?>
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
                        <input type="text" class="form-control obligatorio numero dinero"
                               name="CAPITAL_INICIAL" value="<?= $Info->CAPITAL_INICIAL ?>"
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
                        <label class="col-lg-4 control-label">Cuota Administración %:</label>

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
            </form>
        </div>
        <br><br>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $Footer ?>

<script>

    Intereses();
    $('input[name=CAPITAL_INICIAL]').priceFormat({
        prefix: '$ ',
        thousandsSeparator: ','
    });

    $('input[name=CAPITAL_INICIAL], .porcentaje').on('click, change', function ()
    {
        Intereses();
    });

    $('input[name=CAPITAL_INICIAL], .porcentaje').on('keyup', function ()
    {
        Intereses();
    });

    $('.dinero').priceFormat({
        prefix: '$ ',
        thousandsSeparator: ','
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

        $('.visor').priceFormat({
            prefix: '$ ',
            thousandsSeparator: ','
        });
    }
    $('form').on(events, elements, function () {jValidate($(this), event); });

</script>
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