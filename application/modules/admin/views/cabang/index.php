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


<script type="text/javascript">
 $(document).ready(function () {

	 var localizationobj = {};
     localizationobj.currencysymbol = "Rp. ";
     localizationobj.decimalseparator = ".";
     localizationobj.thousandsseparator = ",";
     var source =
     {
         datatype: "json",
         datafields: [
             { name: 'id_cabang',type: 'int'},
             { name: 'nama',type: 'string'},
             { name: 'telepon',type: 'string'},
             { name: 'email',type: 'string'},
             { name: 'alamat',type: 'string'},
             { name: 'pic',type: 'string'},
             { name: 'pic_hp',type: 'string'},
             { name: 'id_provinsi',type: 'int'},
             { name: 'id_kabupaten',type: 'int'},
             { name: 'id_kecamatan',type: 'int'},
             { name: 'id_kelurahan',type: 'int'}

         ],
         url: '<?=base_url('admin/json/getdatalokasi'); ?>',
         id: 'id_cabang',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(source);
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
                     { text: 'id_cabang', columntype: 'textbox', filtertype: 'input',datafield: 'id_cabang',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Nama',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama',align: 'center',cellsalign: 'left'},
                     { text: 'Telepon',columntype: 'textbox', filtertype: 'textbox',datafield: 'telepon',align: 'center',cellsalign: 'left',width: '155'},
                     { text: 'Email',columntype: 'textbox', filtertype: 'textbox',datafield: 'email',align: 'center',cellsalign: 'left',width: '150'},
                     { text: 'PIC',columntype: 'textbox', filtertype: 'textbox',datafield: 'pic',align: 'center',cellsalign: 'right',width: '180'},
                     { text: 'PIC Mobile',columntype: 'textbox', filtertype: 'textbox',datafield: 'pic_hp',align: 'center',cellsalign: 'left',width: '110'},
                     { text: 'Alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'alamat',align: 'center',cellsalign: 'left'},
                     {
                         text: '', columngroup:'action', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info fa fa-plus-circle', cellsrenderer: function () {
                             return 'Edit';
                         }, buttonclick: function (row, event) {
                                 var grid = $('#' + this.owner.element.id);
                                 var rowData = grid.jqxGrid('getrowdata', row);
                                 window.location.href = '<?php echo site_url("admin/cabang/edit");?>/'+rowData.id_cabang;
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
                                 		 window.location.href = '<?php echo site_url("admin/cabang/delete");?>/'+rowData.id_cabang;
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
                url: '<?=base_url('admin/json/getloaddtlokasi'); ?>/'+$id,
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
    	   window.location.href = '<?php echo site_url("admin/cabang/add");?>';
 }

 
</script>