<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxscheduler.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxscheduler.api.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxdate.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxdate.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/jqxwindow.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/globalization/globalize.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/jqwidgets/globalization/globalize.culture.de-DE.js");?>"></script>

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

        var localizationobj = {};

        localizationobj.currencysymbol = " ";
        localizationobj.decimalseparator = ".";
        localizationobj.thousandsseparator = ",";

        // prepare the data
        var source =
            {
                dataType: 'json',
                dataFields: [
                    { name: 'Idqouta', type: 'string' },
                    { name: 'idpackage', type: 'string' },
                    { name: 'package', type: 'string' },
                    { name: 'qouta', type: 'string' },
                    { name: 'tanggal', type: 'string' },
                    { name: 'price', type: 'float' },
                    { name: 'color', type: 'string' },
                    { name: 'desc', type: 'string' },
                    { name: 'calendar', type: 'string' },
                    { name: 'allday', type: 'string' },
                    { name: 'start', type: 'date', format: "yyyy-MM-dd HH:mm" },
                    { name: 'end', type: 'date', format: "yyyy-MM-dd HH:mm" }
                ],
                id: 'Idqouta',
                url: '<?=base_url('admin/json/getdataqouta'); ?>',
            };
        var adapter = new $.jqx.dataAdapter(source);
        var tinggilayar =screen.height-250;
        $("#scheduler").jqxScheduler({
            date: new $.jqx.date('todayDate'),
            width: '99.9%',
            theme: 'material',
            height: tinggilayar,
            contextMenu: false,
            editDialog: false,
            source: adapter,
            showLegend: true,
            ready: function () {
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
                    colorScheme: "scheme03",
                    dataField: "calendar",
                    source:  new $.jqx.dataAdapter(source)
                },
            appointmentDataFields:
                {
                    from: "start",
                    to: "end",
                    id: "Idqouta",
                    description: "desc",
                    location: "desc",
                    resourceId: "calendar",
                    subject: "price",
                    status: "color"
                },
            view: 'monthView',
            localization:
                {
                // separator of parts of a date (e.g. '/' in 11/05/1955)
                '/': "/",
                // separator of parts of a time (e.g. ':' in 05:44 PM)
                ':': ":",
                // the first day of the week (0 = Sunday, 1 = Monday, etc)
                firstDay: 0,
                days: {
                    // full day names
                    names: ["Minggu", "Senin", "Selesa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                    // abbreviated day names
                    namesAbbr: ["Min", "Sen", "Sel", "Rab", "Kms", "Jmt", "Sab"],
                    // shortest day names
                    namesShort: ["Mi", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"]
                },
                months: {
                    // full month names (13 months for lunar calendards -- 13th month should be "" if not lunar)
                    names: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember", ""],
                    // abbreviated month names
                    namesAbbr: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des", ""]
                },
                // AM and PM designators in one of these forms:
                // The usual view, and the upper and lower case versions
                //      [standard,lowercase,uppercase]
                // The culture does not use AM or PM (likely all standard date formats use 24 hour time)
                //      null
                AM: ["AM", "am", "AM"],
                PM: ["PM", "pm", "PM"],
                eras: [
                    // eras in reverse chronological order.
                    // name: the name of the era in this culture (e.g. A.D., C.E.)
                    // start: when the era starts in ticks (gregorian, gmt), null if it is the earliest supported era.
                    // offset: offset in years from gregorian calendar
                    {"name": "A.D.", "start": null, "offset": 0 }
                ],
                twoDigitYearMax: 2029,
                patterns: {
                    // short date pattern
                    d: "M/d/yyyy",
                    // long date pattern
                    D: "dddd, MMMM dd, yyyy",
                    // short time pattern
                    t: "h:mm tt",
                    // long time pattern
                    T: "h:mm:ss tt",
                    // long date, short time pattern
                    f: "dddd, MMMM dd, yyyy h:mm tt",
                    // long date, long time pattern
                    F: "dddd, MMMM dd, yyyy h:mm:ss tt",
                    // month/day pattern
                    M: "MMMM dd",
                    // month/year pattern
                    Y: "yyyy MMMM",
                    // S is a sortable format that does not vary by culture
                    S: "yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss",
                    // formatting of dates in MySQL DataBases
                    ISO: "yyyy-MM-dd hh:mm:ss",
                    ISO2: "yyyy-MM-dd HH:mm:ss",
                    d1: "dd.MM.yyyy",
                    d2: "dd-MM-yyyy",
                    d3: "dd-MMMM-yyyy",
                    d4: "dd-MM-yy",
                    d5: "H:mm",
                    d6: "HH:mm",
                    d7: "HH:mm tt",
                    d8: "dd/MMMM/yyyy",
                    d9: "MMMM-dd",
                    d10: "MM-dd",
                    d11: "MM-dd-yyyy"
                },
                agendaViewString: "Agenda",
                agendaAllDayString: "all day",
                agendaDateColumn: "Date",
                agendaTimeColumn: "Time",
                agendaAppointmentColumn: "Appointment",
                backString: "Back",
                forwardString: "Forward",
                toolBarPreviousButtonString: "previous",
                toolBarNextButtonString: "next",
                emptyDataString: "No data to display",
                loadString: "Loading...",
                clearString: "Clear",
                todayString: "Today",
                dayViewString: "Day",
                weekViewString: "Week",
                monthViewString: "Month",
                timelineDayViewString: "Timeline Day",
                timelineWeekViewString: "Timeline Week",
                timelineMonthViewString: "Timeline Month",
                loadingErrorMessage: "The data is still loading and you cannot set a property or call a method. You can do that once the data binding is completed. jqxScheduler raises the 'bindingComplete' event when the binding is completed.",
                editRecurringAppointmentDialogTitleString: "Edit Recurring Appointment",
                editRecurringAppointmentDialogContentString: "Do you want to edit only this occurrence or the series?",
                editRecurringAppointmentDialogOccurrenceString: "Edit Occurrence",
                editRecurringAppointmentDialogSeriesString: "Edit The Series",
                editDialogTitleString: "Edit Appointment",
                editDialogCreateTitleString: "Create New Appointment",
                contextMenuEditAppointmentString: "Edit Appointment",
                contextMenuCreateAppointmentString: "Create New Appointment",
                editDialogSubjectString: "Subject",
                editDialogLocationString: "Location",
                editDialogFromString: "From",
                editDialogToString: "To",
                editDialogAllDayString: "All day",
                editDialogExceptionsString: "Exceptions",
                editDialogResetExceptionsString: "Reset on Save",
                editDialogDescriptionString: "Description",
                editDialogResourceIdString: "Owner",
                editDialogStatusString: "Status",
                editDialogColorString: "Color",
                editDialogColorPlaceHolderString: "Select Color",
                editDialogTimeZoneString: "Time Zone",
                editDialogSelectTimeZoneString: "Select Time Zone",
                editDialogSaveString: "Save",
                editDialogDeleteString: "Delete",
                editDialogCancelString: "Cancel",
                editDialogRepeatString: "Repeat",
                editDialogRepeatEveryString: "Repeat every",
                editDialogRepeatEveryWeekString: "week(s)",
                editDialogRepeatEveryYearString: "year(s)",
                editDialogRepeatEveryDayString: "day(s)",
                editDialogRepeatNeverString: "Never",
                editDialogRepeatDailyString: "Daily",
                editDialogRepeatWeeklyString: "Weekly",
                editDialogRepeatMonthlyString: "Monthly",
                editDialogRepeatYearlyString: "Yearly",
                editDialogRepeatEveryMonthString: "month(s)",
                editDialogRepeatEveryMonthDayString: "Day",
                editDialogRepeatFirstString: "first",
                editDialogRepeatSecondString: "second",
                editDialogRepeatThirdString: "third",
                editDialogRepeatFourthString: "fourth",
                editDialogRepeatLastString: "last",
                editDialogRepeatEndString: "End",
                editDialogRepeatAfterString: "After",
                editDialogRepeatOnString: "On",
                editDialogRepeatOfString: "of",
                editDialogRepeatOccurrencesString: "occurrence(s)",
                editDialogRepeatSaveString: "Save Occurrence",
                editDialogRepeatSaveSeriesString: "Save Series",
                editDialogRepeatDeleteString: "Delete Occurrence",
                editDialogRepeatDeleteSeriesString: "Delete Series",
                editDialogStatuses:
                    {
                        free: "Free",
                        tentative: "Tentative",
                        busy: "Busy",
                        outOfOffice: "Out of Office"
                    },
                 },
            views:
                [
                    'monthView'
                ]
        });

    });

</script>