<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
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

    .timeline{
        counter-reset: test 0;
        position: relative;
        margin-top:7px;
        margin-left: 10px;
    }

    .timeline li{
        list-style: none;
        float: left;
        width: 22%;
        position: relative;
        text-align: center;
        text-transform: capitalize;
    }

    ul:nth-child(1){
        color: #4caf50;
    }

    .timeline li:before{
        counter-increment: test;
        content: counter(test);
        width: 33px;
        height: 33px;
        border: 1px solid #4caf50;
        border-radius: 50%;
        display: block;
        text-align: center;
        line-height: 33px;
        margin: 0 auto 5px auto;
        background: #fff;
        color: #000;
        transition: all ease-in-out .3s;
        cursor: pointer;
    }

    .timeline li:after{
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background-color: grey;
        top: 13px;
        left: -50%;
        z-index: -999;
        transition: all ease-in-out .3s;
    }

    .timeline li:first-child:after{
        content: none;
    }
    .timeline li.active-tl{
        color: #555555;
    }
    .timeline li.active-tl:before{
        background: #4caf50;
        color: #F1F1F1;
    }

    .timeline li.active-tl + li:after{
        background: #4caf50;
    }
</style>
<!-- Info boxes -->
<div class="container-fluid">
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#progress" data-toggle="tab">On Progress</a></li>
                <li><a href="#finish" data-toggle="tab">Selesai</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="progress">
                    <div id="jqxgrid"></div>
                </div>
                <div class="tab-pane" id="finish">
                    <div id="jqxgridfinish"></div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
    </div>

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

<!--  Modal Konfirmasi Harga-->
<div class="modal fade" id="modalHarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Estimasi Harga Kostum Paket Umroh</h5>
            </div>
            <div class="modal-body">
                <form id='frmaddhrg' method='post' accept-charset='utf-8' enctype='multipart/form-data' action="<?=site_url('admin/costum/saveprice')?>">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-5 label-input">Estimasi Harga Paket Umroh</label>
                        <div class="col-sm-3">
                            <input type="text"  class="form-control money" id="txtjumlah" name="txtjumlah"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            <input type="hidden" class="form-control" id="txtidpaket_costum" name="txtidpaket_costum">
                        </div>
                        <label for="inputEmail3" class="col-sm-3 label-input">per Jamaah</label>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-5 label-input">Total Jemaah</label>
                        <label id="lbltotaljamaah" class="col-sm-4 label-input"></label>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-5 label-input">Grand Total</label>
                        <div class="col-sm-6">
                            <input type="text"  class="form-control money" id="txtgrandtotal" name="txtgrandtotal"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                        </div>
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

<script type="text/javascript">
    var jmlhjemaah=0;
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
                    { name: 'idagent',type: 'int'},
                    { name: 'agent',type: 'string'},
                    { name: 'tglrequest',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'tglberangkat',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'basispackage',type: 'string'},
                    { name: 'codepackage',type: 'string'},
                    { name: 'costumpackage',type: 'string'},
                    { name: 'jumlah_jemaah',type: 'int'},
                    { name: 'price',type: 'float'},
                    { name: 'final_price',type: 'float'},
                    { name: 'total_price',type: 'float'},
                    { name: 'type',type: 'string'},
                    { name: 'day',type: 'int'},
                    { name: 'isasuransi',type: 'bool'},
                    { name: 'status',type: 'int'},
                    { name: 'status_costum',type: 'string'},
                    { name: 'remarks',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdatapaket_umroh_costum'); ?>',
                id: 'idpackage',
                async: false
            };
        var dataAdapterHeader = new $.jqx.dataAdapter(headersource);

        //source finish
        var sourcefinish =
            {
                datatype: "json",
                datafields: [
                    { name: 'idpackage',type: 'int'},
                    { name: 'idagent',type: 'int'},
                    { name: 'agent',type: 'string'},
                    { name: 'tglrequest',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'tglberangkat',type: 'date',format: 'dd.MM.yyyy' },
                    { name: 'basispackage',type: 'string'},
                    { name: 'codepackage',type: 'string'},
                    { name: 'costumpackage',type: 'string'},
                    { name: 'jumlah_jemaah',type: 'int'},
                    { name: 'price',type: 'float'},
                    { name: 'final_price',type: 'float'},
                    { name: 'total_price',type: 'float'},
                    { name: 'type',type: 'string'},
                    { name: 'day',type: 'int'},
                    { name: 'isasuransi',type: 'bool'},
                    { name: 'status',type: 'int'},
                    { name: 'status_costum',type: 'string'},
                    { name: 'remarks',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdatapaket_umroh_finish_costum'); ?>',
                id: 'idpackage',
                async: false
            };
        var dataAdapterFinish = new $.jqx.dataAdapter(sourcefinish);

        var cellsrenderertimeline = function (row, columnfield, value, defaulthtml, columnproperties) {
            //return '<span style="line-height:0.6;display:block">&nbsp;</span> <span style="margin-left:40px;line-height:0;">' + value + '%</span>';
            switch(value) {
                case 1:
                    return '<ul class="timeline"><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status => Konfirmasi Harga (data pengajuan kostum paket telah disubmit oleh agent menunggu direview dan dilakukan estimasi harga oleh pihak travel)">Konfirmasi<br>Harga</li> <li>Deal<br>Harga</li><li>Konversi <br>Menjadi Order</li><li>Selesai</li></ul>';
                    break;
                case 2:
                    return '<ul class="timeline"><li>Konfirmasi<br>Harga</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status => Deal Harga (data pengajuan telah diestimasi harganya selajutnya pihak agent menyetujui harga yang telah disepakati)">Deal<br>Harga</li><li>Konversi <br>Menjadi Order</li><li>Selesai</li></ul>';
                    break;
                case 3:
                    return '<ul class="timeline"><li>Konfirmasi<br>Harga</li> <li>Deal<br>Harga</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status => Konversi Menjadi Order (data pengajuan telah disepakati kedua pihak selanjutnya data akan dikonversi menjadi order)">Konversi <br>Menjadi Order</li><li>Selesai</li></ul>';
                    break;
                case 4:
                    return '<ul class="timeline"><li>Konfirmasi<br>Harga</li> <li>Deal<br>Harga</li><li>Konversi <br>Menjadi Order</li><li class="active-tl" data-toggle="tooltip" data-placement="top" title="Status => Selesai (data pengajuan kostum paket umroh telah dirubah menjadi order)">Selesai</li></ul>';
                    break;
            }

        }

        //grid master onprogress
        $("#jqxgrid").jqxGrid(
            {
                source: dataAdapterHeader,
                theme: 'material',
                width: '99.9%',
                rowsheight: 85,
                autoheight: true,
                autorowheight: true,
                ready: function () {
                    $("#jqxgrid").jqxGrid('localizestrings', localizationobj);
                },
                filterable: true,
                showfilterrow: true,
                pagesizeoptions: ['9', '18', '27', '100'],
                pagesize: 3,
                sortable: true,
                ready: function () {
                    $("#jqxgrid").jqxGrid('localizestrings', localizationobj);
                },
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
                    { text: 'Tanggal Keberangkatan', columntype: 'textbox', filtertype: 'date',datafield: 'tglberangkat',align: 'center',width: '165',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                    { text: 'Kode Kostum Paket',columntype: 'textbox', filtertype: 'textbox',datafield: 'codepackage',align: 'center',cellsalign: 'center',width: '170'},
                    { text: 'Agent',columntype: 'textbox', filtertype: 'textbox',datafield: 'agent',align: 'center',cellsalign: 'left',width: '250'},
                    { text: 'Basis Paket Umroh',columntype: 'textbox', filtertype: 'list',datafield: 'basispackage',align: 'center',cellsalign: 'left',width: '220'},
                    { text: 'Jumlah Jemaah',columntype: 'textbox', filtertype: 'textbox',datafield: 'jumlah_jemaah',align: 'center',cellsalign: 'center',width: '130'},
                    // { text: 'Tipe',columntype: 'textbox', filtertype: 'list',datafield: 'type',align: 'center',cellsalign: 'left',width: '175'},
                    { text: 'Jumlah Hari',columntype: 'textbox', filtertype: 'textbox',datafield: 'day',align: 'center',cellsalign: 'center',width: '100'},
                    { text: 'Catatan',columntype: 'textbox', filtertype: 'textbox',datafield: 'remarks',align: 'center',cellsalign: 'right',width: '250'},
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
                    { text: 'Harga',columntype: 'numberinput',columngroup:'status', filtertype: 'numberinput',cellsformat: 'c0',datafield: 'price',align: 'center',cellsalign: 'right',width: '155'},
                    { text: 'Grand Total',columntype: 'numberinput',columngroup:'status', filtertype: 'numberinput',cellsformat: 'c0',datafield: 'total_price',align: 'center',cellsalign: 'right',width: '175'},
                    { text: 'Info Status',columngroup:'status',columntype: 'textbox', filtertype: 'list',datafield: 'status_costum',align: 'center',cellsalign: 'left',width: '160'},
                    { text: 'Timeline',columngroup:'status', datafield: 'status', width: 450, cellsrenderer: cellsrenderertimeline,align: 'center' },
                    {
                        text: '', columngroup:'status',columngroup:'status', filtertype: 'none', width: 120, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info fa fa-plus-circle', cellsrenderer:
                            function (row, column, value) {
                                var grid = $('#' + this.owner.element.id);
                                var rowData = grid.jqxGrid('getrowdata', row);
                                if (rowData.status==1) {
                                    return 'Estimasi Harga';
                                } else if  (rowData.status==3) {
                                    return 'Convert to Order';
                                } else {
                                    return 'Selesai';
                                }
                            }, buttonclick: function (row, event) {
                            var grid = $('#' + this.owner.element.id);
                            var rowData = grid.jqxGrid('getrowdata', row);
                            //window.location.href = '<?php echo site_url("admin/agent/edit");?>/'+rowData.idpackage;
                            if (rowData.status==1 || rowData.final_price==0) {
                                $('#modalHarga').modal('show');
                                $('#txtidpaket_costum').val(rowData.idpackage);
                                jmlhjemaah = rowData.jumlah_jemaah;
                                $('#lbltotaljamaah').html(rowData.jumlah_jemaah)
                            } else if (rowData.status==3)  {
                                        bootbox.confirm({
                                            message: "Apa anda yakin ingin mengkonversi pengajuan kostum paket umroh menjadi order.!!!?",
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
                                                    window.location.href = '<?php echo site_url("admin/costum/convert_order");?>/'+rowData.idpackage+'/'+rowData.price;
                                                }
                                            }
                                        });

                            }
                        }
                    }
                    //{
                    //    text: '', columngroup:'status', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-danger', cellsrenderer: function () {
                    //        return 'Void';
                    //    }, buttonclick: function (row, event) {
                    //        var button = $(event.currentTarget);
                    //        var grid = $('#' + this.owner.element.id);
                    //        var rowData = grid.jqxGrid('getrowdata', row);
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
                    //                if (result) {
                    //                    window.location.href = '<?php //echo site_url("admin/agents/delpaket_costum");?>///'+rowData.idpackage;
                    //                }
                    //            }
                    //        });
                    //    }
                    //},
                    //{
                    //    text: '', columngroup:'action', filtertype: 'none', width: 65, cellsalign: 'right',columntype:'button',cellsclass:'btn btn-info fa fa-plus-circle', cellsrenderer: function () {
                    //        return 'Edit';
                    //    }, buttonclick: function (row, event) {
                    //        var grid = $('#' + this.owner.element.id);
                    //        var rowData = grid.jqxGrid('getrowdata', row)
                    //        if (rowData.status > 1) {
                    //            bootbox.alert('Data kostum paket  umroh tidak bisa diedit lagi<br> Data telah diproses dan direview oleh admin.!');
                    //        } else {
                    //            //window.location.href = '<?php //echo site_url("admin/costum/editcostum");?>///'+rowData.idpackage;
                    //        }
                    //
                    //    }
                    //}
                ],
                columngroups: [
                    { text: 'Action', align: 'center', name: 'action' },
                    { text: 'Status Kostum Paket Umroh', align: 'center', name: 'status' },
                    { text: 'Accommodation ', align: 'center', name: 'detail' },
                    { text: 'Detail Item', align: 'center', name: 'item' }
                ]
            }
        );

        //grid master finish
        $("#jqxgridfinish").jqxGrid(
            {
                source: dataAdapterFinish,
                theme: 'material',
                width: '99.9%',
                autoheight: true,
                filterable: true,
                showfilterrow: true,
                pagesizeoptions: ['10', '20', '50', '100'],
                pagesize: 10,
                sortable: true,
                ready: function () {
                    $("#jqxgridfinish").jqxGrid('localizestrings', localizationobj);
                },
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
                    { text: 'Tanggal Keberangkatan', columntype: 'textbox', filtertype: 'date',datafield: 'tglberangkat',align: 'center',width: '165',cellsformat: 'dd-MMM-yyyy',cellsalign: 'center'},
                    { text: 'Kode Kostum Paket',columntype: 'textbox', filtertype: 'textbox',datafield: 'codepackage',align: 'center',cellsalign: 'center',width: '170'},
                    { text: 'Agent',columntype: 'textbox', filtertype: 'textbox',datafield: 'agent',align: 'center',cellsalign: 'left',width: '250'},
                    { text: 'Basis Paket Umroh',columntype: 'textbox', filtertype: 'list',datafield: 'basispackage',align: 'center',cellsalign: 'left',width: '220'},
                    { text: 'Jumlah Jemaah',columntype: 'textbox', filtertype: 'textbox',datafield: 'jumlah_jemaah',align: 'center',cellsalign: 'center',width: '130'},
                    // { text: 'Tipe',columntype: 'textbox', filtertype: 'list',datafield: 'type',align: 'center',cellsalign: 'left',width: '175'},
                    { text: 'Jumlah Hari',columntype: 'textbox', filtertype: 'textbox',datafield: 'day',align: 'center',cellsalign: 'center',width: '100'},
                    { text: 'Catatan',columntype: 'textbox', filtertype: 'textbox',datafield: 'remarks',align: 'center',cellsalign: 'right',width: '250'},
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
                    { text: 'Harga',columntype: 'numberinput',columngroup:'status', filtertype: 'numberinput',cellsformat: 'c0',datafield: 'price',align: 'center',cellsalign: 'right',width: '155'},
                    { text: 'Grand Total',columntype: 'numberinput',columngroup:'status', filtertype: 'numberinput',cellsformat: 'c0',datafield: 'total_price',align: 'center',cellsalign: 'right',width: '175'},
                    { text: 'Info Status',columngroup:'status',columntype: 'textbox', filtertype: 'list',datafield: 'status_costum',align: 'center',cellsalign: 'left',width: '160'}
                ],
                columngroups: [
                    { text: 'Action', align: 'center', name: 'action' },
                    { text: 'Status Kostum Paket Umroh', align: 'center', name: 'status' },
                    { text: 'Accommodation ', align: 'center', name: 'detail' },
                    { text: 'Detail Item', align: 'center', name: 'item' }
                ]
            }
        );

        $("#txtjumlah").change(function(){
            var jmlh = $(this).val();
            strjmlh = jmlh.replaceAll(',','');
            var total =  strjmlh * jmlhjemaah ;
          //  $("#txtgrandtotal").focus();
            $("#txtgrandtotal").val(total);

        });
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



    //get data load airlines
    function load_modal_airlines(id)
    {
        $('.addtrairlines').remove();
        $('.addtdairlines').remove();
        $.ajax({
            url: '<?=base_url('admin/json/getloaddt_airlines_costum'); ?>/'+id,
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
            url: '<?=base_url('admin/json/getloaddt_hotels_costum'); ?>/'+id,
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
            url: '<?=base_url('admin/json/getloaddt_bus_costum'); ?>/'+id,
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
            url: '<?=base_url('admin/json/getloaddt_include_costum'); ?>/'+id,
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
            url: '<?=base_url('admin/json/getloaddt_free_costum'); ?>/'+id,
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

    //function gotoview(){
    //    window.location.href = '<?php //echo site_url("admin/costum/jadwal");?>//';
    //}
</script>