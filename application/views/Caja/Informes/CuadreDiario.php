<!DOCTYPE html>
<?= $Head ?>
<body class="skin-blue">
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
                Cuadre Diario
            </h1>
        </section>
        <!-- Main content -->
        <div class="container">
            <form method="post" target="_blank" class="form-horizontal col-md-6" role="form"
                  action="ImprimeCuadreDiario"
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

                <div class="form-group">
                    <label class="col-lg-3 col-lg-offset-2 control-label">Nro:</label>

                    <div class="col-lg-3">
                        <input type="number" name="NRO" class="text-center form-control" value="<?= $Consecutivo ?>"
                               max="999999" min="1" required/>
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
                <div id="spin" style="text-align: center;position: static;"></div>
            </form>
        </div>
        <br/><br/>
    </div>
</div>
<?= $Footer ?>

</body>
</html>