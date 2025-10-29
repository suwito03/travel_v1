<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxscheduler.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxscheduler.api.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxdate.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxdate.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxwindow.js");?>"></script>

<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.base.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.bootstrap.css");?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url("assets/jqwidgets/styles/jqx.material.css");?>"  type="text/css" >

<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.mask.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/currency.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/moment.js"); ?>" ></script>
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
    <div class="row">
        <div class="col-md-12">
            <div id="scheduler"></div>
        </div>
    </div>
</div><!-- /.container-fluid -->
<script type="text/javascript">
    $(document).ready(function () {
        var appointments = new Array();
        var appointment1 = {
            id: "id1",
            description: "George brings projector for presentations.",
            location: "",
            subject: "Quarterly Project Review Meeting",
            calendar: "Room 1",
            start: new Date(2023, 10, 23, 9, 0, 0),
            end: new Date(2023, 10, 23, 16, 0, 0)
        }
        var appointment2 = {
            id: "id2",
            description: "",
            location: "",
            subject: "IT Group Mtg.",
            calendar: "Room 2",
            start: new Date(2023, 10, 24, 10, 0, 0),
            end: new Date(2023, 10, 24, 15, 0, 0)
        }
        var appointment3 = {
            id: "id3",
            description: "",
            location: "",
            subject: "Course Social Media",
            calendar: "Room 3",
            start: new Date(2023, 10, 27, 11, 0, 0),
            end: new Date(2023, 10, 27, 13, 0, 0)
        }
        var appointment4 = {
            id: "id4",
            description: "",
            location: "",
            subject: "New Projects Planning",
            calendar: "Room 2",
            start: new Date(2023, 10, 23, 16, 0, 0),
            end: new Date(2023, 10, 23, 18, 0, 0)
        }
        var appointment5 = {
            id: "id5",
            description: "",
            location: "",
            subject: "Interview with James",
            calendar: "Room 1",
            start: new Date(2023, 10, 25, 15, 0, 0),
            end: new Date(2023, 10, 25, 17, 0, 0)
        }
        var appointment6 = {
            id: "id6",
            description: "",
            location: "",
            subject: "Interview with Nancy",
            calendar: "Room 4",
            start: new Date(2023, 10, 26, 14, 0, 0),
            end: new Date(2023, 10, 26, 16, 0, 0)
        }
        appointments.push(appointment1);
        appointments.push(appointment2);
        appointments.push(appointment3);
        appointments.push(appointment4);
        appointments.push(appointment5);
        appointments.push(appointment6);
        // prepare the data
        var source =
            {
                dataType: "array",
                dataFields: [
                    { name: 'id', type: 'string' },
                    { name: 'description', type: 'string' },
                    { name: 'location', type: 'string' },
                    { name: 'subject', type: 'string' },
                    { name: 'calendar', type: 'string' },
                    { name: 'start', type: 'date' },
                    { name: 'end', type: 'date' }
                ],
                id: 'id',
                localData: appointments
            };
        var adapter = new $.jqx.dataAdapter(source);
        var tinggilayar =screen.height-250;
        $("#scheduler").jqxScheduler({
            date: new $.jqx.date('todayDate'),
            width: '99.9%',
            theme: 'bootstrap',
            view: 'monthView',
            height: tinggilayar,
            source: adapter,
            showLegend: true,
            /**
             * called when the context menu is created.
             * @param {Object} menu - jqxMenu's jQuery object.
             * @param {Object} settings - Object with the menu's initialization settings.
             */
            contextMenuCreate: function(menu, settings)
            {
                var source = settings.source;
                source.push({ id: "delete", label: "Delete Appointment" });
                source.push({
                    id: "status", label: "Set Status", items:
                        [
                            { label: "Free", id: "free" },
                            { label: "Out of Office", id: "outOfOffice" },
                            { label: "Tentative", id: "tentative" },
                            { label: "Busy", id: "busy" }
                        ]
                });
            },
            /**
             * called when the user clicks an item in the Context Menu. Returning true as a result disables the built-in Click handler.
             * @param {Object} menu - jqxMenu's jQuery object.
             * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
             * @param {jQuery.Event Object} the jqxMenu's itemclick event object.
             */
            contextMenuItemClick: function (menu, appointment, event)
            {
                var args = event.args;
                switch (args.id) {
                    case "delete":
                        $("#scheduler").jqxScheduler('deleteAppointment', appointment.id);
                        return true;
                    case "free":
                        $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'free');
                        return true;
                    case "outOfOffice":
                        $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'outOfOffice');
                        return true;
                    case "tentative":
                        $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'tentative');
                        return true;
                    case "busy":
                        $("#scheduler").jqxScheduler('setAppointmentProperty', appointment.id, 'status', 'busy');
                        return true;
                }
            },
            /**
             * called when the menu is opened.
             * @param {Object} menu - jqxMenu's jQuery object.
             * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
             * @param {jQuery.Event Object} the open event.
             */
            contextMenuOpen: function (menu, appointment, event) {
                if (!appointment) {
                    menu.jqxMenu('hideItem', 'delete');
                    menu.jqxMenu('hideItem', 'status');
                }
                else {
                    menu.jqxMenu('showItem', 'delete');
                    menu.jqxMenu('showItem', 'status');
                }
            },
            /**
             * called when the menu is closed.
             * @param {Object} menu - jqxMenu's jQuery object.
             * @param {Object} the selected appointment instance or NULL when the menu is opened from cells selection.
             * @param {jQuery.Event Object} the close event.
             */
            contextMenuClose: function (menu, appointment, event) {
            },
            ready: function () {
                $("#scheduler").jqxScheduler('ensureAppointmentVisible', 'id1');
                var today = new Date();
                var month = today.getMonth() + 1;
                var monthStr = month < 10 ? '0' + month : month;
                var day = today.getDate();
                var dayStr = day < 10 ? '0' + day : day;
                var todayString = today.getFullYear() + '-' + monthStr + '-' + dayStr;
                $("td[data-date='" + todayString + " 00:00:00']").css({
                    border: '1px solid orange',
                    backgroundColor: '#f8efc8'
                });
            },
            resources:
                {
                    colorScheme: "scheme02",
                    dataField: "calendar",
                    source: new $.jqx.dataAdapter(source)
                },
            appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "id",
                    description: "description",
                    location: "place",
                    subject: "subject",
                    resourceId: "calendar"
                },
            views:
                [
                    'monthView',
                    'agendaView'
                ]
        });

    });

</script>