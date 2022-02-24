<?php  
    require_once('koneksi.php');

    $tgl_receive = $_POST['tgl_penerimaan'];
    $no_penerimaan =$_POST['no_penerimaan'];
    $no_bast= $_POST['no_bast'];
    $user_id= $_POST['user_id'];

    $dt= date_create($tgl_receive);
    $tgl_penerimaan=date_format($dt,"Y/m/d");

    $sql="insert into tbl_transaksi (tran_type,tanggal,no_terima,no_bast,requestor_id) values(1,'$tgl_penerimaan','$no_penerimaan','$no_bast','$user_id') RETURNING id";
    $insert_id=pg_query($conn,$sql);
   
    if ($insert_id)
    {
        $row = pg_fetch_row($insert_id);
        echo($row['0']);
        // echo json_encode(array(
        // 'tgl_penerimaan' => $tgl_penerimaan,
        // 'no_penerimaan' => $no_penerimaan,
        // 'no_bast' => $no_bast,
        // 'requestor_id' => $user_id,
        //     )
        // );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>