<?php  
    require_once('koneksi.php');

    $transaksi_id = $_POST['transaksi_id'];
    $kd_barang = $_POST['kd_barang'];
    $nama_barang =$_POST['nama_barang'];
    $satuan= $_POST['satuan'];
    $qty= $_POST['qty'];

    //$dt= date_create($tgl_receive);
    //$tgl_penerimaan=date_format($dt,"Y/m/d");

    $sql="insert into tbl_transaksi_detail (transaksi_id,kd_barang,nama_barang,satuan,qty) values($transaksi_id,'$kd_barang','$nama_barang','$satuan','$qty')";
    $insert_id=pg_query($conn,$sql);
   
    if ($insert_id)
    {
        //$row = pg_fetch_row($insert_id);
        //echo($row['0']);
        echo json_encode(array(
        'transaksi_id' => $transaksi_id,
        'kd_barang' => $kd_barang,
        'nama_barang' => $nama_barang,
        'satuan' => $satuan,
        'qty' => $qty,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>