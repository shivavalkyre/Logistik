<?php  
    require_once('koneksi.php');

    $id = $_REQUEST['id'];
    $satuan = $_REQUEST['satuan'];

    $sql="update tbl_satuan_barang set satuan ='$satuan' WHERE id=$id";
    pg_query($conn,$sql);

    echo json_encode(array(
    'id' => $id,
	'satuan' => $satuan,
        )
	);

?>