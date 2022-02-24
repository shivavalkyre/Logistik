<?php  
    require_once('koneksi.php');

    $satuan= $_REQUEST['satuan'];

    $sql="insert into tbl_satuan_barang (satuan) values('$satuan')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'satuan' => $satuan,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>