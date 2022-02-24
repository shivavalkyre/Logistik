<?php  
    require_once('koneksi.php');

    $level = $_REQUEST['level'];

    $sql="insert into tbl_level (level) values('$level')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'level' => $level,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>