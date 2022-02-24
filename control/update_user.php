<?php  
    require_once('koneksi.php');

    $id = $_REQUEST['id'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $level = $_REQUEST['level'];
    $role = $_REQUEST['role'];

    $sql="update tbl_user set username ='$username',password='$password',level='$level',role='$role' WHERE id=$id";
    pg_query($conn,$sql);

    echo json_encode(array(
    'id' => $id,
	'role' => $role,
    'username' => $username,
    'password' => $password,
    'level' => $level,
    'role' => $role,
        )
	);

?>