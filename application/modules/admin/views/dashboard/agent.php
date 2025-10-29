<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >
<link href="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.min.css");?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url("assets/plugins/fullcalendar/moment.min.js");?>"></script>
<script src="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.js");?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
<style>
    .container-fluid {
        padding-right: 5px;
        padding-left: 5px;
    }
    .content {
        padding:2px;
    }
    .breadcrumb {
        margin-bottom: 10px;
    }
</style>
<!-- Info boxes -->
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <div class="row">
<!--            <div class="col-md-6">-->
<!--                <div class="panel panel-primary">-->
<!--                    <div class="panel-body">-->
<!--                        <div class="col-md-12 col-sm-12">   -->
<!--                             <h3 style="color: #000;font-weight: bold;text-transform:uppercase;display:inline-block;letter-spacing: 7px;">-->
<!--                               <center ><img src="--><?php //echo base_url(); ?><!--assets/img/Logo-BST-White.png" width="55px" />-->
<!--                               APLIKASI BSTRAVEL</center>-->
<!--                             </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Order <br>Paket Umroh</span>
                        <span class="h2" ><?php echo number_format($totalorder);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Order <br>Kostum Paket Umroh</span>
                        <span class="h2" ><?php echo number_format(2);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content text-center">
                        <span class="info-box-text">Total Jamaah</span>
                        <span class="h2" ><?php echo number_format($totaljamaah);?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
      <div class="row">
          <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header with-border">
                      <h3 class="box-title">Jadwal dan Qouta Paket Umroh</h3>

                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                  </div>
                  <div class="box-body">
                      <div id='calendar'></div>
                  </div>
              </div>
          </div>
      </div>
	

</div><!-- /.container-fluid -->

<!-- Modal Detail Paket-->
<div class="modal fade" id="modalDetailPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Informasi Paket Umroh</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody id="table_content_detail">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail Paket

<!--  Modal Book Paket Umrah-->
<div class="modal fade" id="modalBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Paket Umroh</h5>
            </div>
            <div class="modal-body">
                <form id='frmbook' method='post' accept-charset='utf-8' enctype='multipart/form-data'>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label label-input ">Sisa Qouta tersedia</label>
                        <label id="lblsisaqouta" class="col-sm-2 col-form-label label-input "></label>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label label-input ">Jumlah Jamaah </label>
                        <div class="col-sm-2">
                            <input type="text"  class="form-control" id="txtjumlah" name="txtjumlah"  onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            <input type="hidden" class="form-control" id="txtidpaket" name="txtidpaket">
                            <input type="hidden" class="form-control" id="txtidqouta" name="txtidqouta">
                        </div>
                        <label for="staticEmail" class="col-sm-1 col-form-label label-input ">Jamaah</label>
                 </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-rounded " id="btnsave">Book</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Book Paket Umrah-->

<!--  Modal Add Order via Agent-->
<div class="modal fade" id="modalAddCostum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kostum Paket Umroh</h5>
            </div>
            <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-5 label-input">Tanggal Paket Costum</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="txtkostumtgl" name="txtkostumtgl" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-5 label-input">Kostum base on Paket Umroh</label>
                        <div class="col-sm-6">
                            <div id='jqxcmbpaket_umroh'> </div>
                            <input type="hidden" class="form-control" id="txtpilidpaket" name="txtpilidpaket">
                            <input type="hidden" class="form-control" id="txtpilnama_paket" name="txtpilnama_paket">
                            <input type="hidden" class="form-control" id="txttgl_kostum" name="txttgl_kostum">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success btn-rounded " id="btnproses" onclick="gotocostumproses()">Proses</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Order via Agent -->

<script type="text/javascript">
    var sisaqouta=0;
    $(document).ready(function () {
        //Calender Plugins
        var tgl = new Date();
        //  alert(formatDate(tgl));
        var d = tgl.getDate();
        var m = tgl.getMonth();
        var y = tgl.getFullYear();
        var calendar = $('#calendar').fullCalendar({
            customButtons: {
                BackButton: {
                    text: 'daftar paket',
                    click: function() {
                        window.location.href = '<?php echo site_url("admin/agents/harga/");?>';
                    }
                }
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'BackButton, month'
            },
            monthNames: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            monthNamesShort: ['Jan','Feb','Mar','Apr','Mai','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
            dayNames: ['Minggu','Senin','Selesa','Rabu','Kamis','Jumat','Sabtu'],
            dayNamesShort: ['Minggu','Senin','Selesa','Rabu','Kamis','Jumat','Sabtu'],
            defaultView: 'month',
            displayEventTime: false,
            events: "<?=site_url('admin/json/render_event'); ?>",
            // Convert the allDay from string to boolean
            // eventRender: function(event, element, view) {
            //     if (event.allDay === 'true') {
            //         event.allDay = true;
            //     } else {
            //         event.allDay = false;
            //     }
            // },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                // get date now
                var tglskrng = moment().add(7, 'days');
                var selectDate = tglskrng.format('YYYY-MM-DD');
                var dateString = moment(start).format();
                dateString = dateString.replace("T", " ");
                var res = dateString.substring(19,0);
                var tgl = moment(res).format('DD MMM YYYY');
                var tglbook = moment(res).format('YYYY-MM-DD')
                if(res < selectDate){
                    bootbox.alert("Tanggal yang dipesan sudah lewat dari tanggal sekarang <br> Tanggal booking harus seminggu lebih awal dari tanggal sekarang.!!");
                }else{
                    bootbox.confirm({
                        message: "Apakah anda ingin kostum paket umroh dengan tanggal keberangkatan : <b>"+tgl+" </b><br>Siahkan pilih Ya untuk melanjutkan proses booking.",
                        buttons: {
                            confirm: {
                                label: 'Ya',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'Tidak',
                                className: 'btn-info'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                //window.location.href = '<?php //echo site_url("admin/agents/costum");?>///'+tglbook;
                                $('#modalAddCostum').modal('show');
                                $("#txtkostumtgl").val(tgl);
                                $("#txttgl_kostum").val(tglbook);
                            }
                        }
                    });
                }
            },
            eventClick: function(event) {
                bootbox.dialog({
                    message: "Klik <b>Detail</b> jika ingin melihat detail Paket Umroh <br>Klik <b>Book</b> jika ingin membooking paket umroh ini.",
                    title: "Confirmation Paket Umroh",
                    buttons: {
                        confirm: {
                            label: 'Detail',
                            className: 'btn-primary',
                            callback: function () {
                                loaddetail(event.id);
                            }
                        },
                        noclose: {
                            label: "Book",
                            className: 'btn-info',
                            callback: function () {
                                if (event.sisa <= 0 ) {
                                    bootbox.alert("Sisa Qouta Jamaah untuk Paket ini sudah habis.!<br> Mohon maaf anda bisa order di tanggal yang lain.")
                                } else {
                                    book(event.id,event.sisa);
                                }
                            }
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-warning'
                        },
                    }
                });
            }
        });

        $("#txtjumlah").change(function() {
            if ($(this).val() > sisaqouta) {
                bootbox.alert("Jumlah Jumaah yang diinput melebihi qouta yang tersedia.!!");
                $("#txtjumlah").val(0);
            }
        });

        //item paket umroh
        var srcpaket =
            {
                datatype: "json",
                datafields: [
                    { name: 'Idqouta',type: 'int'},
                    { name: 'idpackage',type: 'int'},
                    { name: 'package',type: 'string'}
                ],
                url: '<?=base_url('admin/json/getdataumroh'); ?>',
                id: 'idpackage',
                async: false
            };
        var dtAdapterPaket= new $.jqx.dataAdapter(srcpaket);
        $("#jqxcmbpaket_umroh").jqxComboBox({source: dtAdapterPaket, autoComplete: 'checked', searchMode: 'containsignorecase', width: 270, height: 30,theme: 'material',displayMember: "package", valueMember: "idpackage"});
        //get selected item
        $("#jqxcmbpaket_umroh").on('select', function (event) {
            var selectedItems = "";
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    $("#txtpilidpaket").val(item.value);
                    $("#txtpilnama_paket").val(item.label);
                }
            }
        });


});


    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        return [year, month, day].join('-');
    }

    function loaddetail(id) {
        var idstr= id.split("-");
        $('.addtrmain').remove();
        $('.addtdmain').remove();
        $.ajax({
            type: "POST",
            url: '<?=base_url('admin/json/getdtpaket_umroh'); ?>/'+idstr[1],
            success: function(response) {
                if (response) {
                    var obj = jQuery.parseJSON(response);
                    console.log(obj);
                    $('#modalDetailPaket').modal('show');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Nama Paket</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtpaket_umroh'][0]['name']+'</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Harga Paket</td>');
                    var hrg = currency(obj['lstdtpaket_umroh'][0]['price'],{ separator: ',' }).format();
                    var price = hrg.replace(".00", "");
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Rp. '+price+'</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Jumlah Hari</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtpaket_umroh'][0]['day']+'</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Asuransi</td>');
                    var chkasuransi = obj['lstdtpaket_umroh'][0]['isasuransi'];
                    if (chkasuransi==1) {
                        var isasuransi ="Ya"
                    } else {
                        var isasuransi ="Tidak"
                    }
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+isasuransi+'</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Catatan</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtpaket_umroh'][0]['remarks']+'</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Maskapai Penerbangan</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtairlines'][0]['pesawat']+' '+obj['lstdtairlines'][0]['group']+' Flight</td>');
                    $('#table_content_detail').append('</tr>');
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">Armada Bus</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtbus'][0]['brand']+' '+obj['lstdtbus'][0]['group']+'</td>');
                    $('#table_content_detail').append('</tr>');

                    for (var h = 0; h < Object.keys(obj['lstdthotel']).length; h++) {
                        $('#table_content_detail').append('<tr class="addtrmain">');
                        $('#table_content_detail').append('<td class="addtdmain" align="left">Hotel '+obj['lstdthotel'][h]['Address']+'</td>');
                        $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdthotel'][h]['Name']+' ' +obj['lstdthotel'][h]['group']+'</td>');
                        $('#table_content_detail').append('</tr>');
                    }
                    $('#table_content_detail').append('<tr class="addtrmain">');
                    $('#table_content_detail').append('<td class="addtdmain" align="center"><b>Item Include</b><div id="diviteminclude" align="left"></div>');
                    var ni=1;
                    for (var ii = 0; ii < Object.keys(obj['lstdtitem_include']).length; ii++) {
                        $('#diviteminclude').append(''+ni + '. '+ obj['lstdtitem_include'][ii]['nama'] +'<br>');
                        ni++;
                    }
                    $('#table_content_detail').append('</td>');
                    $('#table_content_detail').append('<td class="addtdmain" align="center"><b>Item Free</b><div id="divitemfree" align="left"></div>');
                    var nf=1;
                    for (var fi = 0; fi < Object.keys(obj['lstdtitem_free']).length; fi++) {
                        $('#divitemfree').append(''+nf + '. '+ obj['lstdtitem_free'][fi]['nama'] +'<br>');
                        nf++;
                    }
                    $('#table_content_detail').append('</td>');
                    $('#table_content_detail').append('</tr>');
                }
            },
            error: function(response) { alert(JSON.stringify(response)); }
        });
    }
    function book(id,sisa) {
        sisaqouta = sisa;
        $('#modalBook').modal('show');
        var idstr= id.split("-");
        $('#lblsisaqouta').text(sisa+' Jamaah');
        $('#txtidpaket').val(idstr[1]);
        $('#txtidqouta').val(idstr[0]);
    }
    $(function(){
        $("#frmbook").submit(function(){
            if (sisaqouta == 0) throw "exit";
            dataString = $("#frmbook").serialize();
            $.ajax({
                type: "POST",
                url: '<?=base_url('admin/agents/savebook/'); ?>',
                data: dataString,
                success: function(resp){
                    //hide modal
                    $('#modalBook').modal('hide');
                    bootbox.alert("Paket Umrah telah di booking<br>Menunggu proses konfirmasi dari travel");
                    gotoorder();
                },
                error: function(resp) { alert(JSON.stringify(resp)); }
            });
            return false;  //stop the actual form post !important!
        });
    });
    function gotoorder() {
        window.location.href = '<?php echo site_url("admin/agents/");?>';
    }

    function gotocostumproses() {
        var id = $("#txtpilidpaket").val();
        var tgl = $("#txttgl_kostum").val();
        if (id === '' || id === null) {
            bootbox.alert('Silahkan Pilih Paket Umroh terlebih dahulu.!!')
        } else {
            window.location.href = '<?php echo site_url("admin/agents/costum/");?>' + id + '/' + tgl;
        }

    }
</script>
