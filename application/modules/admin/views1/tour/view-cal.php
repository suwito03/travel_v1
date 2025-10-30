<link href="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.min.css");?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url("assets/plugins/fullcalendar/moment.min.js");?>"></script>
<script src="<?php echo base_url("assets/plugins/fullcalendar/fullcalendar.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
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
<script type="text/javascript">
$(document).ready(function () {
    //Calender Plugins
    var tgl = new Date();
  //  alert(formatDate(tgl));
    var d = tgl.getDate();
    var m = tgl.getMonth();
    var y = tgl.getFullYear();

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
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
        // dayRender: function (date, cell) {
        //     var today = new Date();
        //     var end = new Date();
        //     end.setDate(today.getDate()+7);
        //
        //     if (date.getDate() === today.getDate()) {
        //         cell.css("background-color", "red");
        //     }
        //
        //     if(date > today && date <= end) {
        //         cell.css("background-color", "yellow");
        //     }
        //
        // },
        // dayRender: function(calEvent, cell, date) {
        //     var today = new Date();
        //     var tglevent = formatDate(calEvent);
        //     alert(tglevent);
        //     if(tglevent == tglevent ){
        //         cell.css('background-color', '#36ff40');
        //     }
        //
        // },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            // // $('#mymodal').modal('show');
            //  var dateString = moment(start).format();
            //  dateString = dateString.replace("T", " ");
            //  var res = dateString.substring(19,0);
            //  alert(res);
            //   //   start =  $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
            //  // tgl = res;
            //  // alert(tgl);
            //  //  end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
            //
            // // }
            // calendar.fullCalendar('unselect');
        },
        eventClick: function(event) {
            bootbox.dialog({
                message: "Klik Detail jika ingin melihat detail Paket Umroh <br>Klik Book jika ingin membooking paket umroh ini.",
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
                            book(event.id);
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
         alert(id);
}


</script>