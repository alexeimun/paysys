<!DOCTYPE html>
<html>
<?= $Head ?>
<body class="skin-blue sidebar-mini">
<link href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>

<div class="wrapper">
    <?= $Header ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $Sidebar ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 style="text-align: center;color: #a60a4a;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-android-list"></span>&nbsp;
                                Deudores por cobrar intereses</h3>
                        </div>
                        <div class="box-body">
                            <?= Component::Table(['columns' => ['Nombre del deudor', 'Documento', 'Teléfono', 'Último mes pagado'], 'autoNumeric' => true,
                                'tableName' => 'proximoacobrar', 'id' => 'ID_SOLICITUD', 'controller' => 'extras',
                                'actions' => [['title' => 'Ver más…', 'color' => '#29a84b', 'icon' => 'ion ion-eye', 'data' => [['name' => 'index', 'value' => '{index}']]]],
                                'fields' => ['NOMBRE', 'DOCUMENTO' => 'numeric', 'TELEFONO' => 'phone', 'MES'], 'dataProvider' => $this->extras_model->ProximosACobrar()]) ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <br/><br/>
    </div>
</div>
<!-- /.content-wrapper -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function ()
    {
        $("#tabla").dataTable();
    });

    $('body').on('click', 'a[data-index]', function ()
    {
        Alert($(this).data('index'));
    });

    function Alert(Id)
    {
        BootstrapDialog.show({
            title: '<span class="ion ion-person-stalker" style="font-size: 20pt;font-weight: bold; color: white;"></span>&nbsp;&nbsp;&nbsp; <span  style="font-size: 18pt;">Detalle movimientos del deudor</span>',
            type: BootstrapDialog.TYPE_SUCCESS,
            draggable: true,
            message: function ()
            {
                return $('<div>').load('extras/info', {id: Id});
            },
            buttons: [{
                label: 'Aceptar',
                cssClass: 'btn-success',
                action: function (b)
                {
                    b.close();
                }
            }]
        });
    }
</script>

<?= $Footer ?>
<style>
    tbody tr:hover
    {
        background: #ebf0ff !important;
        cursor: pointer;
    }
</style>
</body>
</html>