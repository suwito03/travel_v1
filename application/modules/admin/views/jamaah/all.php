<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>

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
            <?php
            if ($lvluser=='agent') { ?>
            <div class="card-footer">
                <button type="button" class="btn btn-primary btn-rounded" onclick="gotoadd()">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
                <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#modalAdd">
                    <i class="fa fa-file-excel-o"></i> Import Data via Excel
                </button>
                <button type="button" class="btn btn-info btn-rounded" >
                    <i class="fa fa-download"></i> Download Template Import Excel
                </button>
            </div>
            <?php } ?>
        </div>
</div>
<script type="text/javascript">
 $(document).ready(function () {

     var headersource =
     {
         datatype: "json",
         datafields: [
             { name: 'idjamaah',type: 'int'},
             { name: 'idagent',type: 'int'},
             { name: 'namaagent',type: 'string'},
             { name: 'jenis',type: 'string'},
             { name: 'nama_badan',type: 'string'},
             { name: 'title',type: 'string'},
             { name: 'nama',type: 'string'},
             { name: 'nama_paspor',type: 'string'},
             { name: 'gender',type: 'string'},
             { name: 'nama_ayah',type: 'string'},
             { name: 'tgl_lahir',type: 'date',format: 'dd.MM.yyyy'},
             { name: 'tempat_lahir',type: 'string'},
             { name: 'umur',type: 'int'},
             { name: 'jenis_identitas',type: 'string'},
             { name: 'nomor_identitas',type: 'string'},
             { name: 'tlp',type: 'string'},
             { name: 'hp',type: 'string'},
             { name: 'alamat',type: 'string'},
             { name: 'nmr_rmh',type: 'string'},
             { name: 'rt_rumah',type: 'string'},
             { name: 'rw_rumah',type: 'string'},
             { name: 'provinsi',type: 'string'},
             { name: 'kabupaten',type: 'string'},
             { name: 'kecamatan',type: 'string'},
             { name: 'kelurahan',type: 'string'},
             { name: 'kode_pos',type: 'string'},
             { name: 'ishaji',type: 'string'},
             { name: 'kodekandepag',type: 'string'},
             { name: 'kode_kecamatan',type: 'string'},
             { name: 'status_jamaah',type: 'string'},
             { name: 'kewarganegaraan',type: 'string'},
             { name: 'status_pendidikan',type: 'string'},
             { name: 'jenis_pendidikan',type: 'string'},
             { name: 'jenis_pekerjaan',type: 'string'},
             { name: 'nama_mahram',type: 'string'},
             { name: 'hubungan_mahram',type: 'string'},
             { name: 'gol_darah',type: 'string'},
             { name: 'status_menikah',type: 'string'},
             { name: 'ukuran_baju',type: 'string'},
             { name: 'ciri2_rambut',type: 'string'},
             { name: 'ciri2_alis',type: 'string'},
             { name: 'ciri2_hidung',type: 'string'},
             { name: 'ciri2_muka',type: 'string'},
             { name: 'tinggi',type: 'int'},
             { name: 'bb',type: 'int'},
             { name: 'path_foto',type: 'string'},
             { name: 'nm_foto',type: 'string'}
         ],
         url: '<?=base_url('admin/json/getdtall_jamaah'); ?>',
         id: 'idjamaah',
         async: false
     };
     var dataAdapterHeader = new $.jqx.dataAdapter(headersource);
     var imagerenderer = function (row, datafield, value) {
         return '<img style="margin-left: 5px;" height="50" width="45" src="' + value + '"/>';
     }
    //grid master
     $("#jqxgrid").jqxGrid(
             {
                 source: dataAdapterHeader,
                 theme: 'material',
                 width: '99.9%',
                 autoheight: true,
                 autorowheight: true,
                 filterable: true,
                 adaptive: true,
                 showfilterrow: true,
				 pagesizeoptions: ['10', '20', '50', '100'],
			     pagesize: 5,
                 sortable: true,
                 columnsresize: true,
                 pageable: true,
                 columns: [
                     { text: 'id', columntype: 'textbox', filtertype: 'input',datafield: 'idjamaah',hidden: true },
                     {
                         text: 'No', sortable: false, filterable: false, editable: false,
                         groupable: false, draggable: false, resizable: false,
                         datafield: '', columntype: 'number', width: 77,cellsalign: 'center',align: 'center',
                         cellsrenderer: function (row, column, value) {
                             return "<div class='text-center' style='margin-top:10px;'>" + (value + 1) + "</div>";
                         }
                     },
                     { text: 'Nama Agent',columngroup:'provider',columntype: 'textbox', filtertype: 'textbox',datafield: 'namaagent',align: 'center',cellsalign: 'left',width: '190'},
                     { text: 'Jenis Agent',columngroup:'provider',columntype: 'textbox', filtertype: 'list',datafield: 'jenis',align: 'center',cellsalign: 'left',width: '120'},
                     { text: 'Nama Badan',columngroup:'provider',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama_badan',align: 'center',cellsalign: 'left',width: '190'},
                     { text: 'Foto', datafield: 'path_foto', width: 55, cellsrenderer: imagerenderer,align: 'center',cellsalign: 'center' },
                     { text: 'Nama KTP',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama_paspor',align: 'center',cellsalign: 'left',width: '190'},
                     { text: 'Nama Lengkap',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama',align: 'center',cellsalign: 'left',width: '230'},
                     { text: 'Nama Ayah',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama_ayah',align: 'center',cellsalign: 'left',width: '180'},
                     { text: 'Tempat Lahir',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'tempat_lahir',align: 'center',cellsalign: 'left',width: '150'},
                     { text: 'Tanggal Lahir',columngroup:'biodata', columntype: 'textbox', filtertype: 'date',datafield: 'tgl_lahir',align: 'center',width: '120',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                     { text: 'Umur',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'umur',align: 'center',cellsalign: 'center',width: '70'},
                     { text: 'Jenis Kelamin',columngroup:'biodata',columntype: 'textbox', filtertype: 'list',datafield: 'gender',align: 'center',cellsalign: 'center',width: '115'},
                     { text: 'Gol Darah',columngroup:'biodata',columntype: 'textbox', filtertype: 'list',datafield: 'gol_darah',align: 'center',cellsalign: 'center',width: '95'},
                     { text: 'Jenis Identitas',columngroup:'biodata',columntype: 'textbox', filtertype: 'list',datafield: 'jenis_identitas',align: 'center',cellsalign: 'left',width: '125'},
                     { text: 'Nomor Identitas',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'nomor_identitas',align: 'center',cellsalign: 'left',width: '135'},
                     { text: 'Kewarganegaraan',columngroup:'biodata',columntype: 'textbox', filtertype: 'list',datafield: 'kewarganegaraan',align: 'center',cellsalign: 'left',width: '140'},
                     { text: 'Nomor Telepon',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'tlp',align: 'center',cellsalign: 'center',width: '135'},
                     { text: 'Nomor HP',columngroup:'biodata',columntype: 'textbox', filtertype: 'textbox',datafield: 'hp',align: 'center',cellsalign: 'center',width: '135'},
                     { text: 'Alamat Rumah',columngroup:'alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'alamat',align: 'center',cellsalign: 'left',width: '200'},
                     { text: 'Nomor Rumah',columngroup:'alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'nmr_rmh',align: 'center',cellsalign: 'center',width: '100'},
                     { text: 'RT',columngroup:'alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'rt_rumah',align: 'center',cellsalign: 'center',width: '60'},
                     { text: 'RW',columngroup:'alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'rw_rumah',align: 'center',cellsalign: 'center',width: '60'},
                     { text: 'Provinsi',columngroup:'alamat',columntype: 'textbox', filtertype: 'list',datafield: 'provinsi',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Kabupaten / Kota',columngroup:'alamat',columntype: 'textbox', filtertype: 'list',datafield: 'kabupaten',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Kecamatan',columngroup:'alamat',columntype: 'textbox', filtertype: 'list',datafield: 'kecamatan',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Kelurahan / Desa',columngroup:'alamat',columntype: 'textbox', filtertype: 'list',datafield: 'kelurahan',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Kode Pos',columngroup:'alamat',columntype: 'textbox', filtertype: 'textbox',datafield: 'kode_pos',align: 'center',cellsalign: 'center',width: '110'},
                     { text: 'Pendidikan',columngroup:'status',columntype: 'textbox', filtertype: 'list',datafield: 'status_pendidikan',align: 'center',cellsalign: 'center',width: '140'},
                     { text: 'Pekerjaan',columngroup:'status',columntype: 'textbox', filtertype: 'list',datafield: 'jenis_pekerjaan',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Perkawinan',columngroup:'status',columntype: 'textbox', filtertype: 'list',datafield: 'status_menikah',align: 'center',cellsalign: 'center',width: '140'},
                     { text: 'Nama Mahram',columngroup:'mahram',columntype: 'textbox', filtertype: 'textbox',datafield: 'nama_mahram',align: 'center',cellsalign: 'center',width: '200'},
                     { text: 'Hubungan',columngroup:'mahram',columntype: 'textbox', filtertype: 'list',datafield: 'hubungan_mahram',align: 'center',cellsalign: 'center',width: '160'},
                     { text: 'Ukuran Baju',columngroup:'fisik',columntype: 'textbox', filtertype: 'list',datafield: 'ukuran_baju',align: 'center',cellsalign: 'center',width: '140'},
                     { text: 'Tinggi Badan',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'tinggi',align: 'center',cellsalign: 'center',width: '145'},
                     { text: 'Berat Badan',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'bb',align: 'center',cellsalign: 'center',width: '145'},
                     { text: 'Ciri-ciri Rambut',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'ciri2_rambut',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Ciri-ciri Alis',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'ciri2_alis',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Ciri-ciri Hidung',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'ciri2_hidung',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Ciri-ciri Muka',columngroup:'fisik',columntype: 'textbox', filtertype: 'textbox',datafield: 'ciri2_muka',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Status Jamaah',columngroup:'info',columntype: 'textbox', filtertype: 'list',datafield: 'status_jamaah',align: 'center',cellsalign: 'left',width: '155'},
                     { text: 'Pergi Haji',columngroup:'info',columntype: 'textbox', filtertype: 'textbox',datafield: 'ishaji',align: 'center',cellsalign: 'left',width: '145'},
                     { text: 'Kode Kandepag',columngroup:'info',columntype: 'textbox', filtertype: 'textbox',datafield: 'kodekandepag',align: 'center',cellsalign: 'left',width: '155'},
                     { text: 'Kec Kandepag',columngroup:'info',columntype: 'textbox', filtertype: 'textbox',datafield: 'kode_kecamatan',align: 'center',cellsalign: 'left',width: '155'},
                     {
                         text: 'Action', filtertype: 'none', width: 65, cellsalign: 'center',align: 'center',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                         return 'Hapus';
                     }, buttonclick: function (row, event) {
                         var button = $(event.currentTarget);
                         var grid = $('#' + this.owner.element.id);
                         var rowData = grid.jqxGrid('getrowdata', row);
                             bootbox.confirm({
                                 message: "Apa anda yakin ingin menghapus data ini.!!!?\n Aksi ini tidak dapat dikembalikan.!?",
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
                                 		 window.location.href = '<?php echo site_url("admin/jamaah/hapus_jamaah");?>/'+rowData.idjamaah;
                                      }
                                 }
                             });

                       }
                     }
                 ],
                 columngroups: [
                     { text: 'Provider Jamaah', align: 'center', name: 'provider' },
                     { text: 'Biodata', align: 'center', name: 'biodata' },
                     { text: 'Alamat Tempat Tinggal', align: 'center', name: 'alamat' },
                     { text: 'Penampilan Fisik', align: 'center', name: 'fisik' },
                     { text: 'Status', align: 'center', name: 'status' },
                     { text: 'Pendamping', align: 'center', name: 'mahram' },
                     { text: 'Informasi Lain', align: 'center', name: 'info' }
                 ]
             }
         );

 });

       function gotoadd() {
    	   window.location.href = '<?php echo site_url("admin/jamaah/add");?>';
       }

    </script>