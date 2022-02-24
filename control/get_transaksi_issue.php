<?php  
    require_once('koneksi.php');

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $offset = ($page-1)*$rows;
    
    
    $rs = pg_query($conn,"select count(*) as total from tbl_transaksi WHERE tran_type=2");
    $row = pg_fetch_row($rs);
    $result["total"] = $row[0];

    $rs = pg_query($conn,"select id,to_char(tanggal,'DD-MM-YYYY') tanggal,no_minta from tbl_transaksi WHERE tran_type=2 ORDER BY id asc limit $rows offset $offset");
     
    $items = array();
    while($row = pg_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);

?>