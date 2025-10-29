<link href="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.min.css");?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url("assets/plugins/fullcalendar/moment.min.js");?>"></script>
<script src="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>
<!-- Info boxes -->
<div class="container-fluid">
<style>
/*      .datepicker { */
/*         z-index: 100000 !important; */
/*         display: none; */
/*     }  */
</style>
<div class="row" id="bodygrid">
   <div class="col-md-12">
       <div id='wrap'>
           <div id='calendar'></div>
           <div style='clear:both'></div>
       </div>
   </div>                 
</div>
	<!-- /.row -->
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
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
<!-- End Modal Detail Paket --->

<script type="text/javascript">
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
                text: 'back to order',
                click: function() {
                    window.location.href = '<?php echo site_url("admin/agents/kostum");?>';
                }
            }
        },
        header: {
            left: 'prev,next today',
            center: 'title ',
            right: 'BackButton, month'
        },
        defaultView: 'month',
        displayEventTime: false,
        monthNames: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
        monthNamesShort: ['Jan','Feb','Mar','Apr','Mai','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
        dayNames: ['Minggu','Senin','Selesa','Rabu','Kamis','Jumat','Sabtu'],
        dayNamesShort: ['Minggu','Senin','Selesa','Rabu','Kamis','Jumat','Sabtu'],
        events: "<?=site_url('admin/json/event_order_costum_agent'); ?>",
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

        },
        eventClick: function(event) {
            bootbox.dialog({
                message: "Klik <b>Detail</b> jika ingin melihat detail Kostum Paket Umroh <br>Klik <b>Book</b> jika ingin membooking paket umroh ini.",
                title: "Confirmation Detail Kostum Paket Umroh",
                buttons: {
                    confirm: {
                        label: 'Detail',
                        className: 'btn-primary',
                        callback: function () {
                            loaddetail(event.id);
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
        url: '<?=base_url('admin/json/getdtpaket_costum_umroh'); ?>/'+idstr[1],
        success: function(response) {
            if (response) {
                var obj = jQuery.parseJSON(response);
                console.log(obj);
                $('#modalDetailPaket').modal('show');
                $('#table_content_detail').append('<tr class="addtrmain">');
                $('#table_content_detail').append('<td class="addtdmain" align="left">Nama Kostum Paket</td>');
                $('#table_content_detail').append('<td class="addtdmain" align="left">'+obj['lstdtpaket_umroh'][0]['costumpackage']+'</td>');
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

</script>