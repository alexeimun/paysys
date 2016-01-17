<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red-gradient">
                <div class="inner">
                    <h3><?= $Deudores ?></h3>

                    <p>Deudores</p>
                </div>
                <div class="icon">
                    <i style="cursor: pointer;" onclick="location.href='deudores'" class="ion ion-person-stalker"></i>
                </div>
                <a href="deudores" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue-gradient">
                <div class="inner">
                    <h3><?= $Acreedores ?></h3>

                    <p>Acreedores</p>
                </div>
                <div class="icon">
                    <i style="cursor: pointer;" onclick="location.href='acreedores'" class="ion ion-person-stalker"></i>
                </div>
                <a href="acreedores" class="small-box-footer">Más información <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple-gradient">
                <div class="inner">
                    <h3><?=$Solicitudes ?></h3>

                    <p>Solicitudes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people" style="cursor: pointer;" onclick="location.href='solicitudes'" ></i>
                </div>
                <a href="solicitudes" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $Usuarios ?></h3>

                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i style="cursor: pointer;" onclick="location.href='usuarios'" class="ion ion-person-add"></i>
                </div>
                <a href="usuarios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!--fin-->

        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->

</section><!-- /.content -->