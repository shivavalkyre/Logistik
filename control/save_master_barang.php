<?php  
    require_once('koneksi.php');

    $kd_kategori = $_REQUEST['kd_kategori'];
    $kd_barang   = $_REQUEST['kd_barang'];
    $nama_barang  = $_REQUEST['nama_barang'];
    $satuan  = $_REQUEST['satuan'];
    $lokasi   = $_REQUEST['lokasi'];
    $jenis   = $_REQUEST['jenis'];
    $masa_simpan  = $_REQUEST['masa_simpan'];
    $satuan_masa_simpan   = $_REQUEST['satuan_masa_simpan'];
    $masa_pakai   = $_REQUEST['masa_pakai'];
    $satuan_masa_pakai   = $_REQUEST['satuan_masa_pakai'];

    $sql="insert into tbl_barang (kd_kategori,kd_barang,nama_barang,satuan,lokasi,jenis,masa_simpan,satuan_masa_simpan,masa_pakai,satuan_masa_pakai) values('$kd_kategori','$kd_barang','$nama_barang','$satuan','$lokasi','$jenis','$masa_simpan','$satuan_masa_simpan','$masa_pakai','$satuan_masa_pakai')";

    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
            'kd_kategori' => $kd_kategori,
            'kd_barang' => $kd_barang,
            'nama_barang' => $nama_barang,
            'satuan' =>$satuan,
            'lokasi'=>$lokasi,
            'jenis'=>$jenis,
            'masa_simpan'=>$masa_simpan,
            'satuan_masa_simpan'=>$satuan_masa_simpan,
            'masa_pakai'=>$masa_pakai,
            'satuan_masa_pakai'=>$satuan_masa_pakai,
            )
        );
    }

    // echo json_encode(array(
    // 'id' => $insert_id,
	// 'level' => $level,
    //     )
	// );

?>