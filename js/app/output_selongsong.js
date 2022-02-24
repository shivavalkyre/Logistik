$(function(){
    $('#dg').edatagrid({
        url: '../control/get_output_chitosan.php',
        saveUrl: '../control/save_output_chitosan.php',
        updateUrl: '../control/update_output_chitosan.php',
        destroyUrl: '../control/delete_output_chitosan.php'
        
    });
   
});

