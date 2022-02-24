<?php  
    require_once('koneksi.php');

    $satuan_waktu= $_REQUEST['satuan_waktu'];

    $sql="insert into tbl_satuan_waktu (satuan_waktu) values('$satuan_waktu')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'satuan_waktu' => $satuan_waktu,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>