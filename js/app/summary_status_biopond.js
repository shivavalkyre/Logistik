$(function(){
    $('#dg').edatagrid({
        url: '../control/get_summary_status_biopond.php',
        // saveUrl: '../control/save_input_sampah.php',
        // updateUrl: '../control/update_input_sampah.php',
        // destroyUrl: '../control/delete_input_sampah.php'
    });
});