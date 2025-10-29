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
    <form id='frmcostum' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/agents/save_editcostum')?>" onsubmit="return validateForm()">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Kostum Paket Umroh Tanggal Keberangkatan : <b><?php echo $tglbooking;?></b></div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="exampleInputName2" class="col-sm-2 control-label">Basis Paket Umroh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="txtnamabasis" name="txtnamabasis" value="<?php echo $edit[0]['basispackage'];?>" disabled>
                                <input type="hidden" class="form-control" id="tglbook" name="tglbook" value="<?php echo $tglbook;?>" >
                                <input type="hidden" class="form-control" id="txtnama" name="txtnama" value="<?php echo $edit[0]['costumpackage'];?>" >
                                <input type="hidden" class="form-control" id="txtcodepaket" name="txtcodepaket" value="<?php echo $kodepaket_costum;?>">
                                <input type="hidden" class="form-control" id="txtidpaket" name="txtidpaket" value="<?php echo $idpaket_costum;?>">
                            </div>
                            <label for="exampleInputName2" class="col-sm-2 control-label">Total Hari Umroh</label>
                            <div class="col-sm-2">
                                <select  id="cmbtotalday" name="cmbtotalday" class="form-control">
                                        <option value="9">9 Hari</option>
                                        <option value="12">12 Hari</option>
                                        <option value="15">15 Hari</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2" class="col-sm-2 control-label">Jumlah Jemaah</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control money" id="txtjmlh" name="txtjmlh" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="<?php echo $edit[0]['jumlah_jemaah'];?>">
                            </div>
                            <button type="submit" class="btn btn-primary col-sm-1" style="margin-right: 5px;">Update</button>
                            <button type="cancel" class="btn btn-dark col-sm-1" onclick="canceladd()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Itenary</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Airlines</label>
                            <div class="col-sm-8">
                                <div id='jqxcmbairlines'> </div>
                                <input type="hidden" class="form-control" id="txtpilairlines" name="txtpilairlines">
                                <input type="hidden" class="form-control" id="txtidairlines" name="txtidairlines">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Bus</label>
                                <div class="col-sm-8">
                                    <div id='jqxcmbbus'> </div>
                                    <input type="hidden" class="form-control" id="txtpilbus" name="txtpilbus">
                                    <input type="hidden" class="form-control" id="txtidbus" name="txtidbus">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Asuransi</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="chkasuransi" name="chkasuransi">
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail2" class="col-sm-4 control-label" >Catatan</label>
                            <div class="col-sm-7">
                                <textarea cols="5" rows="9" class="form-control" id="txtcatatan" name="txtcatatan"><?php echo $edit[0]['remarks'];?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">Accommodation</div>
                      <div class="panel-body">
                          <fieldset class="scheduler-border">
                              <legend class="scheduler-border">Makkah</legend>
                              <div class="form-horizontal">
                                  <div class="form-group">
                                      <label for="exampleInputName2" class="col-sm-2 control-label">Hotel</label>
                                      <div class="col-sm-6">
                                          <div id='jqxcmbhotelmekkah'> </div>
                                          <input type="hidden" class="form-control" id="txtpilhotelmakkah" name="txtpilhotelmakkah">
                                          <input type="hidden" class="form-control" id="txtidmekkah" name="txtidmekkah">
                                      </div>
                                      <label for="exampleInputEmail2" class="col-sm-2 control-label">Hari</label>
                                      <div class="col-sm-2">
                                          <input type="number" min="1" max="9"  class="form-control" id="txtdaymekkah"  name="txtdaymekkah" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                      </div>
                                  </div>
                              </div>
                          </fieldset>
                          <fieldset class="scheduler-border">
                              <legend class="scheduler-border">Madinah</legend>
                              <div class="form-horizontal">
                                  <div class="form-group">
                                      <label for="exampleInputName2" class="col-sm-2 control-label">Hotel</label>
                                      <div class="col-sm-6">
                                          <div id='jqxcmbhotelmadinah'></div>
                                          <input type="hidden" class="form-control" id="txtpilhotelmadinah" name="txtpilhotelmadinah">
                                          <input type="hidden" class="form-control" id="txtidmadinah" name="txtidmadinah">
                                      </div>
                                      <label for="exampleInputEmail2" class="col-sm-2 control-label">Hari</label>
                                      <div class="col-sm-2">
                                          <input type="number" min="1" max="9"  class="form-control" id="txtdaymadinah"  name="txtdaymadinah" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                      </div>
                                  </div>
                              </div>
                          </fieldset>
                          <fieldset class="scheduler-border">
                              <legend class="scheduler-border">Turki</legend>
                              <div class="form-horizontal">
                                  <div class="form-group">
                                      <label for="exampleInputName2" class="col-sm-2 control-label">Hotel</label>
                                      <div class="col-sm-6">
                                          <div id='jqxcmbhotelturki'></div>
                                          <input type="hidden" class="form-control" id="txtpilhotelturki" name="txtpilhotelturki">
                                          <input type="hidden" class="form-control" id="txtidturki" name="txtidturki">
                                      </div>
                                      <label for="exampleInputEmail2" class="col-sm-2 control-label">Hari</label>
                                      <div class="col-sm-2">
                                          <input type="number" min="1" max="9"  class="form-control" id="txtdayturki"  name="txtdayturki" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                      </div>
                                  </div>
                              </div>
                          </fieldset>
                      </div>
                  </div>
            </div>
    </div>
    </form>
    <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Item Free
                        <div class="pull-right">
                            <button class="btn btn-xs btn-info"  data-toggle="modal" data-target="#modalAddItemFree"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="jqxgriditemfree"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Item Include
                        <div class="pull-right">
                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalAddItemInclude"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="jqxgriditeminclude"></div>
                    </div>
                </div>
            </div>
        </div>

</div><!-- /.container-fluid -->

<!-- Begin Modal Add Item Free-->
<div class="modal fade" id="modalAddItemFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Item Free</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id='frmaddfree' method='post' accept-charset='utf-8' enctype='multipart/form-data'>
                    <div class="form-group row">
                        <label for="tgl" class="col-sm-3 col-form-label">Item Free</label>
                        <div style="margin-left: 15px;" id='jqxcmbitemfree' class="col-sm-7">
                        </div>
                        <input type="hidden" class="form-control" id="txtpilitemfree" name="txtpilitemfree" >
                        <input type="hidden" class="form-control" id="txtkodepaketfree" name="txtkodepaketfree" value="<?php echo $kodepaket_costum;?>">
                        <input type="hidden" class="form-control" id="txtidpaketfree" name="txtidpaketfree"  value="<?php echo $idpaket_costum;?>">

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
<!-- End Modal Add Item Free-->

<!-- Begin Modal Add Item Include-->
<div class="modal fade" id="modalAddItemInclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Item Include</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='frmaddinclude' method='post' accept-charset='utf-8' enctype='multipart/form-data'>
                    <div class="form-group row">
                        <label for="tgl" class="col-sm-3 col-form-label">Item Include</label>
                        <div style="margin-left: 15px;" id='jqxcmbiteminclude' class="col-sm-9">
                        </div>
                        <input type="hidden" class="form-control" id="txtpiliteminclude" name="txtpiliteminclude" >
                        <input type="hidden" class="form-control" id="txtkodepaketinclude" name="txtkodepaketinclude" value="<?php echo $kodepaket_costum;?>">
                        <input type="hidden" class="form-control" id="txtidpaketinclude" name="txtidpaketinclude"  value="<?php echo $idpaket_costum;?>">
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
<!-- End Modal Add Item Include-->

<script type="text/javascript">
    //public variabel
    var user='<?php echo $userlogin;?>';
    var kodepaket ="<?=$kodepaket_costum?>";
    var idpaket = "<?=$idpaket_costum?>";

$(document).ready(function() {

        //item airlines
         var srcairlines =
        {
            datatype: "json",
            datafields: [
                { name: 'idairlines',type: 'int'},
                { name: 'Name',type: 'string'},
                { name: 'group',type: 'string'}
            ],
            url: '<?=base_url('admin/json/getdtairlines'); ?>',
            id: 'idairlines',
            async: false
        };
         var dtAdapterAirlines = new $.jqx.dataAdapter(srcairlines);
         $("#jqxcmbairlines").jqxComboBox({source: dtAdapterAirlines, autoComplete: 'checked', searchMode: 'containsignorecase', width: 300, height: 30,theme: 'material',displayMember: "Name", valueMember: "idairlines"});
         //get selected item
        $("#jqxcmbairlines").on('select', function (event) {
            var selectedItems = "";
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    $("#txtpilairlines").val(item.value);
                }
            }
        });

       //item bus
        var srcbus =
            {
                datatype: "json",
                datafields: [
                    { name: 'idbus',type: 'int'},
                    { name: 'brand',type: 'string'},
                    { name: 'group',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdtbus'); ?>',
                id: 'idbus',
                async: false
            };
        var dtAdapterBus = new $.jqx.dataAdapter(srcbus);
        $("#jqxcmbbus").jqxComboBox({source: dtAdapterBus, autoComplete: 'checked', searchMode: 'containsignorecase', width: 300, height: 30,theme: 'material',displayMember: "brand", valueMember: "idbus"});
        //get selected item
        $("#jqxcmbbus").on('select', function (event) {
            var selectedItems = "";
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    $("#txtpilbus").val(item.value);
                }
            }
        });

        //item hotel mekkah
         var srchotelmekkah =
            {
                datatype: "json",
                datafields: [
                    { name: 'idhotel',type: 'int'},
                    { name: 'Name',type: 'string'},
                    { name: 'group',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdthotelmekkah'); ?>',
                id: 'idhotel',
                async: false
            };
          var dtAdapterHotelMekkah = new $.jqx.dataAdapter(srchotelmekkah);
          $("#jqxcmbhotelmekkah").jqxComboBox({source: dtAdapterHotelMekkah, autoComplete: 'checked', searchMode: 'containsignorecase', width: 250, height: 30,theme: 'material',displayMember: "Name", valueMember: "idhotel",});
        //get selected item
        $("#jqxcmbhotelmekkah").on('select', function (event) {
            var selectedItems = "";
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    $("#txtpilhotelmakkah").val(item.value);
                }
            }
        });

         //item hotel madinah
         var srchotelmadinah =
            {
                datatype: "json",
                datafields: [
                    { name: 'idhotel',type: 'int'},
                    { name: 'Name',type: 'string'},
                    { name: 'group',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdthotelmadinah'); ?>',
                id: 'idhotel',
                async: false
            };
          var dtAdapterHotelMadinah = new $.jqx.dataAdapter(srchotelmadinah);
           $("#jqxcmbhotelmadinah").jqxComboBox({source: dtAdapterHotelMadinah, autoComplete: 'checked', searchMode: 'containsignorecase', width: 250, height: 30,theme: 'material',displayMember: "Name", valueMember: "idhotel",});
            //get selected item
            $("#jqxcmbhotelmadinah").on('select', function (event) {
                var selectedItems = "";
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        $("#txtpilhotelmadinah").val(item.value);
                    }
                }
            });

            //item hotel turki
            var srchotelturki =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'idhotel',type: 'int'},
                        { name: 'Name',type: 'string'},
                        { name: 'group',type: 'string'}
                    ],
                    url: '<?=base_url('admin/json/getdthotelturki'); ?>',
                    id: 'idhotel',
                    async: false
                };
            var dtAdapterHotelTurki = new $.jqx.dataAdapter(srchotelturki);
            $("#jqxcmbhotelturki").jqxComboBox({source: dtAdapterHotelTurki, autoComplete: 'checked', searchMode: 'containsignorecase', width: 250, height: 30,theme: 'material',displayMember: "Name", valueMember: "idhotel",});
            //get selected item
            $("#jqxcmbhotelturki").on('select', function (event) {
                var selectedItems = "";
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        $("#txtpilhotelturki").val(item.value);
                    }
                }
            });

           //Set Grid Free Item
           var sourcefree =
            {
                datatype: "json",
                datafields: [
                    { name: 'idfree',type: 'int'},
                    { name: 'nama',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdtitemfree/'); ?>',
                id: 'idfree',
                pagesize: 5,
                async: false
            };
            var dtAdapteritemfree= new $.jqx.dataAdapter(sourcefree);
            $("#jqxcmbitemfree").jqxComboBox({source: dtAdapteritemfree, checkboxes: true,autoComplete: 'checked', searchMode: 'containsignorecase', multiSelect: true,width: 500, height: 35,theme: 'bootstrap',displayMember: "nama", valueMember: "idfree"});
            //get seletect multiple item
            $("#jqxcmbitemfree").on('checkChange', function (event) {
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        var items = $("#jqxcmbitemfree").jqxComboBox('getCheckedItems');
                        var checkedItems = "";
                        $.each(items, function (index) {
                            checkedItems += this.value;
                            if (items.length - 1 != index) {
                                checkedItems += ", ";
                            }
                        });
                        $("#txtpilitemfree").val(checkedItems);
                    }
                }
            });


            //Set Grid Include Item
            var sourceinclude =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'idinclude',type: 'int'},
                        { name: 'nama',type: 'string'}
                    ],
                    url: '<?=base_url('admin/json/getdtiteminclude/'); ?>',
                    id: 'idinclude',
                    pagesize: 5,
                    async: false
                };
            var dtAdapteriteminclude= new $.jqx.dataAdapter(sourceinclude);
            $("#jqxcmbiteminclude").jqxComboBox({source: dtAdapteriteminclude, checkboxes: true,autoComplete: 'checked', searchMode: 'containsignorecase', multiSelect: true,width: 500, height: 35,theme: 'bootstrap',displayMember: "nama", valueMember: "idinclude"});
            //get seletect multiple item
            $("#jqxcmbiteminclude").on('checkChange', function (event) {
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        var items = $("#jqxcmbiteminclude").jqxComboBox('getCheckedItems');
                        var checkedItems = "";
                        $.each(items, function (index) {
                            checkedItems += this.value;
                            if (items.length - 1 != index) {
                                checkedItems += ", ";
                            }
                        });
                        $("#txtpiliteminclude").val(checkedItems);
                    }
                }
            });

            //grid item free
            var sourcegridfree =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'idfree',type: 'int'},
                        { name: 'idreff',type: 'int'},
                        { name: 'nama',type: 'string'},
                        { name: 'codepackage',type: 'string'}
                    ],
                    url: '<?=base_url('admin/json/getdtgridumrohfree_costum'); ?>/'+idpaket,
                    id: 'idfree',
                    pagesize: 5,
                    async: false
                };
            var dtAdaptergridfree = new $.jqx.dataAdapter(sourcegridfree);
            $("#jqxgriditemfree").jqxGrid(
                {
                    source: dtAdaptergridfree,
                    theme: 'bootstrap',
                    width: '99%',
                    autorowheight: true,
                    autoheight: true,
                    columnsresize: true,
                    pageable: true,
                    altrows: true,
                    columns: [
                        {
                            text: 'No', sortable: false, filterable: false, editable: false,
                            groupable: false, draggable: false, resizable: false,
                            datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                            cellsrenderer: function (row, column, value) {
                                return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                            }
                        },
                        { text: 'Kode Paket', columntype: 'textbox',datafield: 'codepackage',hidden: true },
                        { text: 'Nama Item', datafield: 'nama' },
                        {
                            text: '', filtertype: 'none', width: 60, cellsalign: 'right',columntype:'button', columngroup: 'Button',cellsrenderer: function () {
                                return 'Delete';
                            }, buttonclick: function (row, event) {
                                var button = $(event.currentTarget);
                                var grid = $('#' + this.owner.element.id);
                                var rowData = grid.jqxGrid('getrowdata', row);
                                bootbox.confirm({
                                    message: "Are you sure want to delete this data.!!?",
                                    buttons: {
                                        confirm: {
                                            label: 'Yes',
                                            className: 'btn-success'
                                        },
                                        cancel: {
                                            label: 'No',
                                            className: 'btn-danger'
                                        }
                                    },
                                    callback: function (result) {
                                        if (result) {
                                            $.ajax({
                                                type: "POST",
                                                url: '<?=base_url('admin/agents/hapusitemfree_costum/'); ?>',
                                                data: {
                                                    idreff: rowData.idreff,
                                                },
                                                dataType: "text",
                                                success: function(data){
                                                    //To reload grid
                                                    $('#jqxgriditemfree').jqxGrid('updatebounddata', 'cells');
                                                },
                                                error: function(data) { alert(JSON.stringify(data)); }
                                            });

                                        }
                                    }
                                });
                            }
                        }
                    ]
                });

    //grid item include
    var sourcegridinclude =
        {
            datatype: "json",
            datafields: [
                { name: 'idinclude',type: 'int'},
                { name: 'idreff',type: 'int'},
                { name: 'nama',type: 'string'},
                { name: 'codepackage',type: 'string'}
            ],
            url: '<?=base_url('admin/json/getdtgridumrohinclude_costum'); ?>/'+idpaket,
            id: 'idreff',
            pagesize: 5,
            async: false
        };
    var dtAdaptergridinclude = new $.jqx.dataAdapter(sourcegridinclude);
    $("#jqxgriditeminclude").jqxGrid(
        {
            source: dtAdaptergridinclude,
            theme: 'bootstrap',
            width: '99%',
            autorowheight: true,
            autoheight: true,
            columnsresize: true,
            pageable: true,
            altrows: true,
            columns: [
                {
                    text: 'No', sortable: false, filterable: false, editable: false,
                    groupable: false, draggable: false, resizable: false,
                    datafield: '', columntype: 'number', width: 40,cellsalign: 'center',align: 'center',
                    cellsrenderer: function (row, column, value) {
                        return "<div style='margin:7px;'>" + (value + 1) + "</div>";
                    }
                },
                { text: 'Kode Paket', columntype: 'textbox',datafield: 'codepackage',hidden: true },
                { text: 'Nama Item', datafield: 'nama' },
                {
                    text: '', filtertype: 'none', width: 60, cellsalign: 'right',columntype:'button', columngroup: 'Button',cellsrenderer: function () {
                        return 'Delete';
                    }, buttonclick: function (row, event) {
                        var button = $(event.currentTarget);
                        var grid = $('#' + this.owner.element.id);
                        var rowData = grid.jqxGrid('getrowdata', row);
                        bootbox.confirm({
                            message: "Are you sure want to delete this data.!!?",
                            buttons: {
                                confirm: {
                                    label: 'Yes',
                                    className: 'btn-success'
                                },
                                cancel: {
                                    label: 'No',
                                    className: 'btn-danger'
                                }
                            },
                            callback: function (result) {
                                if (result) {
                                    $.ajax({
                                        type: "POST",
                                        url: '<?=base_url('admin/agents/hapusiteminclude_costum/'); ?>',
                                        data: {
                                            idreff: rowData.idreff,
                                        },
                                        dataType: "text",
                                        success: function(data){
                                            //To reload grid
                                            $('#jqxgriditeminclude').jqxGrid('updatebounddata', 'cells');
                                        },
                                        error: function(data) { alert(JSON.stringify(data)); }
                                    });

                                }
                            }
                        });
                    }
                }
            ]
        });

    // load data from edit
    if ('<?php echo $edit[0]['isasuransi'];?>'=='1') {
        $('#chkasuransi').prop('checked', true);
    }
    $("#jqxcmbairlines").jqxComboBox('selectItem', '<?php echo $editairlines[0]['idairlines'];?>');
    $('#txtidairlines').val('<?php echo $editairlines[0]['id'];?>');
    $("#jqxcmbbus").jqxComboBox('selectItem', '<?php echo $editbus[0]['idbus'];?>');
    $('#txtidbus').val('<?php echo $editbus[0]['id'];?>');
    //mekkah
    $("#jqxcmbhotelmekkah").jqxComboBox('selectItem', '<?php echo $edithotelmakkah[0]['idhotel'];?>');
    $('#txtdaymekkah').val('<?php echo $edithotelmakkah[0]['day'];?>');
    $('#txtidmekkah').val('<?php echo $edithotelmakkah[0]['id'];?>');
    //madinah
    $("#jqxcmbhotelmadinah").jqxComboBox('selectItem', '<?php echo $edithotelmadinah[0]['idhotel'];?>');
    $('#txtdaymadinah').val('<?php echo $edithotelmadinah[0]['day'];?>');
    $('#txtidmadinah').val('<?php echo $edithotelmadinah[0]['id'];?>');
    //turki
    $("#jqxcmbhotelturki").jqxComboBox('selectItem', '<?php echo $edithotelturki[0]['idhotel'];?>');
    $('#txtdayturki').val('<?php echo $edithotelturki[0]['day'];?>');
    $('#txtidturki').val('<?php echo $edithotelturki[0]['id'];?>');

    // set total day
    $("#cmbtotalday").val('<?php echo $edit[0]['day'];?>');
});
$('.money').mask('000,000,000,000,000', {reverse: true});
function canceladd() {
    window.location.href = '<?php echo site_url("admin/agents/kostum");?>';
}
$(function(){
        $("#frmaddfree").submit(function(){
            dataString = $("#frmaddfree").serialize();
            $.ajax({
                type: "POST",
                url: '<?=base_url('admin/agents/savefree_costum/'); ?>',
                data: dataString,
                success: function(resp){
                    //To reload grid
                    $('#jqxgriditemfree').jqxGrid('updatebounddata', 'cells');
                    $('#modalAddItemFree').modal('hide');
                },
                error: function(resp) { alert(JSON.stringify(resp)); }
            });
            return false;  //stop the actual form post !important!
        });
});
$(function(){
        $("#frmaddinclude").submit(function(){
            dataString = $("#frmaddinclude").serialize();
            $.ajax({
                type: "POST",
                url: '<?=base_url('admin/agents/saveinclude_costum/'); ?>',
                data: dataString,
                success: function(resp){
                    //To reload grid
                    $('#jqxgriditeminclude').jqxGrid('updatebounddata', 'cells');
                    $('#modalAddItemInclude').modal('hide');
                },
                error: function(resp) { alert(JSON.stringify(resp)); }
            });
            return false;  //stop the actual form post !important!
        });
});

function validateForm() {

    var jmlhjemaah = $('#txtjmlh').val();
    var pesawat = $('#txtpilairlines').val();
    var bus = $('#txtpilbus').val();
    var hotelmekkah = $('#txtpilhotelmakkah').val();
    var daymekkah = $('#txtdaymekkah').val();
    var hotelmadinah = $('#txtpilhotelmadinah').val();
    var daymadinah = $('#txtdaymadinah').val();

    if (jmlhjemaah == null ||jmlhjemaah == "") {
        bootbox.alert("Jumlah jemaah masih kosong!!! <br>Harus dilengkapi");
        $( "#txtjmlh").focus();
        return false;
    }
    if (pesawat == null ||pesawat == "") {
        bootbox.alert("Pilihan Pesawat harus dipilih!!!");
        return false;
    }
    if (bus == null ||bus == "") {
        bootbox.alert("Pilihan Bus harus dipilih!!!");
        return false;
    }
    if (hotelmekkah == null || hotelmekkah == "" || daymekkah== "") {
        bootbox.alert("Pilihan Hotel Mekkah dan hari harus dilengkapi!!!");
        return false;
    }
    if (hotelmadinah == null || hotelmadinah == "" || daymadinah== "") {
        bootbox.alert("Pilihan Hotel Madinah dan hari harus dilengkapi!!!");
        return false;
    }
}
</script>
