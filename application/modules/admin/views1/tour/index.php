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
                                  <i class="fa fa-plus-circle"></i> &nbsp; TAMBAH DATA
                                </button>
                        </div>
                    </div>
   </div>                 
</div>
<!--  Modal Add-->   
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Qouta</h5>
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

   <!--  Modal Edit-->   
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Qouta</h5>
            </div>
            <div class="modal-body">
       			 <form id='frmadddoc' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/qouta/update')?>">

                     <div class="form-group row">
                         <label for="tgl" class="col-sm-3 col-form-label label-input ">Tanggal</label>
                         <div class="col-sm-4">
                             <input type="text"  class="form-control" id="txttgledit" name="txttgledit">
                             <input type="hidden" class="form-control" id="txtidqouta" name="txtidqouta" >
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="staticEmail" class="col-sm-3 col-form-label label-input ">Jumlah Qouta</label>
                         <div class="col-sm-2">
                             <input type="text"  class="form-control" id="txtjumlahedit" name="txtjumlahedit"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                         </div>
                         <label for="staticEmail" class="col-sm-1 col-form-label label-input" >Orang</label>
                     </div>
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-rounded " id="btnsave">Update</button>
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
             { name: 'Idqouta',type: 'int'},
             { name: 'qouta',type: 'int'},
             { name: 'tanggal',type: 'date',format: 'dd.MM.yyyy' }
         ],
         url: '<?=base_url('admin/json/getdatatourpackage'); ?>',
         id: 'Idqouta',
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
                     { text: 'Idqouta', columntype: 'textbox', filtertype: 'input',datafield: 'Idqouta',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Tanggal', columntype: 'textbox', filtertype: 'date',datafield: 'tanggal',align: 'center',width: '220',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Jumlah Qouta',columntype: 'textbox', filtertype: 'textbox',datafield: 'qouta',align: 'center',cellsalign: 'left'},
                     {
                         text: '', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info', cellsrenderer: function () {
                         return 'Edit';
                     }, buttonclick: function (row, event) {
                             var grid = $('#' + this.owner.element.id);
                             var rowData = grid.jqxGrid('getrowdata', row);
                        	 loaddata(rowData.Idqouta);
                     }
                     },
                     {
                         text: '', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
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
                                 		 window.location.href = '<?php echo site_url("admin/qouta/hapus");?>/'+rowData.Idqouta;
                                      }
                                 }
                             });
                 
                       }
                     }
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

       function gotoadd() {
    	   window.location.href = '<?php echo site_url("admin/tour/add");?>';
       }
 
    </script>