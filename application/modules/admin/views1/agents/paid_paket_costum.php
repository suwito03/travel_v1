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

                    </div>
   </div>                 
</div>

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
         url: '<?=base_url('admin/json/getdt_byrpaket__costum_umroh_agent'); ?>',
         id: 'idpaid',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(headersource);

     var linkrenderer = function (row, column, value) {
         if (value.indexOf('#') != -1) {
             value = value.substring(0, value.indexOf('#'));
         }
          var href = $('#jqxgrid').jqxGrid('getcellvalue', row, "pathfile");
          return "<div style='padding:10px;'><a href='" + href + "'  target='_blank'>Lihat Bukti Transfer</a></div>";
     }
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
                     // { text: 'Order by Agent', columngroup:'order',columntype: 'textbox', filtertype: 'list',datafield: 'nama',align: 'center',cellsalign: 'left',width: '170'},
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



    </script>