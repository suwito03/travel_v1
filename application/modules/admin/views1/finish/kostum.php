<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >


<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxcolorpicker.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
<!-- Info boxes -->
<div class="container-fluid">
    <style>
        /*      .datepicker { */
        /*         z-index: 100000 !important; */
        /*         display: none; */
        /*     }  */
        .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #baffc9;
        }
        .breadcrumb {
            margin-bottom: 5px;
        }
        .content{
            padding:5px;
        }
        .label-input {
            margin-top:10px;
        }
    </style>
    <div class="row" id="bodygrid">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body table-responsive">
                    <div id="jqxgrid"></div>
                </div>
                <div class="card-footer">
<!--                    <button type="button" class="btn btn-info btn-rounded" onclick="gotoview()">-->
<!--                        <i class="fa fa-calendar"></i> Lihat Order Kostum Paket Umroh bentuk Kalender-->
<!--                    </button>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal List Item Airlines -->
    <div class="modal fade" id="modalListAirlines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Airlines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Airlines</th>
                                <th>Route Flight</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_airlines">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Airlines -->

    <!-- Modal List Item Hotel -->
    <div class="modal fade" id="modalListHotels" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Hotel</th>
                                <th>Class</th>
                                <th>Address</th>
                                <th>Day</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_hotels">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Hotel -->

    <!-- Modal List Item Bus -->
    <div class="modal fade" id="modalListBus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Bus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Brand Bus</th>
                                <th>Vehicle Year</th>
                                <th>License Plate</th>
                                <th>Capasity</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_bus">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Bus -->

    <!-- Modal List Item Include -->
    <div class="modal fade" id="modalListInclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Item Include</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th>Nama Item</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_include">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Include -->

    <!-- Modal List Item Free -->
    <div class="modal fade" id="modalListFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Item Free</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th>Nama Item</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_free">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Free -->



    <!-- Begin Modal List Pembayaran -->
    <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalBuyr" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Data Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th>Nomor Order</th>
                                <th>Tanggal Bayar</th>
                                <th>Rekening Tujuan</th>
                                <th>Rekening Sumber</th>
                                <th>Total Transfer</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody id="table_content_bayar">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal List Pembayaran -->

</div><!-- /.container-fluid -->

<script type="text/javascript">
    $(document).ready(function () {
        var qoutajamaah=0;
        var localizationobj = {};
        localizationobj.currencysymbol = "Rp. ";
        localizationobj.decimalseparator = ".";
        localizationobj.thousandsseparator = ",";
        var headersource =
            {
                datatype: "json",
                datafields: [
                    { name: 'idorder',type: 'int'},
                    { name: 'idqouta',type: 'int'},
                    { name: 'idpackage',type: 'string'},
                    { name: 'orderno',type: 'string'},
                    { name: 'package',type: 'string'},
                    { name: 'idagent',type: 'int'},
                    { name: 'agent',type: 'string'},
                    { name: 'harga',type: 'float'},
                    { name: 'qty',type: 'float'},
                    { name: 'total',type: 'float'},
                    { name: 'status',type: 'string'},
                    { name: 'statusorder',type: 'string'},
                    { name: 'isdp',type: 'bool'},
                    { name: 'totaldp',type: 'float'},
                    { name: 'islunas',type: 'bool'},
                    { name: 'sisa',type: 'float'},
                    { name: 'lunas',type: 'float'},
                    { name: 'tglorder',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'tglpaket',type: 'date',format: 'dd.MM.yyyy' },
                ],
                url: '<?=base_url('admin/json/getdataorder_finish_costum'); ?>',
                id: 'idorder',
                async: false
            };
        var dataAdapterHeader = new $.jqx.dataAdapter(headersource);
        // detail
        var detailsource=
            {
                datatype: "json",
                datafields: [
                    { name: 'idorder',type: 'int'},
                    { name: 'idreff',type: 'int'},
                    { name: 'idqouta',type: 'int'},
                    { name: 'idpackage',type: 'int'},
                    { name: 'nama',type: 'string'},
                    { name: 'gender',type: 'string'},
                    { name: 'tgl_lahir',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'tempat_lahir',type: 'string'},
                    { name: 'tlp',type: 'string'},
                    { name: 'kota_imigrasi',type: 'string'},
                    { name: 'alamat',type: 'string'},
                    { name: 'no_ktp',type: 'string'},
                    { name: 'no_pasport',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdtaorder_costum_jamaah'); ?>',
                async: false
            };
        var dataAdapterDetail = new $.jqx.dataAdapter(detailsource, { autoBind: true });
        orders  = dataAdapterDetail.records;
        var nestedGrids = new Array();
        // create nested grid.
        var initrowdetails = function (index, parentElement, gridElement, record) {
            var id = record.uid.toString();
            var grid = $($(parentElement).children()[0]);
            nestedGrids[index] = grid;
            var filtergroup = new $.jqx.filter();
            var filter_or_operator = 1;
            var filtervalue = id;
            var filtercondition = 'equal';
            var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
            // fill the orders depending on the id.
            var ordersbyid = [];
            for (var m = 0; m < orders.length; m++) {
                var result = filter.evaluate(orders[m]["idorder"]);
                if (result)
                    ordersbyid.push(orders[m]);
            }
            var orderssource  =
                {
                    datafields: [
                        { name: 'idorder',type: 'int'},
                        { name: 'idreff',type: 'int'},
                        { name: 'idqouta',type: 'int'},
                        { name: 'idpackage',type: 'int'},
                        { name: 'nama',type: 'string'},
                        { name: 'gender',type: 'string'},
                        { name: 'tgl_lahir',type: 'date',format: 'dd.MM.yyyy' },
                        { name: 'tempat_lahir',type: 'string'},
                        { name: 'tlp',type: 'string'},
                        { name: 'kota_imigrasi',type: 'string'},
                        { name: 'alamat',type: 'string'},
                        { name: 'no_ktp',type: 'string'},
                        { name: 'no_kk',type: 'string'},
                        { name: 'no_pasport',type: 'string'}
                    ],
                    id: 'idorder',
                    localdata: ordersbyid
                }
            //grid detail
            var nestedGridAdapter = new $.jqx.dataAdapter(orderssource);
            if (grid != null) {
                grid.jqxGrid({
                    source: nestedGridAdapter,
                    width: '98%',
                    height: 410,
                    theme: 'material',
                    filterable: true,
                    pagesizeoptions: ['7', '16', '30', '50'],
                    pagesize: 7,
                    pageable: true,
                    showfilterbar: true,
                    columnsresize: true,
                    ready: function () {
                        grid.jqxGrid('localizestrings', localizationobj);
                    },
                    columns: [
                        {
                            text: 'No', sortable: false, filterable: false, editable: false,
                            groupable: false, draggable: false, resizable: false,
                            datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                            cellsrenderer: function (row, column, value) {
                                return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                            }
                        },
                        { text: 'Nama Jamaah', datafield: 'nama',width: 220},
                        { text: 'Jenis Kelamin', datafield: 'gender',width: 160},
                        { text: 'Tempat Lahir', datafield: 'tempat_lahir',width: 200},
                        { text: 'Tanggal Lahir', datafield: 'tgl_lahir', cellsformat: 'dd-MMM-yyyy',width: 120},
                        { text: 'Telepon', datafield: 'tlp',width: 160},
                        { text: 'Kota Asal Imigrasi', datafield: 'kota_imigrasi',width: 190},
                        { text: 'No KTP', datafield: 'no_ktp',width: 160},
                        { text: 'No KK', datafield: 'no_kk',width: 160},
                        { text: 'No Pasport', datafield: 'no_pasport',width: 160},
                        {
                            text: '', columngroup:'vendor',filtertype: 'none', width: 90, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                                return 'Delete';
                            }, buttonclick: function (row, event) {
                                var button = $(event.currentTarget);
                                var grid = $('#' + this.owner.element.id);
                                var rowData = grid.jqxGrid('getrowdata', row)
                                bootbox.confirm({
                                    message: "Apa anda yakin ingin menhapus data ini.!!?",
                                    buttons: {
                                        confirm: {
                                            label: 'Ya',
                                            className: 'btn-success'
                                        },
                                        cancel: {
                                            label: 'Tidak',
                                            className: 'btn-danger'
                                        }
                                    },
                                    callback: function (result) {
                                        if (result) {
                                            window.location.href = '<?php echo site_url("admin/agents/deldtjamaah");?>/'+rowData.idreff;
                                        }
                                    }
                                });

                            }
                        }
                    ]
                });
            }
        }
        //grid master
        $("#jqxgrid").jqxGrid(
            {
                source: dataAdapterHeader,
                theme: 'material',
                width: '99.9%',
                autoheight: true,
                ready: function () {
                    $("#jqxgrid").jqxGrid('localizestrings', localizationobj);
                },
                filterable: true,
                showfilterrow: true,
                pagesizeoptions: ['10', '20', '50', '100'],
                pagesize: 10,
                sortable: true,
                columnsresize: true,
                rowdetails: true,
                initrowdetails: initrowdetails,
                rowdetailstemplate: { rowdetails: "<div id='grid' style='margin: 10px;'></div>", rowdetailsheight: 425, rowdetailshidden: true },
                pageable: true,
                columns: [
                    { text: 'idorder', columntype: 'textbox', filtertype: 'input',datafield: 'idorder',hidden: true },
                    {
                        text: 'No', sortable: false, filterable: false, editable: false,
                        groupable: false, draggable: false, resizable: false,
                        datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                        cellsrenderer: function (row, column, value) {
                            return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                        }
                    },
                    { text: 'Nomor Order', columntype: 'textbox', filtertype: 'textbox',datafield: 'orderno',align: 'center',width: '135',cellsalign: 'left'},
                    { text: 'Tanggal\nOrder', columntype: 'textbox', filtertype: 'date',datafield: 'tglorder',align: 'center',width: '120',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                    { text: 'Nama Agent',columntype: 'textbox', filtertype: 'textbox',datafield: 'agent',align: 'center',cellsalign: 'left',width: '190'},
                    { text: 'Tanggal\nBerangkat',columngroup:'detail', columntype: 'textbox', filtertype: 'date',datafield: 'tglpaket',align: 'center',width: '135',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                    { text: 'Kostum Paket Umroh',columngroup:'detail',columntype: 'textbox', filtertype: 'list',datafield: 'package',align: 'center',cellsalign: 'left',width: '200'},
                    { text: 'Jumlah Jemaah',columngroup:'detail', datafield: 'qty', columntype: 'numberinput', filtertype: 'number',cellsformat: 'd',align: 'center',cellsalign: 'center',width: '110'},
                    {
                        text: '',columngroup:'detail', filtertype: 'none', width: 40, cellsalign: 'right',columntype:'button',
                        cellsrenderer: function (row, column, value) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            var id=rowData.idpackage;
                            return '<span class="fa fa-plane" dtid="' + rowData.idpackage + '" onclick="load_modal_airlines('+id+')"></span>';
                        }
                    },
                    {
                        text: '',columngroup:'detail', filtertype: 'none', width: 40, cellsalign: 'right',columntype:'button',
                        cellsrenderer: function (row, column, value) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            var id=rowData.idpackage;
                            return '<span  class="fa fa-bed" onclick="load_modal_hotels('+id+')"></span>';
                        }
                    },
                    {
                        text: '',columngroup:'detail', filtertype: 'none', width: 40, cellsalign: 'right',columntype:'button',
                        cellsrenderer: function (row, column, value) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            var id=rowData.idpackage;
                            return '<span  class="fa fa-bus" onclick="load_modal_bus('+id+')"></span>';
                        }
                    },

                    {
                        text: '', columngroup:'detail',filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                            return 'Include';
                        }, buttonclick: function (row, event) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            load_modal_include(rowData.idpackage);
                        }
                    },
                    {
                        text: '', columngroup:'detail',filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                            return 'Free';
                        }, buttonclick: function (row, event) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            load_modal_free(rowData.idpackage);
                        }
                    },
                    { text: 'Harga Paket',columngroup:'bayar', datafield: 'harga', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '120'},
                    { text: 'Total',columngroup:'bayar', datafield: 'total', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},
                    { text: 'Bayar DP',columngroup:'bayar', datafield: 'isdp', columntype: 'checkbox', filtertype: 'bool', width: 90,align: 'center',cellsalign: 'center' },
                    { text: 'Bayar Lunas',columngroup:'bayar', datafield: 'islunas', columntype: 'checkbox', filtertype: 'bool', width: 90 ,align: 'center',cellsalign: 'center'},
                    { text: 'Total DP',columngroup:'bayar', datafield: 'totaldp', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '130'},
                    { text: 'Total Sisa',columngroup:'bayar', datafield: 'sisa', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '130'},
                    { text: 'Total Pelunasan',columngroup:'bayar', datafield: 'lunas', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},

                    // {
                    //     text: '',columngroup:'bayar',filtertype: 'none', width: 150, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                    //         return 'History Pembayaran';
                    //     }, buttonclick: function (row, event) {
                    //         var grid = $('#' + this.owner.element.id);
                    //         var rowData = grid.jqxGrid('getrowdata', row);
                    //         load_modal_bayar(rowData.idorder);
                    //     }
                    // },
                    { text: 'Status Order', columngroup:'status',  columntype: 'textbox', filtertype: 'list',datafield: 'statusorder',align: 'center',width: '140',cellsalign: 'center' }
                ],
                columngroups: [
                    { text: 'Action', align: 'center', name: 'action' },
                    { text: 'Detail Informasi Paket', align: 'center', name: 'detail' },
                    { text: 'Status Pembayaran', align: 'center', name: 'bayar' },
                    { text: 'Status Order', align: 'center', name: 'status' }
                ]
            }
        );
        //set grid detail



    });

    $('.money').mask('000,000,000,000,000', {reverse: true});



    //get data load data bayar
    //function load_modal_bayar(id)
    //{
    //    $('.addtrbayar').remove();
    //    $('.addtdbayar').remove();
    //    $.ajax({
    //        url: '<?php //=base_url('admin/json/getloaddt_bayar_byid'); ?>///'+id,
    //        type: "POST",
    //        success: function(response) {
    //            if (response) {
    //                var obj = jQuery.parseJSON(response);
    //                $('#modalBayar').modal('show');
    //                for (var i = 0; i < Object.keys(obj).length; i++) {
    //                    $('#table_content_bayar').append('<tr class="addtrbayar">');
    //                    for (var j = 0; j < Object.keys(obj[0]).length; j++) {
    //                        if (j==0){
    //                            var no=i+1;
    //                            $('#table_content_bayar').append('<td class="addtdbayar" width="70" align="center">'+no+'</td>');
    //                        }
    //                        if (j==5){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
    //                        }
    //                        if (j==9){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
    //                        }
    //                        if (j==2){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
    //                        }
    //                        if (j==3){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
    //                        }
    //                        if (j==16){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left"><a href="' + obj[i][Object.keys(obj[0])[j]] + '" target="_blank">Lihat Bukti Transfer</a></td>');
    //                        }
    //                        if (j==14){
    //                            $('#table_content_bayar').append('<td class="addtdbayar" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
    //                        }
    //                    }
    //                    $('#table_content_bayar').append('</tr>');
    //                }
    //            }
    //        }
    //    });
    //}


    function gotoview() {
        window.location.href = '<?php echo site_url("admin/order/viewcostum");?>';
    }

    //get data load airlines
    function load_modal_airlines(id)
    {
        $('.addtrairlines').remove();
        $('.addtdairlines').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_costum_airlines'); ?>/'+id,
            type: "POST",
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $('#modalListAirlines').modal('show');
                    for (var i = 0; i < Object.keys(obj).length; i++) {
                        $('#table_content_airlines').append('<tr class="addtrairlines">');
                        for (var j = 0; j < Object.keys(obj[0]).length; j++) {
                            if (j==4 || j==5){
                                $('#table_content_airlines').append('<td class="addtdairlines" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
                            }
                        }
                        $('#table_content_airlines').append('</tr>');
                    }
                }
            }
        });
    }
    //get data load hotel load_modal_bus
    function load_modal_hotels(id)
    {
        $('.addtrhotels').remove();
        $('.addtdhotels').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_costum_hotels'); ?>/'+id,
            type: "POST",
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $('#modalListHotels').modal('show');
                    for (var i = 0; i < Object.keys(obj).length; i++) {
                        $('#table_content_hotels').append('<tr class="addtrhotels">');
                        for (var j = 0; j < Object.keys(obj[0]).length; j++) {
                            if (j==0 || j==1 || j==2 || j==7){
                                $('#table_content_hotels').append('<td class="addtdhotels" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
                            }
                        }
                        $('#table_content_hotels').append('</tr>');
                    }
                }
            }
        });
    }
    //get data load bus
    function load_modal_bus(id)
    {
        $('.addtrbus').remove();
        $('.addtdbus').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_costum_bus'); ?>/'+id,
            type: "POST",
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $('#modalListBus').modal('show');
                    for (var i = 0; i < Object.keys(obj).length; i++) {
                        $('#table_content_bus').append('<tr class="addtrbus">');
                        for (var j = 0; j < Object.keys(obj[0]).length; j++) {
                            if (j==1 || j==2 || j==3 || j==4){
                                $('#table_content_bus').append('<td class="addtdbus" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
                            }
                        }
                        $('#table_content_bus').append('</tr>');
                    }
                }
            }
        });
    }
    //get data load item include
    function load_modal_include(id)
    {
        $('.addtrinclude').remove();
        $('.addtdinclude').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_costum_include'); ?>/'+id,
            type: "POST",
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $('#modalListInclude').modal('show');
                    for (var i = 0; i < Object.keys(obj).length; i++) {
                        $('#table_content_include').append('<tr class="addtrinclude">');
                        for (var j = 0; j < Object.keys(obj[0]).length; j++) {
                            if (j==0){
                                var no=i+1;
                                $('#table_content_include').append('<td class="addtdinclude" width="70" align="center">'+no+'</td>');
                            }
                            if (j==1){
                                $('#table_content_include').append('<td class="addtdinclude" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
                            }
                        }
                        $('#table_content_include').append('</tr>');
                    }
                }
            }
        });
    }
    //get data load item include
    function load_modal_free(id)
    {
        $('.addtrfree').remove();
        $('.addtdfree').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_costum_free'); ?>/'+id,
            type: "POST",
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    $('#modalListFree').modal('show');
                    for (var i = 0; i < Object.keys(obj).length; i++) {
                        $('#table_content_free').append('<tr class="addtrfree">');
                        for (var j = 0; j < Object.keys(obj[0]).length; j++) {
                            if (j==0){
                                var no=i+1;
                                $('#table_content_free').append('<td class="addtdfree" width="70" align="center">'+no+'</td>');
                            }
                            if (j==1){
                                $('#table_content_free').append('<td class="addtdfree" align="left">' + obj[i][Object.keys(obj[0])[j]] + '</td>');
                            }
                        }
                        $('#table_content_free').append('</tr>');
                    }
                }
            }
        });
    }


</script>