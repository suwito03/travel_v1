

<link href="<?php echo base_url(); ?>assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet"
      type="text/css"/>
<link href="<?php echo base_url(); ?>assets/datatables/css/responsive.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
<link href="<?php echo base_url(); ?>assets/datatables/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/datatables/css/dataTables.responsive.css" rel="stylesheet" type="text/css">


<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- Select2 library -->
<link rel="stylesheet" href="<?php echo base_url( 'assets/plugins/select2/select2.min.css' ); ?>">
<script src="<?php echo base_url( 'assets/plugins/select2/select2.full.min.js' ); ?>"></script>

<!-- Date picker library -->
<link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<!-- Radio Checkbox library -->
<link rel="stylesheet" href="<?php echo base_url( 'assets/plugins/iCheck/all.css' ); ?>">
<script src="<?php echo base_url( 'assets/plugins/iCheck/icheck.min.js' ); ?>"></script>


<!-- Sweet Alert library -->
<link rel="stylesheet" href="<?php echo base_url( 'assets/plugins/sweet-alert/sweetalert.css' ); ?>">
<script src="<?php echo base_url( 'assets/plugins/sweet-alert/sweetalert.min.js' ); ?>"></script>

<!-- Chart -->
<link rel="stylesheet" href="<?php echo base_url( 'assets/plugins/chart.js/Chart.css' ); ?>">
<script src="<?php echo base_url( 'assets/plugins/chart.js/Chart.js' ); ?>"></script>

<?php if ( isset( $before_body ) ) {
	echo $before_body;
}
?>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<script>
	$.fn.modal.Constructor.prototype.enforceFocus = function () {
	};

	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	setTimeout(function () {
		$('.alert').fadeOut(2000);
	}, 10000); // <-- time in milliseconds
</script>
<script>

	function notify_view(type, message) {

		$.notify({
			message: message
		}, {
			type: type,
			offset: {
				x: '30',
				y: '85'
			},
			spacing: 10,
			z_index: 1031,
			delay: 200,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert">' +
			'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
			'<span data-notify="icon"></span> ' +
			'<span data-notify="title">{1}</span> ' +
			'<span data-notify="message">{2}</span>' +
			'<div class="progress" data-notify="progressbar">' +
			'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
			'</div>' +
			'<a href="{3}" target="{4}" data-notify="url"></a>' +
			'</div>'
		});
	}

	$(document).ready(function () {
	    /**
	     * Line Chart
	     */
	    var lineChart = $('#line-chart');

	    if (lineChart.length > 0) {
	        new Chart(lineChart, {
	            type: 'line',
	            data: {
	                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                datasets: [{
	                    label: 'Users',
	                    data: [12, 19, 3, 5, 2, 3, 20, 33, 23, 12, 33, 10],
	                    backgroundColor: 'rgba(66, 165, 245, 0.5)',
	                    borderColor: '#2196F3',
	                    borderWidth: 1
	                }]
	            },
	            options: {
	                legend: {
	                    display: false
	                },
	                scales: {
	                    yAxes: [{
	                        ticks: {
	                            beginAtZero: true
	                        }
	                    }]
	                }
	            }
	        });
	    }

	    /**
	     * Bar Chart
	     */
	    var barChart = $('#bar-chart');

	    if (barChart.length > 0) {
	        new Chart(barChart, {
	            type: 'bar',
	            data: {
	                labels: ["Red", "Blue", "Cyan", "Green", "Purple", "Orange"],
	                datasets: [{
	                    label: '# of Votes',
	                    data: [12, 19, 3, 5, 2, 3],
	                    backgroundColor: [
	                        'rgba(244, 88, 70, 0.5)',
	                        'rgba(33, 150, 243, 0.5)',
	                        'rgba(0, 188, 212, 0.5)',
	                        'rgba(42, 185, 127, 0.5)',
	                        'rgba(156, 39, 176, 0.5)',
	                        'rgba(253, 178, 68, 0.5)'
	                    ],
	                    borderColor: [
	                        '#F45846',
	                        '#2196F3',
	                        '#00BCD4',
	                        '#2ab97f',
	                        '#9C27B0',
	                        '#fdb244'
	                    ],
	                    borderWidth: 1
	                }]
	            },
	            options: {
	                legend: {
	                    display: false
	                },
	                scales: {
	                    yAxes: [{
	                        ticks: {
	                            beginAtZero: true
	                        }
	                    }]
	                }
	            }
	        });
	    }

	    /**
	     * Radar Chart
	     */
	    var radarChart = $('#radar-chart');

	    if (radarChart.length > 0) {
	        new Chart(radarChart, {
	            type: 'radar',
	            data: {
	                labels: ["Red", "Blue", "Cyan", "Green", "Purple", "Orange"],
	                datasets: [{
	                    label: 'Users',
	                    data: [100, 45, 87, 50, 77, 20],
	                    backgroundColor: 'rgba(244, 88, 70, 0.5)',
	                    borderColor: '#F45846',
	                    borderWidth: 1
	                }, {
	                    label: 'Votes',
	                    data: [23, 55, 75, 54, 95, 100],
	                    backgroundColor: 'rgba(33, 150, 243, 0.5)',
	                    borderColor: '#2196F3',
	                    borderWidth: 1
	                }]
	            }
	        });
	    }

	    /**
	     * Pie Chart
	     */
	    var pieChart = $('#pie-chart');

	    if (pieChart.length > 0) {
	        new Chart(pieChart, {
	            type: 'pie',
	            data: {
	                labels: ["Red", "Blue", "Cyan", "Green", "Purple", "Orange"],
	                datasets: [{
	                    label: 'Users',
	                    data: [100, 45, 87, 50, 77, 20],
	                    backgroundColor: [
	                        'rgba(244, 88, 70, 0.5)',
	                        'rgba(33, 150, 243, 0.5)',
	                        'rgba(0, 188, 212, 0.5)',
	                        'rgba(42, 185, 127, 0.5)',
	                        'rgba(156, 39, 176, 0.5)',
	                        'rgba(253, 178, 68, 0.5)'
	                    ],
	                    borderColor: [
	                        'rgba(244, 88, 70, 0.5)',
	                        'rgba(33, 150, 243, 0.5)',
	                        'rgba(0, 188, 212, 0.5)',
	                        'rgba(42, 185, 127, 0.5)',
	                        'rgba(156, 39, 176, 0.5)',
	                        'rgba(253, 178, 68, 0.5)'
	                    ],
	                    borderWidth: 1
	                }]
	            }
	        });
	    }

	    /**
	     * Widget Line Chart
	     */
	    var wLineChart = $('.widget-line-chart');

	    wLineChart.each(function (index, canvas) {
	        new Chart(canvas, {
	            type: 'line',
	            data: {
	                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	                datasets: [{
	                    label: 'Users',
	                    data: [12, 19, 3, 5, 2, 3, 20, 33, 23, 12, 33, 10],
	                    borderColor: '#fff',
	                    borderWidth: 1,
	                    fill: false,
	                }]
	            },
	            options: {
	                legend: {
	                    display: false
	                },
	                scales: {
	                    yAxes: [{
	                        ticks: {
	                            beginAtZero: true,
	                            display: false,
	                        },
	                        gridLines: {
	                            display: false,
	                            drawBorder: false,
	                        }
	                    }],
	                    xAxes: [{
	                        ticks: {
	                            display: false,
	                        },
	                        gridLines: {
	                            display: false,
	                            drawBorder: false,
	                        }
	                    }]
	                }
	            }
	        });
	    });
	});

</script>

<script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/dataTables.select.min.js"></script>


