<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue">
<script type="text/javascript"
        src="<?= base_url('public/plugins/excelExport/jquery.battatech.excelexport.js') ?>"></script>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#3c8dbc;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-folder"></span> &nbsp;Exportar
                Deudores</h1>
        </section>
        <!-- Main content -->
        <div class="content-header" style="font-size: 14pt;"></div>
        <br><br>

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">
                <div class="form-group">
                    <label  class="col-lg-2 control-label"></label>

                    <div class="col-lg-10">
                        <input type="text" id="nombre" class="form-control obligatorio"
                               placeholder="Nombre de la hoja de cálculo"
                               value="Lista Deudores <?= date('d-m-Y') ?>" style="text-align: center;">
                    </div>
                </div>
            </form>
            <div class="center-block" style="padding: 0% 25% 25% 25%;">
                <button type="button" class="btn btn-success btn-lg btn-block"><span
                        class="glyphicon glyphicon-export"></span>&nbsp; Exportar
                </button>
            </div>

        </div>
        <div id="table" style="display: none;">
            <table id="mtable" style="font-family: 'Allerta' , arial , sans-serif;font-size: 16pt;"></table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function ()
    {

        $(':button').on('click', function ()
        {
            $.ajax({
                type: 'post', url: 'exportard',
                beforeSend: function ()
                {
                },
                success: function (data)
                {
                    ArmarTabla(data);
                    $('div.content-header').html('<div class="callout callout-info no-margin"> <h4>Éxito!</h4>Se ha exportado un libro de excel con los deudores</div>').hide().show(700);
                }
            });


        });
        function ArmarTabla(tabla)
        {
            var nombre = $('#nombre').val().trim();
            if (nombre == '')nombre = 'Listado Deudores <?=date('d-m-Y') ?>';
            else
            {
                nombre = nombre.replace('/', '');
                nombre = nombre.replace('*', '');
                nombre = nombre.replace('?', '');
            }

            $('#mtable').html($(tabla).html());

            $("#temp").battatech_excelexport({
                containerid: "table", datatype: 'table', worksheetName: nombre
            });
        }
    });
</script>

<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>