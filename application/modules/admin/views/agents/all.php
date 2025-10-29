<?php
if ( $all ) {

	$no   = 1;
	$data = array();

	foreach ( $all as $value ) {

		$row = array();

		$id     = $value['id'];
        $level =  $value['group_name'];
        $sta =  $value['id']."-".$value['active'];
		$status = $value['active'] == '1' ? "<strong style='color: #00bc1e; text-transform: capitalize;'>Aktif</strong>" : "<strong style='color: #ff5c29; text-transform: capitalize;'>Tidak Aktif</strong>";

		$url   = base_url( $value['file_path'] );
		$image = "<img src='" . $url . "' class='img-responsive' width='30px'/>";

		$row[] = "<tr><td>" . $no ++ . "</td>";
		$row[] = "<td>" . $image . "</td>";
        $row[] = "<td>" . $value['namaagent'] . "</td>";
		$row[] = "<td>" . $value['username'] . "</td>";
		$row[] = "<td>" . $value['jenis'] . "</td>";
		$row[] = "<td>" . $status . "</td>";
        $row[] = "<td style='text-align:center;'><a data-toggle='tooltip' class='btn btn-primary btn-xs edit'  id='" . $id . "' title='Edit'> <i class='fa fa-pencil-square-o'></i> </a>
				  <a data-toggle='tooltip' class='btn btn-warning btn-xs  delete'  id='" . $sta . "' title='Togle Active and Inactive Account'> <i class='fa fa-toggle-off'></i> </a></td></tr> <a data-toggle='tooltip' class='btn btn-success btn-xs  reset'  id='" . $id . "' title='Reset'>Reset Password</a></td></tr>";

        $data[] = $row;
	}

} else {
	$data = "";
}
//output to json format
$output = array(
	"data" => $data,
);
echo json_encode( $output );