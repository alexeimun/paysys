<h3 style="text-align: center;color:#3fabd6;"><span class="ion-pie-graph"></span>
    Información
</h3>
<hr style="border: 1px solid #3fabd6;"/>

<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom" id="tabs">
        <ul class="nav nav-tabs" style="background: #ecf0f5;">
            <li><a href="#tab_1" data-toggle="tab"><span
                        class="ion-person-stalker"></span> Datos</a></li>
            <li><a href="#tab_2" data-toggle="tab"><span class="glyphicon glyphicon-briefcase"></span>
                    Abonos</a></li>
            <li class="active" id="interes-tab"><a href="#tab_3" data-toggle="tab"><span
                        class="glyphicon glyphicon-list-alt"></span> Intereses</a></li>
            <li><a href="#tab_4" data-toggle="tab"><span class="ion-stats-bars"></span> Estadísticas</a>
            </li>
        </ul>

        <div class="tab-content"
             style="height: 50px;background: #ecf0f5;overflow-x: hidden;overflow-y: auto;border-top: 4px solid white;">
            <div class="tab-pane" id="tab_1">
                <div id="info"></div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <div id="Abonos"></div>
            </div>
            <div class="tab-pane active" id="tab_3">
                <div id="Intereses"></div>
            </div>

            <div class="tab-pane" id="tab_4">
                <div id="statics"></div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<script>
    $.post('relaciones', {IdSol: <?= $id?>, Tipo: 1}, function (solicitud)
    {
        var solicitud = JSON.parse(solicitud);
        $('#Intereses').html(solicitud.Intereses);
        $('.tab-content').css('height', '300px');
        $('#info').html(solicitud.Datos.Clientes);
        $('#Abonos').html(solicitud.Abonos);
        $('#statics').html(solicitud.Estadisticas);
    });
</script>