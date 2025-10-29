<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >

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

.timeline{
    counter-reset: test 0;
    position: relative;
    margin-top:7px;
}

.timeline li{
    list-style: none;
    float: left;
    width: 17%;
    position: relative;
    text-align: center;
    text-transform: capitalize;
}

ul:nth-child(1){
    color: #4caf50;
}

.timeline li:before{
    counter-increment: test;
    content: counter(test);
    width: 33px;
    height: 33px;
    border: 1px solid #4caf50;
    border-radius: 50%;
    display: block;
    text-align: center;
    line-height: 33px;
    margin: 0 auto 5px auto;
    background: #fff;
    color: #000;
    transition: all ease-in-out .3s;
    cursor: pointer;
}

.timeline li:after{
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    background-color: grey;
    top: 13px;
    left: -50%;
    z-index: -999;
    transition: all ease-in-out .3s;
}

.timeline li:first-child:after{
    content: none;
}
.timeline li.active-tl{
    color: #555555;
}
.timeline li.active-tl:before{
    background: #4caf50;
    color: #F1F1F1;
}

.timeline li.active-tl + li:after{
    background: #4caf50;
}
</style>

<div class="row" id="bodygrid">
   <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                          <div id="jqxgrid"></div>
                        </div>
                         <div class="card-footer">
                             <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#modalAdd">
                                 <i class="fa fa-plus-circle"></i> Tambah Data Order via Agent
                             </button>
                                <button type="button" class="btn btn-info btn-rounded" onclick="gotoview()">
                                  <i class="fa fa-calendar"></i> Lihat Jadwal Order Bentuk Kalendar
                                </button>
                        </div>
                    </div>
   </div>
</div>

    <!--  Modal Add Order via Agent-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Order via Agent</h5>
                </div>
                <div class="modal-body">
                    <form id='frmadddoc' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/order/saveorder_via_agent')?>">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 label-input">Agent</label>
                            <div class="col-sm-8">
                                <div id='jqxcmbagent'> </div>
                                <input type="hidden" class="form-control" id="txtpilidagent" name="txtpilidagent">
                           </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 label-input">Paket Umroh</label>
                            <div class="col-sm-8">
                                <div id='jqxcmbpaket_umroh'> </div>
                                <input type="hidden" class="form-control" id="txtpilidqouta" name="txtpilidqouta">
                                <input type="hidden" class="form-control" id="txtpilnama_paket" name="txtpilnama_paket">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label label-input ">Jumlah Jemaah</label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="txtjumlah" name="txtjumlah"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            </div>
                            <label for="staticEmail" class="col-sm-1 col-form-label label-input ">Orang</label>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-rounded " id="btnsave">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add Order via Agent -->

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
	<!-- /.row -->
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<script type="text/javascript">
 $(document).ready(function () {
	 var localizationobj = {};
     localizationobj.currencysymbol = "Rp. ";
     localizationobj.decimalseparator = ".";
     localizationobj.thousandsseparator = ",";

     // item data agent
     var srcagent=
         {
             datatype: "json",
             datafields: [
                 { name: 'idagent',type: 'int'},
                 { name: 'nama',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdt_agent'); ?>',
             id: 'idpackage',
             async: false
         };
     var dtAdapterAgent= new $.jqx.dataAdapter(srcagent);
     $("#jqxcmbagent").jqxComboBox({source: dtAdapterAgent, autoComplete: 'checked', searchMode: 'containsignorecase', width: 300, height: 30,theme: 'material',displayMember: "nama", valueMember: "idagent"});
     //get selected item
     $("#jqxcmbagent").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtpilidagent").val(item.value);
             }
         }
     });


     //item paket umroh
     var srcpaket =
         {
             datatype: "json",
             datafields: [
                 { name: 'Idqouta',type: 'int'},
                 { name: 'idpackage',type: 'int'},
                 { name: 'package',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdataumroh'); ?>',
             id: 'idpackage',
             async: false
         };
     var dtAdapterAirlines = new $.jqx.dataAdapter(srcpaket);
     $("#jqxcmbpaket_umroh").jqxComboBox({source: dtAdapterAirlines, autoComplete: 'checked', searchMode: 'containsignorecase', width: 300, height: 30,theme: 'material',displayMember: "package", valueMember: "Idqouta"});
     //get selected item
     $("#jqxcmbpaket_umroh").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtpilidqouta").val(item.value);
                 $("#txtpilnama_paket").val(item.label);
             }
         }
     });

     //header source grid
     var headersource =
     {
         datatype: "json",
         datafields: [
             { name: 'idorder',type: 'int'},
             { name: 'idqouta',type: 'int'},
             { name: 'orderno',type: 'string'},
             { name: 'idpackage',type: 'string'},
             { name: 'package',type: 'string'},
             { name: 'idagent',type: 'string'},
             { name: 'nama',type: 'string'},
             { name: 'harga',type: 'float'},
             { name: 'qty',type: 'float'},
             { name: 'total',type: 'float'},
             { name: 'status',type: 'int'},
             { name: 'statusorder',type: 'string'},
             { name: 'statusbayar',type: 'string'},
             { name: 'isdp',type: 'bool'},
             { name: 'totaldp',type: 'float'},
             { name: 'islunas',type: 'bool'},
             { name: 'sisa',type: 'float'},
             { name: 'lunas',type: 'float'},
             { name: 'tglpaket',type: 'date',format: 'dd.MM.yyyy' },
             { name: 'tglorder',type: 'date',format: 'dd.MM.yyyy' }
         ],
         url: '<?=base_url('admin/json/getdataorder_all'); ?>',
         id: 'idorder',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(headersource);
     var cellsrenderertimeline = function (row, columnfield, value, defaulthtml, columnproperties) {
         //return '<span style="line-height:0.6;display:block">&nbsp;</span> <span style="margin-left:40px;line-height:0;">' + value + '%</span>';
             switch(value) {
                 case 0:
                     return '<ul class="timeline"><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status Order  => Booking (order telah dibooking oleh agent selanjutnya menunggu konfirmasi order oleh pihak travel)">Booking</li><li>Proses</li> <li>Pembayaran<br>DP</li><li>Pembayaran<br>Lunas</li><li>Selesai</li></ul>';
                     break;
                 case 1:
                     return '<ul class="timeline"><li>Booking</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status Order => Proses (order telah dikonfirmasi dan menunggu pembayaran oleh pihak agent)">Proses</li> <li>Pembayaran<br>DP</li><li>Pembayaran<br>Lunas</li><li>Selesai</li></ul>';
                     break;
                 case 2:
                     return '<ul class="timeline"><li>Booking</li><li>Proses</li> <li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status Order => Pembayaran DP (status pembayaran uang muka telah diterima)">Pembayaran<br>DP</li><li>Pembayaran<br>Lunas</li><li>Selesai</li></ul>';
                     break;
                 case 3:
                     return '<ul class="timeline"><li>Booking</li><li>Proses</li> <li>Pembayaran<br>DP</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status Order => Pembayaran Lunas (status pembayaran telah lunas / pembayaran full dan sudah diterima, menunggu proses keberangkatan jamaah)">Pembayaran<br>Lunas</li><li>Selesai</li></ul>';
                     break;
                 case 4:
                     return '<ul class="timeline"><li>Booking</li><li>Proses</li> <li>Pembayaran<br>DP</li><li>Pembayaran<br>Lunas</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status Order => Selesai (jamaah telah kembali ke tanah air)">Selesai</li></ul>';
                     break;
             }

     }
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
             url: '<?=base_url('admin/json/getdtaorderall_jamaah'); ?>',
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
                     { text: 'No Pasport', datafield: 'no_pasport',width: 160}
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
                 rowsheight: 85,
                 autoheight: true,
                 autorowheight: true,
                 ready: function () {
                     $("#jqxgrid").jqxGrid('localizestrings', localizationobj);
                 },
                 filterable: true,
                 showfilterrow: true,
				 pagesizeoptions: ['9', '18', '27', '100'],
			     pagesize: 3,
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
                     { text: 'Nama Agent',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama',align: 'center',cellsalign: 'left',width: '190'},
                     { text: 'Tanggal\nBerangkat',columngroup:'detail', columntype: 'textbox', filtertype: 'date',datafield: 'tglpaket',align: 'center',width: '125',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Paket Umroh',columngroup:'detail',columntype: 'textbox', filtertype: 'list',datafield: 'package',align: 'center',cellsalign: 'left',width: '205'},
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
                     { text: 'Status Order',columngroup:'status',  columntype: 'textbox', filtertype: 'list',datafield: 'statusorder',align: 'center',width: '130',cellsalign: 'center' },
                     { text: 'Timeline',columngroup:'status', datafield: 'status', width: 500, cellsrenderer: cellsrenderertimeline,align: 'center' },
                     {
                         text: '', columngroup:'status',filtertype: 'none', width: 107, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info',
                         cellsrenderer: function (row, column, value) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.status <= 0  && rowData.islunas == false) {
                                 return 'Konfirm Order';
                             } else if (rowData.islunas == true) {
                                 return 'Selesai';
                             } else {
                                 return 'Proses';
                             }
                         }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.status <= 0  && rowData.islunas == false) {
                                 bootbox.confirm({
                                     message: "Apa anda yakin ingin memproses order ini.!!!?",
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
                                             window.location.href = '<?php echo site_url("admin/order/konfirmasi");?>/'+rowData.idorder+'/'+rowData.idqouta;
                                         }
                                     }
                                 });
                             } else if (rowData.islunas == true) {
                                 bootbox.confirm({
                                     message: "Apa anda yakin ingin menyelesaikan order ini menjadi riwayat order.!!!?<br> Aksi ini tidak bisa dibatalkan..!!<br>Pastikan Jamaah Paket umroh ini sudah kembali ke tanah air sebelum menyelesaikan order ini",
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
                                             window.location.href = '<?php echo site_url("admin/order/konfirmasi_selesai");?>/'+rowData.idorder;
                                         }
                                     }
                                 });
                             } else {
                                 bootbox.alert('Status Order masih dalam proses pembayaran atau keberangkatan.!!');
                             }
                         }
                     },
                     {
                         text: '', columngroup:'status',filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger',
                         cellsrenderer: function (row, column, value) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.isdp === true || rowData.islunas === true) {
                                 return '';
                             } else {
                                 return 'Void';
                             }

                         }, buttonclick: function (row, event) {
                             var button = $(event.currentTarget);
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.isdp === true || rowData.islunas === true) {
                                 bootbox.alert("Order ini telah melakukan pembayaran jadi tidak bisa dicancel/void");
                             } else {
                                 bootbox.confirm({
                                     message: "Apa anda yakin ingin membatalkan/void data order ini.!!!<br> Aksi ini tidak dapat dibatalkan apabila order ini sudah dibatalkan/void?",
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
                                             window.location.href = '<?php echo site_url("admin/order/void");?>/'+rowData.idorder;
                                         }
                                     }
                                 });
                             }
                         }
                     }
                 ],
                 columngroups: [
                     { text: 'Action', align: 'center', name: 'action' },
                     { text: 'Detail Informasi Paket', align: 'center', name: 'detail' },
                     { text: 'Status Pembayaran', align: 'center', name: 'bayar' },
                     { text: 'Status Order', align: 'center', name: 'status' }
                 ]
             }
         );

 });

 $('.money').mask('000,000,000,000,000', {reverse: true});


        function loaddata($id){
            $.ajax({
                url: '<?=base_url('admin/json/getloaddtqouta'); ?>/'+$id,
                type: "POST",
                success: function(result) {
                    if (result) {
                        var obj = jQuery.parseJSON(result);
                        $('#modalEdit').modal('show');
                        $("#txtidqouta").val($id);
                        $("#txtjumlahedit").val(obj[0].qouta);
                        $("#txttgledit").val(obj[0].tanggal);
                    }
                }
            });
        }

       function gotoview() {
    	   window.location.href = '<?php echo site_url("admin/order/jadwal");?>';
       }

 //get data load airlines
 function load_modal_airlines(id)
 {
     $('.addtrairlines').remove();
     $('.addtdairlines').remove();
     $.ajax({
         url: '<?=base_url('admin/json/getloaddt_mairlines'); ?>/'+id,
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
         url: '<?=base_url('admin/json/getloaddt_hotels'); ?>/'+id,
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
         url: '<?=base_url('admin/json/getloaddt_bus'); ?>/'+id,
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
         url: '<?=base_url('admin/json/getloaddt_include'); ?>/'+id,
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
         url: '<?=base_url('admin/json/getloaddt_free'); ?>/'+id,
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