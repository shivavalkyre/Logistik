<?php  
    require_once('koneksi.php');

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $offset = ($page-1)*$rows;
    
    
    $rs = pg_query($conn,"select count(*) as total from tbl_saldo_awal");
    $row = pg_fetch_row($rs);
    $result["total"] = $row[0];

    $rs = pg_query($conn,"select id,to_char(tgl_saldo,'dd-mm-yyyy') tgl_saldo,kd_barang,qty,unit_price,lokasi from tbl_saldo_awal limit $rows offset $offset");
     
    $items = array();
    while($row = pg_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);

?>