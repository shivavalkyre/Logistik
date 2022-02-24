<html>
<head>
 <link rel="stylesheet" type="text/css" href="../themes/metro-gray/easyui.css">
 <link rel="stylesheet" type="text/css" href="../themes/icon.css">
 <link rel="stylesheet" type="text/css" href="../css/demo.css">
 <link rel="stylesheet" type="text/css" href="../themes/mobile.css">

 <script type="text/javascript" src="../js/jquery.min.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
 <script type="text/javascript" src="../js/jquery.edatagrid.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.mobile.js"></script>
 
 <script type="text/javascript" src="../js/app/user.js"></script>
 
 <style>
.datagrid-row{
    height:35px;
}
</style> 
</head>
<body>
<table id="dg"  class="easyui-datagrid" style="width:100%;height:350px"
            url="../control/get_master_barang.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="kd_kategori" width="50">Kategori Barang</th>
                <th field="kd_barang" width="50">Kode Barang</th>
                <th field="nama_barang" width="50">Nama Barang</th>
                <th field="satuan" width="50">Satuan</th>
                <th field="lokasi" width="50">Lokasi</th>
                <th field="jenis" width="50">Jenis</th>
                <th field="masa_simpan" width="50">Masa Simpan</th>
                <th field="satuan_masa_simpan" width="50">Satuan Masa Simpan</th>
                <th field="masa_pakai" width="50">Masa Simpan</th>
                <th field="satuan_masa_pakai" width="50">Satuan Masa Pakai</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newData()">New Data</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editData()">Edit Data</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyData()">Remove Data</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:800px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="width:50%">
            <div style="margin-bottom:10px">
                <!-- <input name="kd_kategori" class="easyui-textbox" required="true" label="Kode Kategori:" labelposition="top" style="width:100%"> -->
                <select name="kd_kategori" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 400,
                    idField: 'kd_kategori',
                    textField: 'kategori',
                    url: '../control/get_kategori_barang_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'kd_kategori',title:'Kode Kategori',width:90},
                        {field:'kategori',title:'Kategori',width:180},
                    ]],
                    fitColumns: true,
                    required:true,
                    label: 'Kategori:',
                    labelPosition: 'top'
                ">
            </select>
            </div>
            <div style="margin-bottom:10px">
                <input  name="kd_barang" class="easyui-textbox" required="true" label="Kode Barang:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nama_barang" class="easyui-textbox" required="true" label="Nama Barang:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <!-- <input name="satuan" class="easyui-textbox" required="true"  label="Satuan:" labelposition="top" style="width:100%"> -->
                <select name="satuan" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 200,
                    idField: 'satuan',
                    textField: 'satuan',
                    url: '../control/get_satuan_barang_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'satuan',title:'Satuan',width:180},
                    ]],
                    fitColumns: true,
                    required:true,
                    label: 'Satuan:',
                    labelPosition: 'top'
                ">
            </select>
            </div>
            <div style="margin-bottom:10px">
                <input name="lokasi" class="easyui-textbox" required="true"  label="Lokasi:" labelposition="top" style="width:100%">
            </div>
        </div>
        <div style="margin-top:-325px;margin-left:360px;width:50%">
            <div style="margin-bottom:10px">
                <input name="jenis" class="easyui-textbox" required="true"  label="Jenis:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="masa_simpan" class="easyui-textbox"   label="Masa Simpan:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <!-- <input name="satuan_masa_simpan" class="easyui-textbox"   label="Satuan Masa Simpan:" labelposition="top" style="width:100%"> -->
                <select name="satuan_masa_simpan" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 200,
                    idField: 'satuan_waktu',
                    textField: 'satuan_waktu',
                    url: '../control/get_satuan_waktu_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'satuan_waktu',title:'Satuan Waktu',width:180},
                    ]],
                    fitColumns: true,
                    required:false,
                    label: 'Satuan Masa Simpan:',
                    labelPosition: 'top'
                ">
            </select>
            </div>
            <div style="margin-bottom:10px">
                <input name="masa_pakai" class="easyui-textbox"   label="Masa Pakai:" labelposition="top" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <!-- <input name="satuan_masa_pakai" class="easyui-textbox"  label="Satuan Masa Pakai:" labelposition="top" style="width:100%"> -->
                <select name="satuan_masa_pakai" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 200,
                    idField: 'satuan_waktu',
                    textField: 'satuan_waktu',
                    url: '../control/get_satuan_waktu_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'satuan_waktu',title:'Satuan Waktu',width:180},
                    ]],
                    fitColumns: true,
                    required:false,
                    label: 'Satuan Masa Pakai:',
                    labelPosition: 'top'
                ">
            </select>
            </div>
        </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveData()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newData(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New Data');
            $('#fm').form('clear');
            url = '../control/save_master_barang.php';
            //$('#password').textbox({readonly:false});
        }
        function editData(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Data');
                $('#fm').form('load',row);
                url = '../control/update_master_barang.php?id='+row.id;
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
                        $.post('../control/delete_master_barang.php',{id:row.id},function(result){
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