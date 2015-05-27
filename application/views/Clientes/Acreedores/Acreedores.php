<!DOCTYPE html>
<html>
<?= $Head ?>
<body class="skin-blue">
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
                            <h3 style="text-align: center;color: #3c8dbc;"><span style="font-size: 25pt;" class="ios ion-android-list"></span>&nbsp; Listado Acreedores</h3>
                        </div>
                        <div class="box-body">
                            <?= $Acreedores ?>
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
    $(function () {
        $("#tabla").dataTable();
    });
    function eliminar(Id) {
        BootstrapDialog.show({
            title: '<span class="ion ion-android-delete" style="font-size: 20pt;font-weight: bold; color: white;"></span>&nbsp;&nbsp;&nbsp; <span  style="font-size: 18pt;">Atención!</span>',
            type: BootstrapDialog.TYPE_DANGER,
            draggable: true,
            message: 'Esta seguro que desea eliminar este registro?</span>',
            buttons: [{
                label: 'Aceptar',
                cssClass: 'btn-danger',
                action: function () {
                    $.post('<?=site_url('eliminarAcreedor') ?>', {Id: Id}, function ()
                    {
                        location.href = 'acreedores';
                    });
                }
            },
                {
                    label: 'Cancelar',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }]
        });
    }
</script>

<?= $Footer ?>
<style>
    tbody tr:hover {
        background: #ebf0ff !important;
        cursor: pointer;
    }
</style>
</body>
</html>