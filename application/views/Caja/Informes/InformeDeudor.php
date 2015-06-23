<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>public/js/DropDown/chosen.css">
<script src="<?= base_url() ?>public/js/DropDown/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>public/js/DropDown/docsupport/combo.js"></script>
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
                                                                                 class="ios ion-ios-paper"></span>
                Informe Deuduor
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-8" target="_blank" action="ImprimeInformeDeudor"
                  style="margin-left: 20%;"
                  method="post">
                <hr style="border: 1px solid #3c8dbc;"/>
                <br>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Solicitud:</label>

                    <div class="col-lg-9">
                        <select name="ID_SOLICITUD" class="form-control chosen-select"
                                style="width:320px;">
                            <?= $Solicitudes ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Desde</label>

                    <div class="col-lg-3">
                        <input type="date" name="DESDE" value="<?= (date('Y') - 1) . date('-m-d') ?>"
                               class="form-control" required>
                    </div>
                    <label class="col-lg-1 control-label">Hasta</label>

                    <div class="col-lg-3">
                        <input type="date" name="HASTA" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>
                <br>
                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-10">
                        <button type="submit" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-print"></span>&nbsp; Imprimir
                        </button>
                    </div>
                </div>
                <br>

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

                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>

<script>

    var Solicitud = $('select[name=ID_SOLICITUD]');

    Solicitud.change(function ()
    {
        $.post('relaciones', {IdSol: Solicitud.val(), Tipo: 1}, function (solicitud)
        {
            if (solicitud == '')
            {
                $('#info').html('');
                $('#Intereses').html('');
                $('#Abonos').html('');
                $('.tab-content').css('height', '50px');
                $('#pago').html('');
                $('#statics').html('');
            }
            else
            {
                var solicitud = JSON.parse(solicitud);
                $('#Intereses').html(solicitud.Intereses);
                $('.tab-content').css('height', '300px');
                $('#info').html(solicitud.Datos.Clientes);
                $('#Abonos').html(solicitud.Abonos);
                $('#statics').html(solicitud.Estadisticas);
            }
        });
    });

</script>

<script>
    $('form').on('submit', function ()
    {
        if (Solicitud.val() == 0)
        {
            event.preventDefault();
            Message('Debe seleccionar una solicitud');
        }
    });
</script>

<?= $Footer ?>

<style>
    .visor, input[name=CAPITAL_INICIAL]
    {
        color: #149311;
        font-weight: bold;
        text-align: center;
        border: 1px solid #149311;
    }

</style>

</body>
</html>