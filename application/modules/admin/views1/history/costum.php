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
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#progress" data-toggle="tab">Butuh Verifikasi</a></li>
                <li><a href="#finish" data-toggle="tab">Pembayaran diterima</a></li>
                <li><a href="#void" data-toggle="tab">Ditolak</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="progress">
                    <div id="jqxgrid"></div>
                </div>
                <div class="tab-pane" id="finish">
                    <div id="jqxgridfinish"></div>
                </div>
                <div class="tab-pane" id="void">
                    <div id="jqxgridvoid"></div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
<!--  Modal Konfirmasi -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pembayaran Paket Umroh</h5>
            </div>
            <div class="modal-body">
       		  <form id='frmadddoc' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/qouta/save')?>">
                  <div class="form-group row">
                    <label for="tgl" class="col-sm-3 col-form-label label-input ">Tanggal</label>
                    <div class="col-sm-4">
                      <input type="text"  class="form-control" id="txttgl" name="txttgl">
                    </div>
                 </div>
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 label-input">Paket Umroh</label>
                      <div class="col-sm-8">
                          <div id='jqxcmbpaket_umroh'> </div>
                          <input type="hidden" class="form-control" id="txtpilidpaket" name="txtpilidpaket">
                          <input type="hidden" class="form-control" id="txtpilnama_paket" name="txtpilnama_paket">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 label-input">Warna di Calendar </label>
                      <div class="col-sm-8">
                          <div id='jqxcmbwarna'> </div>
                          <input type="hidden" class="form-control" id="txtpilwarna" name="txtpilwarna">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-3 col-form-label label-input ">Jumlah Qouta</label>
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
<!-- End Modal -->


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
     var headersource =
     {
         datatype: "json",
         datafields: [
             { name: 'idpaid',type: 'int'},
             { name: 'idorder',type: 'int'},
             { name: 'orderno',type: 'string'},
             { name: 'idqouta',type: 'int'},
             { name: 'idpackage',type: 'int'},
             { name: 'namapaket',type: 'string'},
             { name: 'idagent',type: 'int'},
             { name: 'nama',type: 'string'},
             { name: 'jmlhjemaah',type: 'int'},
             { name: 'bank_tujuan',type: 'string'},
             { name: 'bank_sumber',type: 'string'},
             { name: 'jenis_bayar',type: 'string'},
             { name: 'tipe_pembayaran',type: 'bool'},
             { name: 'datepaid',type: 'date',format: 'dd.MM.yyyy'},
             { name: 'tglpaket',type: 'date',format: 'dd.MM.yyyy'},
             { name: 'status',type: 'bool'},
             { name: 'status_bayar',type: 'string'},
             { name: 'jumlah',type: 'float'},
             { name: 'totaltagihan',type: 'float'},
             { name: 'nmfile',type: 'string'},
             { name: 'pathfile',type: 'string'}
         ],
         url: '<?=base_url('admin/json/getdt_byrpaket_umroh_costum'); ?>',
         id: 'idpaid',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(headersource);

     var finishsource =
         {
             datatype: "json",
             datafields: [
                 { name: 'idpaid',type: 'int'},
                 { name: 'idorder',type: 'int'},
                 { name: 'orderno',type: 'string'},
                 { name: 'idqouta',type: 'int'},
                 { name: 'idpackage',type: 'int'},
                 { name: 'namapaket',type: 'string'},
                 { name: 'idagent',type: 'int'},
                 { name: 'nama',type: 'string'},
                 { name: 'jmlhjemaah',type: 'int'},
                 { name: 'bank_tujuan',type: 'string'},
                 { name: 'bank_sumber',type: 'string'},
                 { name: 'jenis_bayar',type: 'string'},
                 { name: 'tipe_pembayaran',type: 'bool'},
                 { name: 'datepaid',type: 'date',format: 'dd.MM.yyyy'},
                 { name: 'tglpaket',type: 'date',format: 'dd.MM.yyyy'},
                 { name: 'status',type: 'bool'},
                 { name: 'status_bayar',type: 'string'},
                 { name: 'jumlah',type: 'float'},
                 { name: 'totaltagihan',type: 'float'},
                 { name: 'nmfile',type: 'string'},
                 { name: 'pathfile',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdt_byrpaket_umrohfinisih_costum'); ?>',
             id: 'idpaid',
             async: false
         };
     var dataAdapterFinish = new $.jqx.dataAdapter(finishsource);

     var linkrenderer = function (row, column, value) {
         if (value.indexOf('#') != -1) {
             value = value.substring(0, value.indexOf('#'));
         }
          var href = $('#jqxgrid').jqxGrid('getcellvalue', row, "pathfile");
          return "<div style='padding:10px;'><a href='" + href + "'  target='_blank'>Lihat Bukti Transfer</a></div>";
     }
    //grid master onprogress
     $("#jqxgrid").jqxGrid(
             {
                 source: dataAdapterHeader,
                 theme: 'material',
                 width: '99.9%',
                 autoheight: true,
                 filterable: true,
                 showfilterrow: true,
				 pagesizeoptions: ['10', '20', '50', '100'],
			     pagesize: 10,
                 sortable: true,
                 ready: function () {
                     $("#jqxgrid").jqxGrid('localizestrings', localizationobj);
                 },
                 columnsresize: true,
                 pageable: true,
                 columns: [
                     { text: 'idpaid', columntype: 'textbox', filtertype: 'input',datafield: 'Idqouta',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Nomor Order', columngroup:'order', columntype: 'textbox', filtertype: 'textbox',datafield: 'orderno',align: 'center',width: '135',cellsalign: 'left'},
                     { text: 'Tanggal\nBerangkat', columngroup:'order', columntype: 'textbox', filtertype: 'date',datafield: 'tglpaket',align: 'center',width: '135',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Paket Umroh', columngroup:'order',columntype: 'textbox', filtertype: 'list',datafield: 'namapaket',align: 'center',cellsalign: 'left',width: '210'},
                     { text: 'Order by Agent', columngroup:'order',columntype: 'textbox', filtertype: 'list',datafield: 'nama',align: 'center',cellsalign: 'left',width: '170'},
                     { text: 'Jumlah Jemaah',columngroup:'order', datafield: 'jmlhjemaah', columntype: 'numberinput', filtertype: 'number',cellsformat: 'd',align: 'center',cellsalign: 'center',width: '110'},
                     { text: 'Grand Total',columngroup:'order', datafield: 'totaltagihan', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},
                     { text: 'Tanggal Pembayaran',columngroup:'bayar', columntype: 'textbox', filtertype: 'date',datafield: 'datepaid',align: 'center',width: '155',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Bank Tujuan', columngroup:'bayar',columntype: 'textbox', filtertype: 'list',datafield: 'bank_tujuan',align: 'center',cellsalign: 'left',width: '210'},
                     { text: 'Bank Sumber', columngroup:'bayar', columntype: 'textbox', filtertype: 'textbox',datafield: 'bank_sumber',align: 'center',width: '215',cellsalign: 'left'},
                     { text: 'Jumlah Pembayaran',columngroup:'bayar', datafield: 'jumlah', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '150'},
                     { text: 'Bukti Transfer',datafield: 'pathfile', width: 150, cellsrenderer: linkrenderer,align: 'center' },
                     { text: 'Jenis Pembayaran', columngroup:'statusbyr',columntype: 'textbox', filtertype: 'list',datafield: 'jenis_bayar',align: 'center',cellsalign: 'left',width: '170'},
                     { text: 'Status Pembayaran', columngroup:'statusbyr',columntype: 'textbox', filtertype: 'list',datafield: 'status_bayar',align: 'center',cellsalign: 'left',width: '170'},
                     {
                         text: '', columngroup:'statusbyr', filtertype: 'none', width: 160, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                         return 'Verifikasi Pembayaran';
                     }, buttonclick: function (row, event) {
                         var button = $(event.currentTarget);
                         var grid = $('#' + this.owner.element.id);
                         var rowData = grid.jqxGrid('getrowdata', row);
                         if (rowData.status ==1) {
                             bootbox.confirm({
                                 message: "Apa anda yakin ingin memverifikasi data pembayaran ini.!? <br>Pastikan data pembayaran telah diterima, konfirmasi ini tidak bisa dibatalkan.!!!",
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
                                         window.location.href = '<?php echo site_url("admin/history/konfirm_bayar_costum");?>/'+rowData.idpaid+'/'+rowData.idorder;
                                     }
                                 }
                             });
                         } else {
                             bootbox.alert("Data pembayaran ini sudah diterima.")
                         }
                       }
                     },
                     {
                         text: '', columngroup:'statusbyr', filtertype: 'none', width: 135, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                             return 'Pembayaran ditolak';
                         }, buttonclick: function (row, event) {
                             var button = $(event.currentTarget);
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             if (rowData.status ==1) {
                                 bootbox.confirm({
                                     message: "Apa anda yakin ingin membatalkan data pembayaran ini.!? <br>Konfirmasi ini tidak bisa dibatalkan.!!!",
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
                                             bootbox.prompt({
                                                 title: 'Masukan alasan pembayaran ditolak',
                                                 centerVertical: true,
                                                 callback: function(result) {
                                                     window.location.href = '<?php echo site_url("admin/history/hapus_bayar_costum");?>/'+rowData.idpaid+'/'+result;
                                                 }
                                             });
                                         }
                                     }
                                 });
                             } else {
                                 bootbox.alert("Data pembayaran ini sudah diterima.")
                             }
                         }
                     }
                 ],
                 columngroups: [
                     { text: 'Informasi Pembayaran', align: 'center', name: 'bayar' },
                     { text: 'Informasi Order', align: 'center', name: 'order' },
                     { text: 'Status Pembayaran', align: 'center', name: 'statusbyr' },
                 ]
             }
         );
     //grid master finish
     $("#jqxgridfinish").jqxGrid(
         {
             source: dataAdapterFinish,
             theme: 'material',
             width: '99.9%',
             autoheight: true,
             filterable: true,
             showfilterrow: true,
             pagesizeoptions: ['10', '20', '50', '100'],
             pagesize: 10,
             sortable: true,
             ready: function () {
                 $("#jqxgridfinish").jqxGrid('localizestrings', localizationobj);
             },
             columnsresize: true,
             pageable: true,
             columns: [
                 { text: 'idpaid', columntype: 'textbox', filtertype: 'input',datafield: 'Idqouta',hidden: true },
                 {
                     text: 'No', sortable: false, filterable: false, editable: false,
                     groupable: false, draggable: false, resizable: false,
                     datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                     cellsrenderer: function (row, column, value) {
                         return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                     }
                 },
                 { text: 'Nomor Order', columngroup:'order', columntype: 'textbox', filtertype: 'textbox',datafield: 'orderno',align: 'center',width: '135',cellsalign: 'left'},
                 { text: 'Tanggal\nBerangkat', columngroup:'order', columntype: 'textbox', filtertype: 'date',datafield: 'tglpaket',align: 'center',width: '135',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                 { text: 'Paket Umroh', columngroup:'order',columntype: 'textbox', filtertype: 'list',datafield: 'namapaket',align: 'center',cellsalign: 'left',width: '210'},
                 { text: 'Order by Agent', columngroup:'order',columntype: 'textbox', filtertype: 'list',datafield: 'nama',align: 'center',cellsalign: 'left',width: '170'},
                 { text: 'Jumlah Jemaah',columngroup:'order', datafield: 'jmlhjemaah', columntype: 'numberinput', filtertype: 'number',cellsformat: 'd',align: 'center',cellsalign: 'center',width: '110'},
                 { text: 'Grand Total',columngroup:'order', datafield: 'totaltagihan', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '140'},
                 { text: 'Tanggal Pembayaran',columngroup:'bayar', columntype: 'textbox', filtertype: 'date',datafield: 'datepaid',align: 'center',width: '155',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                 { text: 'Bank Tujuan', columngroup:'bayar',columntype: 'textbox', filtertype: 'list',datafield: 'bank_tujuan',align: 'center',cellsalign: 'left',width: '210'},
                 { text: 'Bank Sumber', columngroup:'bayar', columntype: 'textbox', filtertype: 'textbox',datafield: 'bank_sumber',align: 'center',width: '215',cellsalign: 'left'},
                 { text: 'Jumlah Pembayaran',columngroup:'bayar', datafield: 'jumlah', columntype: 'numberinput', filtertype: 'number',cellsformat: 'c0',align: 'center',cellsalign: 'right',width: '150'},
                 { text: 'Bukti Transfer',datafield: 'pathfile', width: 150, cellsrenderer: linkrenderer,align: 'center' },
                 { text: 'Jenis Pembayaran', columngroup:'statusbyr',columntype: 'textbox', filtertype: 'list',datafield: 'jenis_bayar',align: 'center',cellsalign: 'left',width: '170'},
                 { text: 'Status Pembayaran', columngroup:'statusbyr',columntype: 'textbox', filtertype: 'list',datafield: 'status_bayar',align: 'center',cellsalign: 'left',width: '170'}
             ],
             columngroups: [
                 { text: 'Informasi Pembayaran', align: 'center', name: 'bayar' },
                 { text: 'Informasi Order', align: 'center', name: 'order' },
                 { text: 'Status Pembayaran', align: 'center', name: 'statusbyr' },
             ]
         }
     );
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


 $('#txttgledit').datepicker({
     format: "yyyy-mm-dd",
     todayBtn: true,
     autoclose: true,
     todayHighlight: true
 }).on('changeDate', function(e){
	    $(this).datepicker('hide');
 });

 //item paket umroh
 var srcpaket =
     {
         datatype: "json",
         datafields: [
             { name: 'idpackage',type: 'int'},
             { name: 'name',type: 'string'}
         ],
         url: '<?=base_url('admin/json/getdatapaket_umroh'); ?>',
         id: 'idpackage',
         async: false
     };
 var dtAdapterAirlines = new $.jqx.dataAdapter(srcpaket);
 $("#jqxcmbpaket_umroh").jqxComboBox({source: dtAdapterAirlines, autoComplete: 'checked', searchMode: 'containsignorecase', width: 300, height: 30,theme: 'material',displayMember: "name", valueMember: "idpackage"});
 //get selected item
 $("#jqxcmbpaket_umroh").on('select', function (event) {
     var selectedItems = "";
     if (event.args) {
         var item = event.args.item;
         if (item) {
             $("#txtpilidpaket").val(item.value);
             $("#txtpilnama_paket").val(item.label);
         }
     }
 });
 $("#jqxcmbwarna").on('colorchange', function (event) {
     $("#txtpilwarna").val('#'+event.args.color.hex);
 });
 $("#jqxcmbwarna").jqxColorPicker({ color: "000000", colorMode: 'hue', width: 300, height: 200});

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


 
    </script>