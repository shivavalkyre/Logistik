<?php  
    require_once('koneksi.php');

    // $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    // $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    // $offset = ($page-1)*$rows;
    
    
    // $rs = pg_query($conn,"select count(*) as total from last_stockinfo");
    // $row = pg_fetch_row($rs);
    // $result["total"] = $row[0];

    // $rs = pg_query($conn,"select * from last_stockinfo limit $rows offset $offset");
     
    // $items = array();
    // while($row = pg_fetch_object($rs)){
    // array_push($items, $row);
    // }
    // $result["rows"] = $items;
     
    // echo json_encode($result);
    $dari=$_GET['dari'];
    $sampai=$_GET['sampai'];
    $cari=$_GET['cari'];


    if (strlen($dari)>0 && strlen($sampai)>0 && strlen($cari)==0){

        $tgl1 = date_create($dari);
        $dt1  = date_format($tgl1,"Y-m-d");

        $tgl2 =  date_create($sampai);
        $dt2  =  date_format($tgl2,"Y-m-d");

        $rs = pg_query($conn,"CALL fill_prev_tran_issue ('$dt1')");
        $rs = pg_query($conn,"CALL fill_prev_tran_receive ('$dt1')");


        $rs = pg_query($conn,"CALL fill_tran_issue('$dt1','$dt2')");
        $rs = pg_query($conn,"CALL fill_tran_receive('$dt1','$dt2')");

        

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $offset = ($page-1)*$rows;

        $rs = pg_query($conn,"select count(*) as total from prev_stok_info_sum");
        $row = pg_fetch_row($rs);
        $result["total"] = $row[0];

        $rs = pg_query($conn,"select * from prev_stok_info_sum limit $rows offset $offset");
        
        $items = array();
        while($row = pg_fetch_object($rs)){
        array_push($items, $row);
        }
        $result["rows"] = $items;
        
        echo json_encode($result);



    }
        


?>