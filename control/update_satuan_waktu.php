<?php  
    require_once('koneksi.php');

    $id = $_REQUEST['id'];
    $satuan_waktu = $_REQUEST['satuan_waktu'];

    $sql="update tbl_satuan_waktu set satuan_waktu ='$satuan_waktu' WHERE id=$id";
    pg_query($conn,$sql);

    echo json_encode(array(
    'id' => $id,
	'satuan_waktu' => $satuan_waktu,
        )
	);

?>