<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<script type="text/javascript" src="<?php echo base_url("assets/plugins/chartjs/Chart.js"); ?>" ></script>

<style>
    .container-fluid {
        padding-right: 5px;
        padding-left: 5px;
    }
    .content {
        padding:2px;
    }
    .breadcrumb {
        margin-bottom: 10px;
    }
</style>
<!-- Info boxes -->
<div class="container-fluid">
    <div class="row">
            <div class="col-md-3">
<!--                <div class="panel panel-primary">-->
<!--                    <div class="panel-body">-->
<!--                        <div> <img src="--><?php //echo base_url(); ?><!--assets/img/Logo-BST-White.png" width="90px" /> APLIKASI BSTRAVEL</div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Order<br>Paket Umroh</span>
                        <span class="h2" ><?php echo number_format($totalorder);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Order <br>Kostum Paket Umroh</span>
                        <span class="h2" ><?php echo number_format(2);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Agent</span>
                        <span class="h2" ><?php echo number_format($totalagent);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Jamaah</span>
                        <span class="h2" ><?php echo number_format($totaljamaah);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Notifikasi Data Order Paket Umroh</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tblorderpaket" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Paket</th>
                                <th>Order by <br>Agent</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($lstorder_paketumroh)) {
                                    $no=1;
                                    foreach ($lstorder_paketumroh as $roworder) { ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $roworder['orderno']?></td>
                                        <td><?php echo $roworder['package']?></td>
                                        <td><?php echo $roworder['nama']?></td>
                                        <td><?php echo number_format($roworder['total'])?></td>
                                        <td><span class="label label-info">Butuh Konfirmasi</span></td>
                                    </tr>
                            <?php
                                        $no++; }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a onclick="gotoorder()" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Order Paket Umroh </a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Notifikasi Data Order Paket Umroh Kostum</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tblordercostum" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Paket</th>
                                <th>Order by <br>Agent</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($lstorder_paketumroh_costum)) {
                                $noc=1;
                                foreach ($lstorder_paketumroh_costum as $rowordercostum) { ?>
                                    <tr>
                                        <td><?php echo $noc;?></td>
                                        <td><?php echo $rowordercostum['orderno']?></td>
                                        <td><?php echo $rowordercostum['package']?></td>
                                        <td><?php echo $rowordercostum['nama']?></td>
                                        <td><?php echo number_format($rowordercostum['total'])?></td>
                                        <td><span class="label label-info">Butuh Konfirmasi</span></td>
                                    </tr>
                                    <?php
                                    $noc++; }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a onclick="gotoorder_costum()" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Order Paket Umroh Costum</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Notifikasi Konfirmasi Pembayaran Paket Umroh</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tblpaid" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Agent</th>
                                <th>Total Transfer</th>
                                <th>Bank Tujuan</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($lstpaid_paketumroh)) {
                                $nop=1;
                                foreach ($lstpaid_paketumroh as $rowpaid) { ?>
                                    <tr>
                                        <td><?php echo $nop;?></td>
                                        <td><?php echo $rowpaid['orderno']?></td>
                                        <td><?php echo $rowpaid['nama']?></td>
                                        <td><?php echo number_format($rowpaid['jumlah'])?></td>
                                        <td><?php echo $rowpaid['bank_tujuan']?></td>
                                        <td><span class="label label-success">Butuh Verifikasi</span></td>
                                    </tr>
                                    <?php
                                    $nop++; }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a onclick="goto_bayar_paket()" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Histori Pembayaran Paket Umroh</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Notifikasi Konfirmasi Pembayaran Paket Umroh Kostum</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tblpaidcostum" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Agent</th>
                                <th>Total Transfer</th>
                                <th>Bank Tujuan</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($lstpaid_paketumroh_costum)) {
                                $nopc=1;
                                foreach ($lstpaid_paketumroh_costum as $rowpaidcostum) { ?>
                                    <tr>
                                        <td><?php echo $nopc;?></td>
                                        <td><?php echo $rowpaidcostum['orderno']?></td>
                                        <td><?php echo $rowpaidcostum['nama']?></td>
                                        <td><?php echo number_format($rowpaidcostum['jumlah'])?></td>
                                        <td><?php echo $rowpaidcostum['bank_tujuan']?></td>
                                        <td><span class="label label-success">Butuh Verifikasi</span></td>
                                    </tr>
                                    <?php
                                    $nopc++; }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a onclick="goto_bayar_paket_kostum()" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Histori Pembayaran Paket Umroh Kostum</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Sales Paket Umroh Tahun 2024</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="barChart" style="height: 229px; width: 603px;" height="286" width="753"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>

	

</div><!-- /.container-fluid -->
<script type="text/javascript">
$(document).ready(function() {
    // $('#expumum').DataTable();
    // $('#expcorporate').DataTable();
});
$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var areaChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Paket Umroh 9 Hari",
                fillColor: "rgba(210, 214, 222, 1)",
                strokeColor: "rgba(210, 214, 222, 1)",
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "Paket Umroh 12 Hari",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: "Paket Umroh 15 Hari",
                fillColor: "rgba(30,121,118,0.9)",
                strokeColor: "rgba(30,121,118,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [33, 12, 45, 12, 78, 11, 22]
            }
        ]
    };


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
});
function gotoorder() {
    window.location.href = '<?php echo site_url("admin/order/");?>';
}
function gotoorder_costum() {
    window.location.href = '<?php echo site_url("admin/order/costum");?>';
}
function goto_bayar_paket() {
    window.location.href = '<?php echo site_url("admin/history/");?>';
}
function goto_bayar_paket_kostum() {
    window.location.href = '<?php echo site_url("admin/history/costum");?>';
}
$(function () {
    $('#tblorderpaket').DataTable({
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "dom": "rtip",
        "autoWidth": true
    });
    $('#tblordercostum').DataTable({
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "dom": "rtip",
        "autoWidth": true
    });
    $('#tblpaid').DataTable({
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "dom": "rtip",
        "autoWidth": true
    });
    $('#tblpaidcostum').DataTable({
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "dom": "rtip",
        "autoWidth": true
    });
});
</script>
