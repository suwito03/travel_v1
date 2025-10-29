<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.all.min.js"); ?>" ></script>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="panel-title">Percobaan Login ke dalam Applikasi
				</p>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 table-responsive">
						<table id="manage_all" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th> No</th>
								<th> Alamat IP</th>
								<th> Nama Pengguna</th>
								<th> Waktu Percobaan</th>
								<th> Aksi</th>
							</tr>
							</thead>

							  <?php  
                                     $n=1;
                                     foreach($dtlogin as $row):
                          
                                     ?>    
                                        <tr>
                                           <td><?php echo $n; $n++;?></td>
                                           <td><?=$row['ip_address'];?></td>
                                           <td><?=$row['login'];?></td>
                                           <td><?php echo date("d-M-Y H:i:s",$row['time']);?></td>
                                           <td><button type="button" class="btn btn-warning" id="btndelete" onclick="hapuslogin('<?php echo $row['id']?>')">Hapus</button></td>
                                        </tr>
                                         <?php endforeach;?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<style>

</style>

<script>

// 	function reload_table() {
// 		table.ajax.reload(null, false); //reload datatable ajax
// 	}


// 	function create() {

// 		$("#modal_data").empty();
// 		$('.modal-title').text('Add New User'); // Set Title to Bootstrap modal title

// 		$.ajax({
// 			type: 'POST',
// 			url: BASE_URL + 'admin/user/create_form',
// 			success: function (msg) {
// 				$("#modal_data").html(msg);
// 				$('#modalUser').modal('show'); // show bootstrap modal
// 			},
// 			error: function (result) {
// 				$("#modal_data").html("Sorry Cannot Load Data");
// 			}
// 		});

// 	}

</script>
<script type="text/javascript">
	$(document).ready(function () {
		
	});

	function hapuslogin($id) 
	{
		//alert($id);
		 window.location.href = '<?php echo site_url("admin/user/deletepercobaans");?>/'+$id;
	}
</script>
