<?php  
    require_once('koneksi.php');

    $kd_kategori = $_REQUEST['kd_kategori'];
    $kategori = $_REQUEST['kategori'];

    $sql="insert into tbl_kategori_barang (kd_kategori,kategori) values('$kd_kategori','$kategori')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'kd_kategori' => $kd_kategori,
        'kategori' => $kategori,
        
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>