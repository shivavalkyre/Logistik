<?php  
    require_once('koneksi.php');

    $id=$_REQUEST['id'];
    $tgl_saldo = $_REQUEST['tgl_saldo'];
    $kd_barang= $_REQUEST['kd_barang'];
    $qty= $_REQUEST['qty'];
    $unit_price = $_REQUEST['unit_price'];
    $lokasi = $_REQUEST['lokasi'];

    $date=date_create($tgl_saldo);
    $tgl_baru=date_format($date,"Y-m-d");

    $sql="update tbl_saldo_awal set tgl_saldo='$tgl_baru',kd_barang='$kd_barang',qty='$qty',unit_price='$unit_price',lokasi='$lokasi' WHERE id=$id";
    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
        'id' => $id,
        'tgl_saldo' => $tgl_baru,
        'kd_barang' => $kd_barang,
        'qty' => $qty,
        'unit_price' => $unit_price,
        'lokasi' => $lokasi,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>