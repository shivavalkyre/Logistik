

<html>
<head>
 <link rel="stylesheet" type="text/css" href="../themes/material-teal/easyui.css">
 <link rel="stylesheet" type="text/css" href="../themes/icon.css">
 <link rel="stylesheet" type="text/css" href="../css/demo.css">
 <!-- <link rel="stylesheet" type="text/css" href="../themes/mobile.css"> -->
 <link rel="stylesheet" type="text/css" href="../themes/color.css">
 
 <script type="text/javascript" src="../js/jquery.min.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
 <script type="text/javascript" src="../js/jquery.edatagrid.js"></script>
 <script type="text/javascript" src="../js/jquery.easyui.mobile.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

 <link rel="stylesheet" href="../css/w3.css">
 <script type="text/javascript" src="../js/app/user.js"></script>
 
 <style>
.datagrid-row{
    height:35px;
}
.hidden{display: none;}
.show{display: block;}
</style> 
</head>
<body>
<div style="text-align:right;margin-bottom:10px;">
<a  href="#" class="easyui-linkbutton" onclick="openDialog('tambah');"  style="height:35px;" data-options="iconCls:'icon-add'" iconAlign="right" >Tambah Transaksi</a>
</div>
<table id="dg"  class="easyui-datagrid" style="width:100%;height:350px"
            url="../control/get_transaksi_issue.php"
             pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="id" hidden width="50">ID</th>
                <th field="tanggal" width="50">Tanggal</th>
                <th field="no_minta" width="50">No Permintaan</th>
                <th align="center" data-options="field:'openfile',formatter:openfile">Action</th>
            </tr>
        </thead>
    </table>
    <div id="dd" style="width:100%;height:100%;max-width:100%;padding:10px" data-options="buttons:'#bb',closed:true,closeable:true">

    </div>
    
           
<script>


    $('#dd').dialog('close');

    function openDialog(title,id){
        

        
        if (title=='tambah'){
            $('#dd').dialog({
        title: 'Tambah Permintaan Barang',
        closed: false,
        closable:true,
        cache: false,
        href: 'Tambah Permintaan Barang.php?id='+0+"&title=tambah",
        modal: true,
        onBeforeClose:function(){
            $('#dg').datagrid('reload');
        },
    });
        }else{
            if (id!== 'undifined'){
            $('#dd').dialog({
        title: 'Ubah Permintaan Barang',
        closed: false,
        closable:true,
        cache: false,
        href: 'Tambah Permintaan Barang.php?id='+id+"&title=ubah",
        modal: true,
        onBeforeClose:function(){
            $('#dg').datagrid('reload');
        },
    });
        }
    }
        //alert('here');
        
    //$('#dd').dialog('refresh', 'new_content.php');
    }

    function openfile(val,row){
		//alert(row.assetno);
		var transaksi_id = row.id;
        var tanggal =row.tanggal;
        var no_penerimaan= row.no_terima;
        var no_bast=row.no_bast;


        // var myData = {id:transaksi_id,tanggal:tanggal,no_penerimaan:no_penerimaan,no_bast:no_bast};
       
        //alert(transaksi_id);
		// var no_barcode = row.no_barcode;
		//alert(no_barcode);
        //return '<a href=javascript:window.open("'  + url + row.norekaman + ".pdf" +'","Test","directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no","width=700,height=700,top='+ top +',left=' +left +'")><button>Open File</button></a>';
		//return '<button onclick="QRGenerator(`'+no_barcode+'`);" ><i class="fa fa-print"></i></button><span><button onclick="view_detail();"><i class="fa fa-file"></i></button>';
		return '<button class="w3-button w3-round w3-blue"><i class="fa fa-print"></i></button> <button onclick="EditRow(`'+ transaksi_id+'`)" class="w3-button w3-round w3-teal"><i class="fa fa-edit"></i></button> <button class="w3-button w3-round w3-red"><i class="fa fa-trash"></i></button>';
    }

    function EditRow(data){
        //alert(id);
        console.log(data);
        openDialog('ubah',data);
        // set value
        //var row = $('#dg').datagrid('getSelected');
        //alert(row.tanggal);
        
    }
		
</script>

    
</body>
</html>