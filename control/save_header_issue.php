<?php  
    require_once('koneksi.php');

    $tgl_issue = $_POST['tgl_permintaan'];
    $no_permintaan =$_POST['no_permintaan'];
    // $no_bast= $_POST['no_bast'];
    $user_id= $_POST['user_id'];

    $dt= date_create($tgl_issue);
    $tgl_permintaan=date_format($dt,"Y/m/d");

    $sql="insert into tbl_transaksi (tran_type,tanggal,no_minta,requestor_id) values(2,'$tgl_permintaan','$no_permintaan','$user_id') RETURNING id";
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