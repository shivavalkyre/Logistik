<?php
//include 'koneksi.php';
require_once('koneksi.php');

header("Access-Control-Allow-Origin: http://localhost/logistik/index.php");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if(isset($_POST['uname']) &&  isset($_POST['upass']))
{
   
    $uname = $_POST['uname'];
    $upass = md5($_POST['upass']);
    //echo($uname);
    //echo($upass);

    $where = "username ='$uname' and password='$upass'";
    $sql = 'select * from tbl_user where ' . $where;
    //echo ($sql);
    $rs = pg_query($conn,$sql);
    $rowCheck = pg_num_rows($rs);
    
    $arch = pg_fetch_array($rs, NULL, PGSQL_ASSOC);

	if($rowCheck>0){
        session_start();
        $_SESSION['username']=$arch['username'];
        $_SESSION['id']=$arch['id'];
		$_SESSION['level']=$arch['level'];
		$_SESSION['sukses']="Sukses Login";

        http_response_code(200);
        echo json_encode(
            array("message" => "success")
        );
    }else{
        http_response_code(404);
        echo json_encode(
           array("message" => "Data Not Found")
       );
    }
}

?>

