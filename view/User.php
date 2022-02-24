<html>
<head>
 <link rel="stylesheet" type="text/css" href="../themes/metro/easyui.css">
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
            url="../control/get_user.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="username" width="50">Userame</th>
                <th field="password" width="50">Password</th>
                <th field="level" width="50">Level</th>
                <th field="role" width="50">Role</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="username" class="easyui-textbox" required="true" label="Username:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id= "password" name="password" class="easyui-textbox" required="true" label="Password:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <!-- <input name="level" class="easyui-textbox" required="true" label="Level:" style="width:100%"> -->
                <select name="nama_mitra" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 200,
                    idField: 'level',
                    textField: 'level',
                    url: '../control/get_level_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'level',title:'Level',width:80},
                    ]],
                    fitColumns: true,
                    required:true,
                    label: 'Level:',
                    labelPosition: 'left'
                ">
            </select>
            </div>
            <div style="margin-bottom:10px">
                <!-- <input name="role" class="easyui-textbox" required="true" validType="Role" label="Role:" style="width:100%"> -->
                <select name="nama_mitra" class="easyui-combogrid" style="width:100%" data-options="
                    panelWidth: 200,
                    idField: 'role',
                    textField: 'role',
                    url: '../control/get_role_combo.php',
                    method: 'get',
                    columns: [[
                        {field:'role',title:'Role',width:80},
                    ]],
                    fitColumns: true,
                    required:true,
                    label: 'Role:',
                    labelPosition: 'left'
                ">
            </select>
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = '../control/save_user.php';
            $('#password').textbox({readonly:false});
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#fm').form('load',row);
                url = '../control/update_user.php?id='+row.id;
                $('#password').textbox({readonly:true});
            }
        }
        function saveUser(){
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
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
                    if (r){
                        $.post('../control/delete_user.php',{id:row.id},function(result){
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