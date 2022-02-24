$(function(){
    $('#dg').edatagrid({
        url: '../control/get_jenis_penjualan.php',
        saveUrl: '../control/save_jenis_penjualan.php',
        updateUrl: '../control/update_jenis_penjualan.php',
        destroyUrl: '../control/delete_jenis_penjualan.php'
    });
});