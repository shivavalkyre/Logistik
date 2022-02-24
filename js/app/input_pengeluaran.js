$(function(){
    
    $('#dg').edatagrid({
        url: '../control/get_input_pengeluaran.php',
        saveUrl: '../control/save_input_pengeluaran.php',
        updateUrl: '../control/update_input_pengeluaran.php',
        destroyUrl: '../control/delete_input_pengeluaran.php',
       
    });

 
			
});