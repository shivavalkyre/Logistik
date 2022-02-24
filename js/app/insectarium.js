$(function(){
    $('#dg').edatagrid({
        url: '../control/get_insectarium.php',
        saveUrl: '../control/save_insectarium.php',
        updateUrl: '../control/update_insectarium.php',
        destroyUrl: '../control/delete_insectarium.php'
    });
});