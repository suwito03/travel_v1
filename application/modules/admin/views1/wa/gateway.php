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
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-body box-profile">
                                <h6 class="panel-title" style="text-transform: capitalize;">WhatsApp Gateway</h6>
                                <hr>
                                <form id='frmwa' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/wa/save_gateway')?>" onsubmit="return validateForm()">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="exampleInputName2" class="col-sm-4 control-label">Whatsva Api Key</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="txtnmrwa" name="txtnmrwa"  maxlength="20" value="<?php echo $nmrwa;?>">
                                            <input type="hidden" class="form-control" id="txtid" name="txtid" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13" value="<?php echo $idwa;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Save</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="pull-right">
                                    <button class="btn btn-xs btn-info"  data-toggle="modal" data-target="#modalAddWa"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                                <h6 class="panel-title" style="text-transform: capitalize;">Daftar Nomor WhatsApp Admin Travel</h6>
                                <hr>

                                <div id="jqxgridwa"></div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container-fluid -->
<!-- Begin Modal Add Nmr Wa-->
<div class="modal fade" id="modalAddWa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Nomor WhatsApp Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id='frmaddwa' method='post' accept-charset='utf-8' enctype='multipart/form-data'>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 label-input">Nomor Whatsapp</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="txtnmradminwa" name="txtnmradminwa" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 label-input">Pemilik Nomor</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="txtowner" name="txtowner" >
                        </div>
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
<!-- End Modal Add Nmr Wa-->

<script type="text/javascript">

$(document).ready(function () {
    //grid item free
    var sourcegrid =
        {
            datatype: "json",
            datafields: [
                { name: 'id',type: 'int'},
                { name: 'nmr',type: 'string'},
                { name: 'owner',type: 'string'},
            ],
            url: '<?=base_url('admin/json/getdtadminwa'); ?>',
            id: 'id',
            pagesize: 7,
            async: false
        };
    var dtAdaptergrid = new $.jqx.dataAdapter(sourcegrid);
    $("#jqxgridwa").jqxGrid(
        {
            source: dtAdaptergrid,
            theme: 'bootstrap',
            width: '99.9%',
            autorowheight: true,
            autoheight: true,
            columnsresize: true,
            pagesizeoptions: ['7', '16'],
            pagesize: 7,
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
                { text: '', columntype: 'textbox',datafield: 'id',hidden: true },
                { text: 'Nomor WA', columntype: 'textbox',datafield: 'nmr', width: 130},
                { text: 'Pemilik Nomor', datafield: 'owner' },
                {
                    text: '', filtertype: 'none', width: 60, cellsalign: 'right',columntype:'button', columngroup: 'Button',cellsrenderer: function () {
                        return 'Hapus';
                    }, buttonclick: function (row, event) {
                        var button = $(event.currentTarget);
                        var grid = $('#' + this.owner.element.id);
                        var rowData = grid.jqxGrid('getrowdata', row);
                        bootbox.confirm({
                            message: "Apakah anda yakin menghapus data nomor wa ini.!!?",
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
                                        url: '<?=base_url('admin/wa/hapusitemwa/'); ?>',
                                        data: {
                                            id: rowData.id,
                                        },
                                        dataType: "text",
                                        success: function(data){
                                            //To reload grid
                                            $('#jqxgridwa').jqxGrid('updatebounddata', 'cells');
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
});

function validateForm() {
    var nmr = $('#txtnmrwa').val();

    if (nmr == null ||nmr == "") {
        bootbox.alert("Nomor Whatsapp masih kosong!!! <br>Harus dilengkapi");
        $( "#txtnmrwa").focus();
        return false;
    }
}
$(function(){
    $("#frmaddwa").submit(function(){
        dataString = $("#frmaddwa").serialize();
        $.ajax({
            type: "POST",
            url: '<?=base_url('admin/wa/savenadminwa/'); ?>',
            data: dataString,
            success: function(resp){
                //To reload grid
                $('#jqxgridwa').jqxGrid('updatebounddata', 'cells');
                $('#modalAddWa').modal('hide');
            },
            error: function(resp) { alert(JSON.stringify(resp)); }
        });
        return false;  //stop the actual form post !important!
    });
});
</script>

