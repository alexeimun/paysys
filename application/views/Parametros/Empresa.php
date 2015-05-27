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
            <h1 style="color:#3c8dbc;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-edit"></span> Actualizar
                Empresa
            </h1>
        </section>
        <!-- Main content -->
        <br><br>

        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%;"
                  method="post">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Gerente:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="GERENTE"
                               value="<?= $Empresa->GERENTE ?>"
                               placeholder="Ingrese el actual gerente de la empresa">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">NIT:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio"
                               value="<?= $Empresa->NIT ?>"
                               name="NIT"
                               placeholder="Ingrese el nit de la empresa">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio" name="DIRECCION"
                               value="<?= $Empresa->DIRECCION ?>"
                               placeholder="Ingrese la dirección de la empresa">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Teléfono:</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control obligatorio numero telefono" name="TELEFONO"
                               value="<?= $Empresa->TELEFONO ?>"
                               placeholder="Ingrese el teléfono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Correo:</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control obligatorio correo" name="CORREO"
                               value="<?= $Empresa->CORREO ?>"
                               placeholder="Ingrese el correo electrónico" required>
                    </div>
                </div>
                <br>
                <span><b>Nota:</b></span><span> Algunos de estos datos serán mostrados en el recibo, así que porfavor ingrese información genuina</span>

                <!--Envíar-->
                <div class="form-group">
                    <div class="col-lg-offset-9 col-lg-10">
                        <button type="button" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-send"></span>&nbsp; Actualizar
                        </button>
                    </div>
                </div>
                <br>
                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>
<script>

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
                Save();
            }
        });

        function Alerta()
        {
            BootstrapDialog.show({
                title: '<span style="color: #ffffff;font-size: 20pt;"class="ion ion-checkmark-round"></span>&nbsp;&nbsp; <span style="font-size: 18pt;">Bien hecho...</span>',
                message: 'Se han actualizado los datos de la empresa correctamente...',
                draggable: true,
                buttons: [{
                    label: 'Cerrar',
                    action: function (dialogItself)
                    {
                        dialogItself.close();
                    }
                }]
            });
        }

        function Save()
        {
            $.ajax({
                type: 'post', url: '<?=site_url('actualizaempresa') ?>', data: $('form').serialize(),
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
    });


</script>
<!-- /.content-wrapper -->
<?= $Footer ?>
</body>
</html>