<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url() ?>/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="<?= base_url() ?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?= base_url() ?>public/js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="<?=base_url()?>/public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo" style="background: #d3d3d3;opacity: .85;">
        <a href=""><span style="color:#0085ff;"><b>Admin</b> InverBienes</span></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body " id="contenedor" style="opacity: .95;">
        <p class="login-box-msg" style="font-size: 18pt;">Iniciar Sesión</p>

        <form method="post" action="app/ValidarCredenciales">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Correo" name="usuario" autofocus/>
                <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:#0085ff; "></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Clave" name="clave"/>
                <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#0085ff;"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <br>
    <?php if (date('d') == 31 && date('m') ==11): ?>
        <script>   $(document).ready(function () {Fecha('Halloween');});</script>
        <div class="login-logo" style="background: #d3d3d3;opacity: .95;">
            <span style="color:orangered">Feliz Halloween!</span>
        </div>
    <?php else: ?>
    <?php if (date('m') == 12): ?>
        <script>   $(document).ready(function () {Fecha('Halloween');});</script>
        <div class="login-logo" style="background: #d3d3d3;opacity: .95;">
            <span style="color:#db3b00">Feliz Navidad!</span>
        </div>
        <?php endif; ?>

        <script> $(document).ready(function () {Fecha();});</script>
    <?php endif; ?>

    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
</body>
<script>
    function Fecha(evento)
    {
        switch (evento)
        {
            case 'Halloween':
                $('body').css('background', 'url(<?= base_url() ?>public/images/fondos/fondo1131.jpg)');
                break;
            default :
                $('body').css('background', 'url(<?= base_url() ?>public/images/fondos/fondo<?= date('m') ?>.jpg)');
                break;
        }
    }

    $(document).ready(function ()
    {
        $('form').submit(function ()
        {
            if ($('input[type=email]').val() == '' || $('input[type=password]').val() == '') event.preventDefault();
        });
    });
</script>
</html>