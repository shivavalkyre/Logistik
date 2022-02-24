<?php
 require_once('koneksi.php');
$id = intval($_REQUEST['id']);
// $deleted_at = date('Y-m-d H:i:s');
// $deleted_by = $_GET['deleted_by'];

//$sql = "UPDATE asset SET is_deleted=1,deleted_at='$deleted_at',deleted_by='$deleted_by'  WHERE id=$id;";
$sql="DELETE FROM tbl_saldo_awal WHERE id=$id";

$result= pg_query($conn,$sql);
echo json_encode(array('success'=>true));
?>