<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
<style>
    .content {
        padding: 5px;
    }
    .container-fluid {
        padding-left:5px;
        padding-right: 5px;
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
<div class="container-fluid">
    <form id='frmaddlokasi' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/cabang/save')?>" onsubmit="return validateForm()">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Cabang</div>
                <div class="panel-body">
                <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Cabang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtnama" name="txtnama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">PIC</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtpic" name="txtpic" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">PIC Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtpichp" name="txtpichp" required>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txttlp" name="txttlp" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txtemail" name="txtemail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="txtalamat" name="txtalamat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Provinsi</label>
                                <div class="col-sm-4">
                                    <div id='jqxcmbprovinsi'> </div>
                                    <input type="text" class="form-control" id="txtprov" name="txtprov">
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" id="btnreset" onclick="resetpage()" class="btn btn-info col-sm-3" style="margin-left: -45px;">Reset</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kabupaten / Kota</label>
                                <div class="col-sm-9">
                                    <div id='jqxcmbkabupaten'> </div>
                                    <input type="text" class="form-control" id="txtkab" name="txtkab">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <div id='jqxcmbkecamatan'> </div>
                                    <input type="text" class="form-control" id="txtkec" name="txtkec">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kelurahan / Desa</label>
                                    <div class="col-sm-9">
                                        <div id='jqxcmbkelurahan'> </div>
                                        <input type="text" class="form-control" id="txtkel" name="txtkel">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-3"></div>
                                <div class="col-sm-4">
                                         <button type="submit" class="btn btn-primary col-sm-3" style="margin-right: 5px;">Save</button>
                                         <button type="cancel" class="btn btn-dark col-sm-3" onclick="canceladd()">Cancel</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
</div><!-- /.container-fluid -->

<script type="text/javascript">
    //public variabel
    var user='<?php echo $userlogin;?>';

$(document).ready(function() {

        
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
                 $("#txtprov").val(item.value);
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
                 $("#txtkab").val(item.value);
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
                 $("#txtkec").val(item.value);
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
                 $("#txtkel").val(item.value);
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


function canceladd() {
    window.location.href = '<?php echo site_url("admin/cabang/");?>';
}

function resetpage () {
    window.location.reload();
}


function validateForm() {
    var nama = $('#txtnama').val();
    var pic = $('#txtpic').val();
    var pichp = $('#txtpichp').val();
    var tlp = $('#txttlp').val();
    var alamat = $('#txtalamat').val();


    if (nama == null ||nama == "") {
        bootbox.alert("Nama Kantor Cabang !!! <br>Harus dilengkapi");
        $( "#txtnama").focus();
        return false;
    }
    if (pic == null ||pic == "") {
        bootbox.alert("Nama PIC Cabang !!! <br>Harus dilengkapi");
        $( "#txthrg").focus();
        return false;
    }
    if (pichp == null ||pichp == "") {
        bootbox.alert("Nomor Telepon PIC Cabang !!! <br>Harus dilengkapi");
        return false;
    }
    if (tlp == null ||tlp == "") {
        bootbox.alert("Nomor Telepon Kantor Cabang !!! <br>Harus dilengkapi");
        return false;
    }
    if (alamat == null || alamat == "") {
        bootbox.alert("Alamat Kantor Cabang !!! <br>Harus dilengkapi");
        return false;
    }
}
</script>
