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
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1em 1em 1em !important;
    margin: 0 0 0.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
    margin-top: 3px !important;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width: auto;
    padding: 0 5px;
    border-bottom: none;
    margin-top: -5px;
    background-color: white;
    color: black;
}
.control-label {
    margin-top:11px;
}
legend{
    margin-bottom:3px;
}
</style>
<div class="row">
    <form method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/jamaah/save')?>" >
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Pendaftaran Jamaah</h3>
                <?php
                if ($lvluser=='agent') { ?>
                    <button type="button" class="btn btn-default pull-right" onclick="gotoback()">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin-right: 10px;">Save</button>
                <?php } ?>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-horizontal">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Biodata</legend>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Pas Foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="filefoto" name="filefoto" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Nama KTP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtnamaktp" name="txtnamaktp" required>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txtnama" name="txtnama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama Ayah Kandung</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txtnmayah" name="txtnmayah" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txttempatlahir" name="txttempatlahir" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Tanggal Lahir</label>
                                <div class="col-sm-3">
                                    <input type="text"  class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-3">
                                    <select  id="cmbgender" name="cmbgender" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Golongan Darah</label>
                                <div class="col-sm-3">
                                    <select  id="cmbgol_darah" name="cmbgol_darah" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Jenis Identitas</label>
                                <div class="col-sm-3">
                                    <select  id="cmbidentitas" name="cmbidentitas" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="KTP">KTP</option>
                                        <option value="SIM">SIM</option>
                                        <option value="PASPORT">Pasport</option>
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Nomor</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control" id="txtnmridentitas" name="txtnmridentitas" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nomor Telepon</label>
                                <div class="col-sm-3">
                                    <input type="text"  class="form-control" id="txtnmrtlp" name="txtnmrtlp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="15">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">HP</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control" id="txtnmrhp" name="txtnmrhp" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kewarganegaraan</label>
                                <div class="col-sm-3">
                                    <select  id="cmbnegara" name="cmbnegara" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Asing">Asing</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Penampilan Fisik</legend>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ukuran Baju</label>
                                <div class="col-sm-3">
                                    <select  id="cmbukuran_baju" name="cmbukuran_baju" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tinggi Badan</label>
                                <div class="col-sm-2">
                                    <input type="text"  class="form-control" id="txttb" name="txttb" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="3">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">CM</label>
                                <label for="inputEmail3" class="col-sm-3 control-label">Berat Badan</label>
                                <div class="col-sm-2">
                                    <input type="text"  class="form-control" id="txtbb" name="txtbb" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="3">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">KG</label>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ciri2 Rambut</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="txtcr2_rambut" name="txtcr2_rambut">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ciri2 Alis</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="txtcr2_alis" name="txtcr2_alis">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ciri2 Hidung</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="txtcr2_hidung" name="txtcr2_hidung">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ciri2 Muka</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="txtcr2_muka" name="txtcr2_muka">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-horizontal">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Alamat Tempat Tinggal</legend>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Alamat Rumah</label>
                                <div class="col-sm-9">
                                    <textarea cols="3" rows="3" class="form-control" id="txtalamat" name="txtalamat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nomor Rumah</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="txtnmrrumah" name="txtnmrrumah" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">RT</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="txtrt" name="txtrt">
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">RW</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="txtrw" name="txtrw">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <div id='jqxcmbprovinsi'> </div>
                                    <input type="hidden" class="form-control" id="txtprov" name="txtprov">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <div id='jqxcmbkabupaten'> </div>
                                    <input type="hidden" class="form-control" id="txtkab" name="txtkab">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <div id='jqxcmbkecamatan'> </div>
                                    <input type="hidden" class="form-control" id="txtkec" name="txtkec">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kelurahan/Desa</label>
                                    <div class="col-sm-9">
                                        <div id='jqxcmbkelurahan'> </div>
                                        <input type="hidden" class="form-control" id="txtkel" name="txtkel">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kode Pos</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txtkdpos" name="txtkdpos">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Status</legend>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select  id="cmbpendidikan" name="cmbpendidikan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1/D2/D3/SM">D1/D2/D3/SM</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <select  id="cmbpekerjaan" name="cmbpekerjaan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="PNS">PNS</option>
                                        <option value="TNI/POLRI">TNI/POLRI</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Petani/Nelayan">Petani/Nelayan</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="BUMN/BUMD">BUMN/BUMD</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Perkawinan</label>
                                <div class="col-sm-9">
                                    <select  id="cmbstatus_nikah" name="cmbstatus_nikah" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Janda/Duda">Janda/Duda</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Pendamping</legend>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" id="txtnm_mahram" name="txtnm_mahram">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Hubungan</label>
                                <div class="col-sm-9">
                                    <select  id="cmbhub_mahram" name="cmbhub_mahram" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Orang Tua">Orang Tua</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Suami/Istri">Suami/Istri</option>
                                        <option value="Mertua">Mertua</option>
                                        <option value="Saudara Kandung">Saudara Kandung</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Informasi Lain</legend>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Status Jamaah</label>
                                <div class="col-sm-9">
                                    <select  id="cmbstatus_jamaah" name="cmbstatus_jamaah" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Reguler">Reguler</option>
                                        <option value="Khusus">Khusus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Pergi Haji</label>
                                <div class="col-sm-9">
                                    <select  id="cmbishaji" name="cmbishaji" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Belum">Belum</option>
                                        <option value="Pernah">Pernah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kode Kandepag</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control" id="txtkode_kandepag" name="txtkode_kandepag">
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-2">
                                    <input type="text"  class="form-control" id="txtkode_kec" name="txtkode_kec">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
</div>

<script type="text/javascript">
 $(document).ready(function () {

      //date birth
     $('#tgl_lahir').datepicker({
         format: "yyyy-mm-dd",
         todayBtn: true,
         autoclose: true,
         todayHighlight: true
     }).on('changeDate', function(e){
         $(this).datepicker('hide');
     });


     //cmb provinsi
     var srcprov=
         {
             datatype: "json",
             datafields: [
                 { name: 'id',type: 'int'},
                 { name: 'name',type: 'string'}
             ],
             url: '<?=base_url('admin/json/getdt_provinsi'); ?>',
             id: 'id',
             async: false
         };
     var dtAdapterProv= new $.jqx.dataAdapter(srcprov);
     $("#jqxcmbprovinsi").jqxComboBox({source: dtAdapterProv, autoComplete: 'checked', searchMode: 'containsignorecase', width: 330, height: 30,theme: 'material',displayMember: "name", valueMember: "id"});
     //get selected item
     $("#jqxcmbprovinsi").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtprov").val(item.label);
             }
         }
     });
     //cmb kabupaten
     var srckab=
         {
             datatype: "json",
             datafields: [
                 { name: 'id',type: 'int'},
                 { name: 'name',type: 'string'},
                 { name: 'province_id',type: 'int'}
             ],
             url: '<?=base_url('admin/json/getdt_kabupaten'); ?>',
             id: 'id',
             async: false
         };
     var dtAdapterKab= new $.jqx.dataAdapter(srckab);
     $("#jqxcmbkabupaten").jqxComboBox({source: dtAdapterKab, disabled: true,autoComplete: 'checked', searchMode: 'containsignorecase', width: 330, height: 30,theme: 'material',displayMember: "name", valueMember: "id"});
     //get selected item
     $("#jqxcmbkabupaten").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtkab").val(item.label);
             }
         }
     });
     //binding prov into kabupaten
     $("#jqxcmbprovinsi").bind('select', function(event)
     {
         if (event.args)
         {
             $("#jqxcmbkabupaten").jqxComboBox({ disabled: false, selectedIndex: -1});
             var value = event.args.item.value;
             srckab.data = {province_id: value};
             KabAdapter = new $.jqx.dataAdapter(srckab, {
                 beforeLoadComplete: function (records) {
                     var filteredRecords = new Array();
                     for (var i = 0; i < records.length; i++) {
                         if (records[i].province_id == value)
                             filteredRecords.push(records[i]);
                     }
                     return filteredRecords;
                 }
             });
             $("#jqxcmbkabupaten").jqxComboBox({ source: KabAdapter, autoDropDownHeight: KabAdapter.records.length > 10 ? false : true});
         }
     });
     //cmb kecamatan
     var srckec=
         {
             datatype: "json",
             datafields: [
                 { name: 'id',type: 'int'},
                 { name: 'name',type: 'string'},
                 { name: 'regency_id',type: 'int'}
             ],
             url: '<?=base_url('admin/json/getdt_kecamatan'); ?>',
             id: 'id',
             async: false
         };
     var dtAdapterKec= new $.jqx.dataAdapter(srckec);
     $("#jqxcmbkecamatan").jqxComboBox({source: dtAdapterKec, disabled: true,autoComplete: 'checked', searchMode: 'containsignorecase', width: 330, height: 30,theme: 'material',displayMember: "name", valueMember: "id"});
     //get selected item
     $("#jqxcmbkecamatan").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtkec").val(item.label);
             }
         }
     });
    //binding kabupaten into kecamatan
     $("#jqxcmbkabupaten").bind('select', function(event)
     {
         if (event.args)
         {
             $("#jqxcmbkecamatan").jqxComboBox({ disabled: false, selectedIndex: -1});
             var value = event.args.item.value;
             srckec.data = {regency_id: value};
             KecAdapter = new $.jqx.dataAdapter(srckec, {
                 beforeLoadComplete: function (records) {
                     var filteredRecords = new Array();
                     for (var i = 0; i < records.length; i++) {
                         if (records[i].regency_id == value)
                             filteredRecords.push(records[i]);
                     }
                     return filteredRecords;
                 }
             });
             $("#jqxcmbkecamatan").jqxComboBox({ source: KecAdapter, autoDropDownHeight: KabAdapter.records.length > 10 ? false : true});
         }
     });
    //cmb kelurahan
     var srckel=
         {
             datatype: "json",
             datafields: [
                 { name: 'id',type: 'int'},
                 { name: 'name',type: 'string'},
                 { name: 'district_id',type: 'int'}
             ],
             url: '<?=base_url('admin/json/getdt_kelurahan'); ?>',
             id: 'id',
             async: false
         };
     var dtAdapterKel= new $.jqx.dataAdapter(srckel);
     $("#jqxcmbkelurahan").jqxComboBox({source: dtAdapterKel, disabled: true,autoComplete: 'checked', searchMode: 'containsignorecase', width: 330, height: 30,theme: 'material',displayMember: "name", valueMember: "id"});
     //get selected item
     $("#jqxcmbkelurahan").on('select', function (event) {
         var selectedItems = "";
         if (event.args) {
             var item = event.args.item;
             if (item) {
                 $("#txtkel").val(item.label);
             }
         }
     });
     //binding kecamatan into kelurahan
     $("#jqxcmbkecamatan").bind('select', function(event)
     {
         if (event.args)
         {
             $("#jqxcmbkelurahan").jqxComboBox({ disabled: false, selectedIndex: -1});
             var value = event.args.item.value;
             srckel.data = {district_id: value};
             KelAdapter = new $.jqx.dataAdapter(srckel, {
                 beforeLoadComplete: function (records) {
                     var filteredRecords = new Array();
                     for (var i = 0; i < records.length; i++) {
                         if (records[i].district_id == value)
                             filteredRecords.push(records[i]);
                     }
                     return filteredRecords;
                 }
             });
             $("#jqxcmbkelurahan").jqxComboBox({ source: KelAdapter, autoDropDownHeight: KabAdapter.records.length > 10 ? false : true});
         }
     });

 });

function gotoback() {
    window.location.href = '<?php echo site_url("admin/jamaah");?>';
}

    </script>