<?php  
    require_once('koneksi.php');

    $id = $_REQUEST['id'];
    $role = $_REQUEST['role'];

    $sql="update tbl_role set role ='$role' WHERE id=$id";
    pg_query($conn,$sql);

    echo json_encode(array(
    'id' => $id,
	'role' => $role,
        )
	);

?>