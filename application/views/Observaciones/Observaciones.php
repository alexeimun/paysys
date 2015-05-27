<!DOCTYPE html>
<html>
<body class="skin-blue">
<?= $Head ?>
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
                            <h3 style="text-align: center;color: #b95801;"><span style="font-size: 25pt;"
                                                                                 class="ios ion-android-list"></span>&nbsp;
                                Listado Observaciones</h3>
                        </div>
                        <div class="box-body">
                            <?= $Observaciones ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            <div>
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