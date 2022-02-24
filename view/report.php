<html>
<head>
 <link rel="stylesheet" type="text/css" href="../themes/material-teal/easyui.css">
 <link rel="stylesheet" type="text/css" href="../themes/icon.css">
 <link rel="stylesheet" type="text/css" href="../css/demo.css">
 <script type="text/javascript" src="../js/jquery.min.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
 <script type="text/javascript" src="../js/jquery.edatagrid.js"></script>
 
 <style>
.datagrid-row{
    height:35px;
}
</style> 
</head>
<body>
<table id="dg" title="Laporan Stok Akhir" class="easyui-datagrid" style="width:100%;height:350px"
            url="../control/get_last_stock_info.php"
             pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true" toolbar="#tb">
        <thead>
            <tr>
                <th  field="kd_barang"  width="50">Kode Barang</th>
                <th  field="nama_barang" width="50">Nama Barang</th>
                <th align="center" field="satuan" width="50">Satuan</th>
                <th align="center" field="stok_awal" width="50">Stok Awal</th>
                <th align="center" field="penerimaan" width="50">Penerimaan</th>
                <th align="center" field="pengambilan" width="50">Pengambilan</th>
                <th align="center" field="stok_akhir" width="50">Stok Akhir</th>
            </tr>
        </thead>
    </table>
    <div id="tb" style="padding:2px 5px;">
        Dari: <input id="dari" class="easyui-datebox" style="width:110px" data-options="formatter:myformatter,parser:myparser">
        Sampai: <input id="sampai" class="easyui-datebox" style="width:110px" data-options="formatter:myformatter,parser:myparser">
        <input id="cari" class="easyui-textbox" prompt="Cari" style="width:150px">
        <a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="doSearch()">Search</a>
    </div>
    <script>
    
function myformatter(date){ 
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(d,m-1,y);
            } else {
                return new Date();
            }
        }

		function doSearch(){
            var dari = $('#dari').datebox('getValue');
            var sampai = $('#sampai').datebox('getValue');
            var cari = $('#cari').textbox('getValue');

            if (dari.length>0 && sampai.length>0 && cari.length===0){
                $('#dg').datagrid({
                    url:'../control/get_last_stock_info_selected.php?dari='+dari+"&sampai="+sampai+"&cari="+cari
                });
            }

            if (dari.length===0 && sampai.length===0 && cari.length===0){
                $('#dg').datagrid({
                    url:'../control/get_last_stock_info.php'
                });
            }
            // var string="dari="+dari+"&sampai="+sampai;
            // $.ajax({
            //     type	: 'POST',
            //     url		: "../control/get_last_stok_info_selected.php",
            //     data	: string,
            //     cache	: false,
            //     success	: function(data){

            //     }
            // });
        }

    </script>
</body>
</html>