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
            </div>

        </div>                 </div>
<script type="text/javascript">
 $(document).ready(function () {

     var headersource =
     {
         datatype: "json",
         datafields: [
             { name: 'id',type: 'int'},
             { name: 'idagent',type: 'int'},
             { name: 'agent',type: 'string'},
             { name: 'recipient',type: 'string'},
             { name: 'type',type: 'string'},
             { name: 'message',type: 'string'},
             { name: 'status',type: 'string'},
             { name: 'date_time',type: 'date',format: 'dd.MM.yyyy hh:mm:ss' }
         ],
         url: '<?=base_url('admin/json/getdtnotifwa'); ?>',
         id: 'id',
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
                 autorowheight: true,
                 showfilterrow: true,
				 pagesizeoptions: ['8', '16', '24', '50', 'all'],
			     pagesize: 2,
                 sortable: true,
                 columnsresize: true,
                 pageable: true,
                 columns: [
                     { text: 'id', columntype: 'textbox', filtertype: 'input',datafield: 'Idqouta',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Waktu Notifikasi', columntype: 'textbox', filtertype: 'date',datafield: 'date_time',align: 'center',width: '200',cellsformat: 'dd-MMM-yyyy hh:mm:ss',cellsalign: 'center'},
                     { text: 'Nomor',columngroup:'penerima',columntype: 'textbox', filtertype: 'textbox',datafield: 'recipient',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Nama',columngroup:'penerima',columntype: 'textbox', filtertype: 'textbox',datafield: 'agent',align: 'center',cellsalign: 'left',width: '180'},
                     { text: 'Jenis Notifikasi',columntype: 'textbox', filtertype: 'list',datafield: 'type',align: 'center',cellsalign: 'left',width: '250'},
                     { text: 'Pesan Notifikasi',columntype: 'textbox', filtertype: 'input',datafield: 'message',align: 'center',cellsalign: 'left'}
                     //{
                     //    text: '', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                     //    return 'Hapus';
                     //}, buttonclick: function (row, event) {
                     //    var button = $(event.currentTarget);
                     //    var grid = $('#' + this.owner.element.id);
                     //    var rowData = grid.jqxGrid('getrowdata', row);
                     //        bootbox.confirm({
                     //            message: "Apa anda yakin ingin menghapus data ini.!!!?",
                     //            buttons: {
                     //                confirm: {
                     //                    label: 'Ya',
                     //                    className: 'btn-success'
                     //                },
                     //                cancel: {
                     //                    label: 'Tidak',
                     //                    className: 'btn-danger'
                     //                }
                     //            },
                     //            callback: function (result) {
                     //            	 if (result) {
                     //            		 window.location.href = '<?php //echo site_url("admin/notif/hapus");?>///'+rowData.id;
                     //                 }
                     //            }
                     //        });
                     //
                     //  }
                     //}
                 ],
                 columngroups: [
                     { text: 'Penerima', align: 'center', name: 'penerima' }
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