$(function(){
    $('#dg').edatagrid({
        url: '../control/get_input_chitosan.php',
        saveUrl: '../control/save_input_chitosan.php',
        updateUrl: '../control/update_input_chitosan.php',
        destroyUrl: '../control/delete_input_chitosan.php'
    });
});

