<?php  
    require_once('koneksi.php');
    $id = $_REQUEST['id'];
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

    $sql="update tbl_barang set kd_kategori='$kd_kategori',kd_barang='$kd_barang',nama_barang='$nama_barang',satuan='$satuan',lokasi='$lokasi',jenis='$jenis',masa_simpan='$masa_simpan',satuan_masa_simpan='$satuan_masa_simpan',masa_pakai='$masa_pakai',satuan_masa_pakai='$satuan_masa_pakai' WHERE id=$id";

    $insert_id=pg_query($conn,$sql);
    
    if ($insert_id)
    {
        echo json_encode(array(
            'id' => $id,
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