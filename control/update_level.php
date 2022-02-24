<?php  
    require_once('koneksi.php');

    $id = $_REQUEST['id'];
    $level = $_REQUEST['level'];

    $sql="update tbl_level set level ='$level' WHERE id=$id";
    pg_query($conn,$sql);

    echo json_encode(array(
    'id' => $id,
	'level' => $level,
        )
	);

?>