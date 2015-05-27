<!DOCTYPE html>
<?= $Head ?>

<body class="skin-blue">
<!--Spin.js-->
<script src="<?= base_url() ?>public/plugins/spin/spin.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#3c8dbc;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-folder"></span> &nbsp;Importar
                Deudores</h1>
        </section>
        <!-- Main content -->
        <div class="content-header" style="font-size: 14pt;"></div>

        <div class="container">

            <br><br>
            <br>
            <form class="form-horizontal col-md-4" role="form" action="parametro/ImportaDeudores"
                  style="margin-left: 30%;"
                  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-lg-6">
                        <input type="file" name="excel" accept=".xlsx" style="font-size: 15pt;color: #3c8dbc;"/>
                    </div>
                </div>
                <br>

                <div id="spin" style="text-align: center;position: static;"></div>

            </form>
            <div class="center-block" style="padding: 0% 25% 25% 25%;">
                <button type="button" class="btn btn-info btn-lg btn-block"><span
                        class="glyphicon glyphicon-import"></span>&nbsp; Importar
                </button>
            </div>

        </div>

    </div>
</div>
<script>
    $(document).ready(function ()
    {
        (new Spinner({
            lines: 10, width: 4,
            radius: 6, color: '#000', speed: 1, length: 15, top: '10%'
        })).spin(document.getElementById("spin"));

        $(':button').click(function ()
        {
            //información del formulario
            var formData = new FormData($("form")[0]);
            var file=$('input:file')[0].files[0];

            //hacemos la petición ajax
            if ( file == undefined)
            {
                $('div.content-header').html('<div class="callout callout-danger no-margin"> <h4>Atención!</h4>No ha selecionado nigún archo para importar </div>').hide().show(700);
            }
            else
            {
                $.ajax({
                    url: 'importard',
                    type: 'POST',
                    //datos del formulario
                    data: formData,
                    //necesario para subir archivos via ajax
                    cache: false,
                    contentType: false,
                    processData: false,
                    //mientras enviamos el archivo
                    beforeSend: function ()
                    {
                        $('body').addClass('Wait');
                        $('#spin').show();
                    },
                    //una vez finalizado correctamente
                    success: function (data)
                    {
                        console.log(data);
                        $('#spin').hide();
                        $('body').removeClass('Wait');
                        Alerta();
                    },
                    //si ha ocurrido un error
                    error: function ()
                    {
                    }
                });
            }
        });
        function Alerta() {
            BootstrapDialog.show({
                title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
                message: 'Archivo de excel importado correctamente...',
                draggable: true,
                buttons: [{
                    label: 'Cerrar',
                    action: function (dialogItself) {
                        dialogItself.close();
                        location.href='<?=site_url('importardeudores') ?>';
                    }
                }]
            });
        }
    });



</script>

<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>