<html>
<head>
 <link rel="stylesheet" type="text/css" href="../themes/metro-gray/easyui.css">
 <link rel="stylesheet" type="text/css" href="../themes/icon.css">
 <link rel="stylesheet" type="text/css" href="../css/demo.css">
 <script type="text/javascript" src="../js/jquery.min.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
 <script type="text/javascript" src="../js/jquery.edatagrid.js"></script>
 <script type="text/javascript" src="../js/app/user.js"></script>
 <style>
.datagrid-row{
    height:35px;
}
</style> 
</head>
<body>
<table id="dg"  class="easyui-datagrid" style="width:100%;height:250px"
            url="../control/get_saldo_awal.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="tgl_saldo" width="50">Tanggal Stok</th>
                <th field="kd_barang" width="50">Kode Barang</th>
                <th field="qty" width="50">Qty</th>
                <th field="unit_price" width="50">Unit Price</th>
                <th field="lokasi" width="50">Lokasi</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newData()">New Data</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editData()">Edit Data</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyData()">Remove Data</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="width:100%">
            <div style="margin-bottom:10px">
                <input  name="tgl_saldo" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser"  required="true" label="Tanggal Stok:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            <select name="kd_barang" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 400,
                    idField: 'kd_barang',
                    textField: 'nama_barang',
                    url: '../control/get_master_barang_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'kd_barang',title:'Kode Barang',width:180},
                        {field:'nama_barang',title:'Nama Barang',width:180},
                    ]],
                    fitColumns: true,
                    required:true,
                    label: 'Kode Barang:',
                    labelPosition: 'top'
                ">
            </select>
            </div>
            <div style="margin-bottom:10px">
                <input name="qty" class="easyui-textbox" required="true"  label="Qty:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="unit_price" class="easyui-textbox" required="true"  label="Unit Price:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="lokasi" class="easyui-textbox" required="true"  label="Lokasi:" labelposition="top" style="width:100%">
            </div>
        </div>
       
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveData()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">


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
		
        
        var url;
        function newData(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New Data');
            $('#fm').form('clear');
            url = '../control/save_saldo_awal.php';
            //$('#password').textbox({readonly:false});
        }
        function editData(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Data');
                $('#fm').form('load',row);
                url = '../control/update_saldo_awal.php?id='+row.id;
                //alert(url);
                //$('#password').textbox({readonly:true});
            }
        }
        function saveData(){
            $('#fm').form('submit',{
                url: url,
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    //alert(result);
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyData(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
                    if (r){
                        $.post('../control/delete_saldo_awal.php',{id:row.id},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
</body>

</html>