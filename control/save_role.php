<?php  
    require_once('koneksi.php');

    $role = $_REQUEST['role'];

    $sql="insert into tbl_role (role) values('$role')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'role' => $role,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>