<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<!--Spin.js-->
<script src="<?= base_url() ?>public/plugins/spin/spin.min.js"></script>
<!--Jvalidator-->
<script src="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/Jvalidator/Jvalidator.css">
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?= base_url() ?>public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.js"></script>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="color:#0000c0;text-align: center;margin-top: 20px;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-person"></span>
                Ver Usuario
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form class="form-horizontal col-md-6" role="form" style="margin-left: 20%" method="post">
                <hr style="border: 1px solid #0000c0"/>
                <div style="text-align: center;">
                    <img style="width: 160px;height: 160px;cursor: pointer"
                         src="<?= base_url() ?>public/images/Avatars/avatar<?= $Info->AVATAR ?>.png"
                         class="img-circle" alt="User Image"/>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nombre:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= $Info->NOMBRE ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Correo:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= $Info->CORREO ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Último ingreso:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= Momento($Info->FACHA_ULTIMO_INICIO_SESION) ?>"">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha de registro:</label>

                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?= Momento($Info->FECHA_REGISTRO) ?>"">
                    </div>
                </div>

                <h3 style="text-align: center;color:#615963"><span class="ion ion-key"></span> Roles y permisos</h3>
                <hr style="border: 1px solid #615963;"/>

                <div class="form-group">
                    <label class="col-lg-push-1 col-lg-4 control-label">Tipo usuario:</label>

                    <div class="col-lg-push-1 col-lg-4">
                        <input type="text" style="text-align: center;" readonly value="<?=$Info->NIVEL>0?'Administrador':'Común' ?>"/>
                    </div>
                </div>
                <?= $Modulos ?>
                <br>
            </form>
        </div>
        <br/><br/>
    </div>
</div>
<style>
    tbody tr:hover {
        background: #ebf0ff !important;
        cursor: pointer;
    }
</style>
<script>
    $(function ()
    {
        $('input:checkbox').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '70%' // optional
        });
    });
</script>
<?= $Footer ?>
</body>
</html>