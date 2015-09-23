<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue sidebar-mini">
<script src="<?= base_url('public/plugins/excelExport/jquery.battatech.excelexport.js') ?>"></script>



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
                Informe de ingresos diarios
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form method="post" target="_blank" class="form-horizontal col-md-6" role="form"
                  action="informeingresosdiarios"
                  style="margin-left: 20%;">
                <hr style="border: 1px solid #3c8dbc;"/>
                <br>

                <div class="form-group">
                    <label class="col-lg-offset-2 col-lg-3 control-label">Fecha:</label>

                    <div class="col-lg-4">
                        <input type="date" name="FECHA" value="<?= date('Y-m-d') ?>"
                               class="form-control" required/>
                    </div>
                </div>
                <br>
                <!--Envíar-->
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-3">
                        <button type="submit" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-print"></span>&nbsp; Imprimir
                        </button>
                    </div>

                    <div class="col-lg-3">
                        <button type="button" class="btn btn-success btn-lg exportar"><span
                                class="glyphicon glyphicon-folder-open"></span>&nbsp; Exportar
                        </button>
                    </div>
                </div>
                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>

        <div id="table" style="display: none;">
            <table id="mtable" style="font-family: 'Allerta' , arial , sans-serif;font-size: 16pt;"></table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('.exportar').on('click', function () {
            $.ajax({
                type: 'post', url: '<?=site_url('parametro/ExportaIngresosDiarios') ?>', data: $('form').serialize(),
                success: function (data) {
                    ArmarTabla(data);
                    $('div.content-header').html('<div class="callout callout-info no-margin"> <h4>Éxito!</h4>Se ha exportado un libro de excel con los deudores</div>').hide().show(700);
                }
            });
        });
        function ArmarTabla(tabla) {
            var nombre = 'Cuadre diario <?=date('d-m-Y') ?>';

            $('#mtable').html($(tabla).html());

            $("#temp").battatech_excelexport({
                containerid: "table", datatype: 'table', worksheetName: nombre
            });
        }
    });
</script>


<?= $Footer ?>

</body>
</html>