$(function(){
    $('#dg').edatagrid({
        url: '../control/get_summary_input_sampah.php',
        // saveUrl: '../control/save_input_sampah.php',
        // updateUrl: '../control/update_input_sampah.php',
        // destroyUrl: '../control/delete_input_sampah.php'
    });

    $('#btn_search').bind('click', function(){
        //alert('easyui');
        var tgl_from = $('#tgl_from').datebox('getValue');
        var tgl_to = $('#tgl_to').datebox('getValue');
        var supplier = $('#supplier').combogrid('getValue');
        //alert(tgl_from +' ' + tgl_to+ ' ' + supplier);
        //alert(supplier);
        //alert (tgl_from);
        //alert(tgl_from.length);
        if (tgl_from.length>0 && tgl_to.length>0  && supplier.length>0 ) {
            //alert ('here');
            $('#dg').edatagrid({
                url: '../control/get_summary_input_sampah_filter.php?from='+tgl_from+'&to='+tgl_to+'&supplier='+supplier,
            });
        }
        else if (tgl_from.length>0 && tgl_to.length>0  && supplier.length==0 ) {
            //alert ('here1');
            $('#dg').edatagrid({
                url: '../control/get_summary_input_sampah_filter.php?from='+tgl_from+'&to='+tgl_to+'&supplier='+supplier,
            });
        }
        else if(tgl_from.length==0 && tgl_to.length==0  && supplier.length>0){
            $('#dg').edatagrid({
                url: '../control/get_summary_input_sampah_filter.php?from='+tgl_from+'&to='+tgl_to+'&supplier='+supplier,
            });
        }
        else
        {
            //alert ('here2');
            $('#dg').edatagrid({
                url: '../control/get_summary_input_sampah.php',
            });
        }
      
    });
});

