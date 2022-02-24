$(function(){
    $('#dg').edatagrid({
        url: '../control/get_laba_rugi.php',
        
    });

    $('#btn_search').bind('click', function(){
        //alert('easyui');
        var tgl_from = $('#tgl_from').datebox('getValue');
        var tgl_to = $('#tgl_to').datebox('getValue');

        if (tgl_from.length>0 && tgl_to.length>0  ) {
            //alert ('here');
            $('#dg').edatagrid({
                url: '../control/get_laba_rugi.php?from='+tgl_from+'&to='+tgl_to,
            });
        }
    });
});