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
</style>
<div class="row" id="bodygrid">
   <div class="col-md-12">
                    <div class="card">
              
                        <div class="card-body table-responsive">
                          <div id="jqxgrid"></div>
                        </div>
                         <div class="card-footer">
                             <button type="button" class="btn btn-primary btn-rounded" onclick="gotoadd()">
                                  <i class="fa fa-plus-circle"></i> Tambah Data
                                </button>
                        </div>
                    </div>
   </div>                 
</div>


	<!-- /.row -->
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->

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
             { name: 'idpackage',type: 'int'},
             { name: 'name',type: 'string'},
             { name: 'type',type: 'string'},
             { name: 'day',type: 'int'},
             { name: 'price',type: 'float'},
             { name: 'remarks',type: 'string'}
         ],
         url: '<?=base_url('admin/json/getdatapaket_umroh'); ?>',
         id: 'idpackage',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(headersource);

    //grid master
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
                 columnsresize: true,
                 pageable: true,
                 columns: [
                     { text: 'idpackage', columntype: 'textbox', filtertype: 'input',datafield: 'idpackage',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Nama',columntype: 'textbox', filtertype: 'textbox',datafield: 'name',align: 'center',cellsalign: 'left'},
                     { text: 'Tipe',columntype: 'textbox', filtertype: 'list',datafield: 'type',align: 'center',cellsalign: 'left',width: '135'},
                     { text: 'Jumlah Hari',columntype: 'textbox', filtertype: 'textbox',datafield: 'day',align: 'center',cellsalign: 'center',width: '100'},
                     { text: 'Harga',columntype: 'numberinput', filtertype: 'numberinput',cellsformat: 'd',datafield: 'price',align: 'center',cellsalign: 'right',width: '95'},
                     { text: 'Catatan',columntype: 'textbox', filtertype: 'textbox',datafield: 'remarks',align: 'center',cellsalign: 'right'},
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
                         text: '', columngroup:'item',filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                             return 'Include';
                         }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             load_modal_include(rowData.idpackage);
                         }
                     },
                     {
                         text: '', columngroup:'item',filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                             return 'Free';
                         }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                             load_modal_free(rowData.idpackage);
                         }
                     },
                     {
                         text: '', columngroup:'action', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info fa fa-plus-circle', cellsrenderer: function () {
                             return 'Edit';
                         }, buttonclick: function (row, event) {
                                 var grid = $('#' + this.owner.element.id);
                                 var rowData = grid.jqxGrid('getrowdata', row);
                                 window.location.href = '<?php echo site_url("admin/umroh/edit");?>/'+rowData.idpackage;
                         }
                     },
                     {
                         text: '', columngroup:'action', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                         return 'Hapus';
                     }, buttonclick: function (row, event) {
                         var button = $(event.currentTarget);
                         var grid = $('#' + this.owner.element.id);
                         var rowData = grid.jqxGrid('getrowdata', row);
                             bootbox.confirm({
                                 message: "Apa anda yakin ingin menghapus data ini.!!!?",
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
                                 		 window.location.href = '<?php echo site_url("admin/umroh/delall");?>/'+rowData.idpackage;
                                      }
                                 }
                             });
                       }
                     }
                 ],
                 columngroups: [
                     { text: 'Action', align: 'center', name: 'action' },
                     { text: 'Accommodation ', align: 'center', name: 'detail' },
                     { text: 'Detail Item', align: 'center', name: 'item' }
                 ]
             }
         );

 });

 $('.money').mask('000,000,000,000,000', {reverse: true});


  function loaddata($id){
            $.ajax({
                url: '<?=base_url('admin/json/getloaddtumroh'); ?>/'+$id,
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

 function gotoadd() {
    	   window.location.href = '<?php echo site_url("admin/umroh/add");?>';
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