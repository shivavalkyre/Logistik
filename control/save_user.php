<?php  
    require_once('koneksi.php');

    $username = $_REQUEST['username'];
    $password = md5($_REQUEST['password']);
    $level= $_REQUEST['level'];
    $role = $_REQUEST['role'];

    $sql="insert into tbl_user (username,password,level,role) values('$username','$password','$level','$role')";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'username' => $username,
        'password' => $password,
        'level' => $level,
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