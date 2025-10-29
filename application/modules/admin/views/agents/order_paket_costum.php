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
                                <button type="button" class="btn btn-info btn-rounded" onclick="gotoview()">
                                  <i class="fa fa-calendar"></i> Lihat Draft Kostum Paket Umroh bentuk Kalender
                                </button>
                                

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

    <!-- Begin Modal Add Jamaah-->
    <div class="modal fade" id="modalAddJamaah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jamaah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id='frmaddjamaah' method='post' accept-charset='utf-8' enctype='multipart/form-data'>
                        <div class="form-group row">
                            <label for="tgl" class="col-sm-3 col-form-label">Nama Jamaah</label>
                            <div style="margin-left: 15px;" id='jqxcmbjamaah' class="col-sm-7">
                            </div>
                            <input type="hidden" class="form-control" id="txtpilitemjamaah" name="txtpilitemjamaah" >
                            <input type="hidden" class="form-control" id="txtidorderjamaah" name="txtidorderjamaah">
                            <input type="hidden" class="form-control" id="txtidqoutajamaah" name="txtidqoutajamaah">
                            <input type="hidden" class="form-control" id="txtidpaketjamaah" name="txtidpaketjamaah">
                            <input type="hidden" class="form-control" id="txtidagent" name="txtidagent" >
                            <input type="hidden" class="form-control" id="txtmaxjamaah" name="txtmaxjamaah" >
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-rounded " id="btnsave">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add Add Jamaah-->

    <!-- Begin Modal Konfirmasi pembayaran-->
    <div class="modal fade" id="modalConfirmBayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembayaran No Order : <b><label id="lblorderno_bayar"></label></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id='frmaddbayar' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/agents/savebayar')?>" onsubmit="return validateForm()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tgl" class="col-sm-4 col-form-label label-input ">Total Tagihan untuk No Order : <b><label id="lblorderno_bayar2"></b></label>
                            <div class="col-sm-3">
                                <input type="text"  style="text-align: right " class="form-control money" id="txttotal_byr" name="txttotal_byr" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl" class="col-sm-2 col-form-label label-input ">Tgl Pembayaran</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" id="txttgl" name="txttgl">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 label-input">Rekening Tujuan</label>
                            <div class="col-sm-8">
                                <div id='jqxcmbbank'> </div>
                                <input type="hidden" class="form-control" id="txtpilidbank" name="txtpilidbank">
                                <input type="hidden" class="form-control" id="txtpilnamabank" name="txtpilnamabank">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 label-input">Jenis Pembayaran</label>
                            <div class="col-sm-8">
                                <div id='jqxcmbjenis_pembayaran'> </div>
                                <input type="hidden" class="form-control" id="txtpilidjenisbayar" name="txtpilidjenisbayar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label label-input ">Bank Asal</label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="txtbanksumber" name="txtbanksumber"  >
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label label-input ">No Rek Asal</label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="txtnoreksumber" name="txtnoreksumber" >
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label label-input ">Pemilik Rek</label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control" id="txtpemelik_rek" name="txtpemelik_rek" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label label-input ">Jumlah Transfer</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control money" id="txtjumlahtf" name="txtjumlahtf"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label label-input ">Bukti Transfer</label>
                            <div class="col-sm-8">
                                <input type="file" name="filebukti" id="filebukti"   class="form-control">
                                <input type="hidden" class="form-control" id="txtidorder" name="txtidorder" >
                                <input type="hidden" class="form-control" id="txtorderno" name="txtorderno">
                                <input type="hidden" class="form-control" id="txtidagentbyr" name="txtidagentbyr">
                                <input type="hidden" class="form-control" id="txtidqoutabyr" name="txtidqoutabyr">
                                <input type="hidden" class="form-control" id="txtidpackagebyr" name="txtidpackagebyr"
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded " id="btnsave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi pembayaran-->

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
             { name: 'idagent',type: 'string'},
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
         url: '<?=base_url('admin/json/getdataorder_costum_agent'); ?>',
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
             url: '<?=base_url('admin/json/getdtaorder_jamaah'); ?>',
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
                     { text: 'Tanggal\nBerangkat',columngroup:'detail', columntype: 'textbox', filtertype: 'date',datafield: 'tglpaket',align: 'center',width: '135',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Paket Umroh',columngroup:'detail',columntype: 'textbox', filtertype: 'list',datafield: 'package',align: 'center',cellsalign: 'left',width: '200'},
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
                     {
                         text: '',columngroup:'detail',filtertype: 'none', width: 120, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                             return 'Tambah Jamaah';
                         }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.status <= 0 ) {
                                 bootbox.alert("Status Order masih menunggu dikonfirmasi oleh pihak travel.");
                             } else {
                                 $('#modalAddJamaah').modal('show');
                                 qoutajamaah = rowData.qty;
                                 $('#txtidorderjamaah').val(rowData.idorder);
                                 $('#txtidqoutajamaah').val(rowData.idqouta);
                                 $('#txtidpaketjamaah').val(rowData.idpackage);
                                 $('#txtidagent').val(rowData.idagent);
                                 $('#txtmaxjamaah').val(rowData.qty);
                             }
                         }
                     },
                     { text: 'Harga Paket',columngroup:'bayar', datafield: 'harga', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '120'},
                     { text: 'Total',columngroup:'bayar', datafield: 'total', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},
                     { text: 'Bayar DP',columngroup:'bayar', datafield: 'isdp', columntype: 'checkbox', filtertype: 'bool', width: 90,align: 'center',cellsalign: 'center' },
                     { text: 'Bayar Lunas',columngroup:'bayar', datafield: 'islunas', columntype: 'checkbox', filtertype: 'bool', width: 90 ,align: 'center',cellsalign: 'center'},
                     { text: 'Total DP',columngroup:'bayar', datafield: 'totaldp', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '130'},
                     { text: 'Total Sisa',columngroup:'bayar', datafield: 'sisa', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '130'},
                     { text: 'Total Pelunasan',columngroup:'bayar', datafield: 'lunas', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},
                     {
                         text: '',columngroup:'bayar',filtertype: 'none', width: 155, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                             return 'Confirm Pembayaran';
                         }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.status==0) {
                                 bootbox.alert("Status Order masih menunggu dikonfirmasi oleh pihak travel.");
                             }else if (rowData.islunas==1 || rowData.status==2) {
                                 bootbox.alert("Status pembayaran untuk order ini telah lunas atau selesai.");
                             } else {
                                 $('#modalConfirmBayar').modal('show');
                                 $('#lblorderno_bayar').text(rowData.orderno);
                                 $('#lblorderno_bayar2').text(rowData.orderno);
                                 let nf = new Intl.NumberFormat('en-US');
                                 if ( rowData.isdp==1) {
                                     $('#txttotal_byr').val("Rp. " + nf.format(rowData.sisa));
                                 } else {
                                     $('#txttotal_byr').val("Rp. " + nf.format(rowData.total));
                                 }
                                 $('#txtidorder').val(rowData.idorder);
                                 $('#txtorderno').val(rowData.orderno);
                                 $('#txtidagentbyr').val(rowData.idagent);
                                 $('#txtidqoutabyr').val(rowData.idqouta);
                                 $('#txtidpackagebyr').val(rowData.idpackage);
                             }
                         }
                     },
                     // {
                     //     text: '',columngroup:'bayar',filtertype: 'none', width: 150, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                     //         return 'History Pembayaran';
                     //     }, buttonclick: function (row, event) {
                     //         var grid = $('#' + this.owner.element.id);
                     //         var rowData = grid.jqxGrid('getrowdata', row);
                     //         load_modal_bayar(rowData.idorder);
                     //     }
                     // },
                     { text: 'Status Order',  columntype: 'textbox', filtertype: 'list',datafield: 'statusorder',align: 'center',width: '140',cellsalign: 'center' }
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


     //Set Grid Item Jamaah
     var sourcejamaah =
         {
             datatype: "json",
             datafields: [
                 { name: 'idjamaah',type: 'int'},
                 { name: 'nama',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdtjamaah_agent/'); ?>',
             id: 'idjamaah',
             pagesize: 5,
             async: false
         };
     var dtAdapterJamaah= new $.jqx.dataAdapter(sourcejamaah);
     $("#jqxcmbjamaah").jqxComboBox({source: dtAdapterJamaah, checkboxes: false,autoComplete: 'checked',searchMode: 'containsignorecase', multiSelect: true,width: 500, height: 35,theme: 'material',displayMember: "nama", valueMember: "idjamaah"});
     //get seletect multiple item
     $("#jqxcmbjamaah").on('change', function (event) {
         var items = $("#jqxcmbjamaah").jqxComboBox('getSelectedItems');
         var selectedItems = "";
         var n=1;
         $.each(items, function (index) {
             selectedItems += this.value;
             if (items.length - 1 != index) {
                 selectedItems += ", ";
                 n++;
             }
         });
         if (n > qoutajamaah)  return false;
         $("#txtpilitemjamaah").val(selectedItems);
     });
     //item paket bank
     var srcbank =
         {
             datatype: "json",
             datafields: [
                 { name: 'idbank',type: 'int'},
                 { name: 'bank',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdatabank'); ?>',
             id: 'idbank',
             async: false
         };
     var dtAdapterBank = new $.jqx.dataAdapter(srcbank);
     $("#jqxcmbbank").jqxComboBox({source: dtAdapterBank, width: 350, height: 30,theme: 'material',displayMember: "bank", valueMember: "idbank"});
     //get selected item
     $("#jqxcmbbank").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtpilidbank").val(item.value);
                 $("#txtpilnamabank").val(item.label);
             }
         }
     });
     //item jenis pembayaran
     var samplejenis_bayar =[
         {"id":1, "tipe":"Pembayaran DP"},
         {"id":2, "tipe":"Pelunasan DP"},
         {"id":3, "tipe":"Pembayaran Full"}
     ]
     $("#jqxcmbjenis_pembayaran").jqxComboBox({source: samplejenis_bayar, searchMode: 'containsignorecase', width: 330, height: 30,theme: 'material',displayMember: "tipe", valueMember: "id"});
     //get selected item
     $("#jqxcmbjenis_pembayaran").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtpilidjenisbayar").val(item.value);
             }
         }
     });

 });

 $('.money').mask('000,000,000,000,000', {reverse: true});

 $('#txttgl').datepicker({
     format: "yyyy-mm-dd",
     todayBtn: true,
     autoclose: true,
     todayHighlight: true
 }).on('changeDate', function(e){
     $(this).datepicker('hide');
 });

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
    	   window.location.href = '<?php echo site_url("admin/agents/view");?>';
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


 $(function(){
     $("#frmaddjamaah").submit(function(){
         dataString = $("#frmaddjamaah").serialize();
         $.ajax({
             type: "POST",
             url: '<?=base_url('admin/agents/savejamaah/'); ?>',
             data: dataString,
             success: function(resp){
                 //To reload grid
                 $('#jqxgrid').jqxGrid('updatebounddata', 'cells');
                 $('#modalAddJamaah').modal('hide');
             },
             error: function(resp) { alert(JSON.stringify(resp)); }
         });
         return false;  //stop the actual form post !important!
     });
 });

 function validateForm(){
     var tglpaid = $('#txttgl').val();
     var pilbank = $('#txtpilidbank').val();
     var piljenisbyr = $('#txtpilidjenisbayar').val();
     var banksumber = $('#txtbanksumber').val();
     var noreksumber = $('#txtnoreksumber').val();
     var pemelik_rek = $('#txtpemelik_rek').val();
     var jumlahtf = $('#txtjumlahtf').val();
     var filebukti = $('#filebukti').val();

     if ( tglpaid == null || tglpaid == "") {
         bootbox.alert("Tanggal pembayaran harus diisi.!!");
         return false;
     }
     if ( pilbank == null || pilbank == "") {
         bootbox.alert("Rekening Bank tujuan transfer harus di pilih.!!");
         return false;
     }
     if ( banksumber == null || banksumber == "") {
         bootbox.alert("Nama Bank sumber dana transfer harus diisi.!!");
         return false;
     }
     if ( noreksumber == null || noreksumber == "") {
         bootbox.alert("Nomor rekening sumber dana transfer harus diisi.!!");
         return false;
     }
     if ( pemelik_rek == null || pemelik_rek == "") {
         bootbox.alert("Nama pemilik rekening sumber dana transfer harus diisi.!!");
         return false;
     }
     if ( jumlahtf == null || jumlahtf == "") {
         bootbox.alert("Total nominal jumlah yang dibayarkan harus diisi.!!");
         return false;
     }
     if ( piljenisbyr == null || piljenisbyr == "") {
         bootbox.alert("Pilihan jenis pembayaran harus dipilih.!!");
         return false;
     }
     if (filebukti == null ||filebukti == "") {
         bootbox.alert("Bukti Pembayaran harus dilengkapi!!");
         $( "#filevendor").focus();
         return false;
     }

 }
    </script>