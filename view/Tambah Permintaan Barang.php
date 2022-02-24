<?php
session_start();
if (isset($_SESSION['username']) && isset ($_SESSION['level'])){
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$user_id = $_SESSION['id'];
// get version
$transaksi_id = $_GET['id'];
$title=$_GET['title'];
//echo($transaksi_id);
}
?>
<div id="p" class="easyui-panel" style="width:100%;height:100%;padding:10px;">
<div style="margin:20px 0 10px 0;">
        <div style="margin-bottom:20px">
            <input id="tgl_permintaan" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser" prompt="Tanggal Permintaan" style="width:18%;">
            <input id="no_permintaan" class="easyui-textbox" prompt="Nomor Permintaan" style="width:18%;">
            <!-- <input id="no_bast" class="easyui-textbox" prompt="No BAST" style="width:18%;"> -->
        </div>
</div>

<table id="dg1" title="" class="easyui-datagrid" style="width:100%;height:250px"
           
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="false" singleSelect="true">
        <thead>
            <tr>
				<th field="id" hidden width="50">ID</th>
                <th field="kd_barang"  width="150" editor="{type:'combogrid',options:{required:true,panelWidth:480,idField:'kd_barang',textField:'kd_barang',mode:'remote',url:'../control/get_product_price_filter_by_supplier.php',columns: [[
{field:'kd_barang',title:'Kode Barang',width:100},{field:'nama_barang',title:'Nama Barang',width:250},{field:'satuan',title:'Satuan',width:80}

]],onBeforeLoad:onBeforeLoad,onSelect: onSelectGrid,
	onShowPanel: onShowPanel,
	onHidePanel: onHidePanel,}}">Kode Barang</th>
				<th field="nama_barang" width="400" editor="{type:'validatebox',options:{readonly:true}}">Nama Barang</th>
				<th field="satuan" width="90" editor="{type:'validatebox',options:{readonly:true}}">Satuan</th>
                <th field="qty" width="50" editor="{type:'validatebox',options:{required:true}}">Qty</th>
                <!-- <th field="price" width="50" formatter="formatPrice" editor="{type:'validatebox',options:{required:true}}">Price</th>
				<th field="amount" width="50" formatter="formatPrice" editor="{type:'validatebox',options:{readonly:true}}">Amount</th> -->
              
            </tr>
        </thead>
    </table>
	<div align="right" style="margin:10 0 0">
		 <a href="#" id="btnSave" class="easyui-linkbutton c1" style="width:120px;height:35px">Save</a>
	</div>


    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="javascript:$('#dg1').edatagrid('addRow')">Tambah</a>
		<a id="hapus_btn"  class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="hapus_detail_selected();">Hapus</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onClick="javascript:$('#dg1').edatagrid('cancelRow')">Batal</a>
    </div>
    <script type="text/javascript">
			var cbg=null;
			var tb=null;
			var customer;
			var title

	$(document).ready( function () {
		$('#hapus_btn').hide();
  		//SomeFunction();
		  var transaksi_id = '<?php echo"$transaksi_id"?>';
		  title = '<?php echo"$title"?>';
		  //alert(transaksi_id);
			if (title==="ubah"){
				var string = "transaksi_id="+transaksi_id;
			//alert (string);	
			$.ajax({
			type	: 'POST',
			url		: "../control/get_transaksi_issue_selected.php",
			data	: string,
			cache	: false,
			success	: function(data){
				//alert(data);
				var obj = JSON.parse(data);
				console.log(obj);
				console.log(obj["rows"][0].tanggal);
				$('#tgl_permintaan').datebox('setValue',obj["rows"][0].tanggal);
				$('#no_permintaan').textbox('setValue',obj["rows"][0].no_minta);
				// $('#no_bast').textbox('setValue',obj["rows"][0].no_bast);
				//console.log();
				$('#hapus_btn').show();
				$('#dg1').datagrid({
					url:'../control/get_transaksi_issue_selected_detail.php?transaksi_id='+transaksi_id,
				});
			}
		});
			}
		 
	});
		

			

			function onBeforeLoad(param) {
			//alert('helo');
			//alert(supplier);
			
				var opts = $(this).datagrid('options');

				opts.url = '../control/get_master_barang_combo.php';

			}
			function onSelectGrid(index,record) {
				if(cbg) {
					var cb = cbg;
					var opts =cb.combogrid('options');
					var grid = cb.combogrid('grid');
					var row= grid.datagrid('getSelected');
					//alert(row);
				//	alert (row.price);
					var dgs = $('#dg1');
					var index = dgs.datagrid('getRowIndex', dgs.datagrid('getSelected'));
				//	var index = $('#dgs').datagrid('getSelected');
				//	alert (index);
					//alert (row.satuan);

					var editors = dgs.datagrid('getEditors', index);
					 $(editors[1].target).val(row.nama_barang);
					 $(editors[2].target).val(row.satuan);
					 $(editors[3].target).focus();
					//$(editors[3].target).val(row.price);
					//$(editors[4].target).val(row.price);


				}
			}
			


			function onShowPanel() {
				cbg = $(this);
				
			}
			function onHidePanel() {
				cbg = null;
			}
			
			

		$('#dg1').edatagrid({
		onEndEdit:function(index,row){
            var edQty = $(this).datagrid('getEditor', {
                index: index,
                field: 'qty'
            });
			// var edPrice = $(this).datagrid('getEditor', {
            //     index: index,
            //     field: 'price'
            // });
			
			 //row.productname = $(ed.target).combobox('getText');
			 var qty = $(edQty.target).text('getValue');
			//  var price = $(edPrice.target).text('getValue');
			//  var amount = qty.val() * price.val();
			//  row.amount = amount;
		}
		});
	
		$(function(){




		$('#btnSave').bind('click', function(){
			//alert('here');
			//if ($('#dd').dialog(''))
			//alert(title);

			data = $('#dg1').datagrid('getData');
			var total = data.total;
			//alert (total);
			// var pono= $('#pono').textbox('getValue');
			// var podate=$('#podate').datebox('getValue');
            // var supplier = $('#cc').combogrid('getValue');
			// //var deliveryplace=$('#deliveryplace').textbox('getValue');
            // var currency = $('#currency').combogrid('getValue');
			//var pic = $('#pic').combogrid('getValue');
			//var status = $('#status').combogrid('getValue');
			//var valid_until=$('#validdate').datebox('getValue');
			//var ppn=$('#ppn').switchbutton('options').checked ? 'yes' : 'no';
			//var discount= $('#discount').textbox('getValue');
			//var sample=$('#sample').switchbutton('options').checked ? 'yes' : 'no';
			var tgl_permintaan = $('#tgl_permintaan').datebox('getValue');
			var no_permintaan = $('#no_permintaan').textbox('getValue');
			// var no_bast = $('#no_bast').textbox('getValue');
			var user_id = '<?php echo"$user_id"?>';
			var transaksi_id = '<?php echo"$transaksi_id"?>';
			//alert(user_id);

			if(no_permintaan!=='' && tgl_permintaan!==''){
			if (total>0){
			if (title==='tambah'){
								//ajax save transaction
			var string = "tgl_permintaan="+tgl_permintaan+"&no_permintaan="+no_permintaan+"&user_id="+user_id;
			//alert (string);	
			$.ajax({
			type	: 'POST',
			url		: "../control/save_header_issue.php",
			data	: string,
			cache	: false,
			success	: function(data){
			//alert(data);
			var transaksi_id= data;

			for (i=0;i<total;i++){
				var row = $('#dg1').datagrid('getRows')[i];
				var kd_barang = row.kd_barang;
				var nama_barang = row.nama_barang;
				var satuan = row.satuan;
				var qty = row.qty;
				// var price = row.price;
				// var amount = row.amount;
			
				var stringdetail  = "kd_barang=" +kd_barang+"&nama_barang="+nama_barang+"&satuan="+satuan+"&qty="+qty+"&transaksi_id="+transaksi_id;	
				//alert (stringdetail);
									$.ajax({
									type	: 'POST',
									url		: "../control/save_detail_issue.php",
									data	: stringdetail,
									cache	: false,
									success	: function(data){
										//alert (data);
										var win = $.messager.progress({
										title:'Please waiting',
										msg:'Saving data...'
										});	

										setTimeout(function(){
											$.messager.progress('close');
											$('#tgl_permintaan').textbox('setValue','');
											$('#no_permintaan').textbox('setValue','');
											// $('#no_bast').textbox('setValue','');
											
											$('#dg1').datagrid('loadData', {"total":0,"rows":[]});
											//$('#dlg').dialog('close');
										//$("#p3").html(data);
										//alert("Data: " + string );
										//alert("Data: " + data );
										},2800)
										$('#dg1').datagrid('reload');
									},
								error:	 function(data){
								// ('error');
							}
								});
			
			
				}
			
			},error:function(xhr, status, error){
        		 var errorMessage = xhr.status + ': ' + xhr.statusText
         		alert('Error - ' + errorMessage);
     		}
			
			});
				
			}else if(title==='ubah'){

			//alert(title);
			var string = "tgl_permintaan="+tgl_permintaan+"&no_permintaan="+no_permintaan+"&user_id="+user_id+"&transaksi_id="+transaksi_id;
			//alert (string);	
			$.ajax({
			type	: 'POST',
			url		: "../control/update_header_issue.php",
			data	: string,
			cache	: false,
			success	: function(data){
			//alert(data);
			var transaksi_id= data;

			for (i=0;i<total;i++){
				var row = $('#dg1').datagrid('getRows')[i];
				var id= row.id;
				var kd_barang = row.kd_barang;
				var nama_barang = row.nama_barang;
				var satuan = row.satuan;
				var qty = row.qty;
				// var price = row.price;
				// var amount = row.amount;
				if (id !== undefined){
					var stringdetail  = "kd_barang=" +kd_barang+"&nama_barang="+nama_barang+"&satuan="+satuan+"&qty="+qty+"&transaksi_id="+transaksi_id+"&id="+id;	
				}else{
					var stringdetail  = "kd_barang=" +kd_barang+"&nama_barang="+nama_barang+"&satuan="+satuan+"&qty="+qty+"&transaksi_id="+transaksi_id+"&id="+null;	
				}
				
				//alert (stringdetail);
									$.ajax({
									type	: 'POST',
									url		: "../control/update_detail_issue.php",
									data	: stringdetail,
									cache	: false,
									success	: function(data){
										//alert (data);
										var win = $.messager.progress({
										title:'Please waiting',
										msg:'Saving data...'
										});	

										setTimeout(function(){
											$.messager.progress('close');
											$('#tgl_permintaan').textbox('setValue','');
											$('#no_permintaan').textbox('setValue','');
											// $('#no_bast').textbox('setValue','');
											
											$('#dg1').datagrid('loadData', {"total":0,"rows":[]});
											//$('#dlg').dialog('close');
										//$("#p3").html(data);
										//alert("Data: " + string );
										//alert("Data: " + data );
										},2800)
										$('#dg1').datagrid('reload');
									},
								error:	 function(data){
								alert ('error');
							}
								});
			
			
				}
			
			},error:function(xhr, status, error){
        		 var errorMessage = xhr.status + ': ' + xhr.statusText
         		alert('Error - ' + errorMessage);
     		}
			
			});
			}
	
				
			}else{
				//alert ('Please fill detail transaction');
				$.messager.alert('Logistik','Please fill detail transaction!','warning');
			}
			}else{
				//alert ('Please fill complete');
				$.messager.alert('Logistik','Please Fill Complete!','warning');
			}
		});
		});

		$('#hapus_btn').bind('click', function(){
			var row = $('#dg1').datagrid('getSelected');
			var string ="id="+row.id;
			//alert(string);
			$.ajax({
			type	: 'POST',
			url		: "../control/delete_detail_selected_issue.php",
			data	: string,
			cache	: false,
			success	: function(data){
				//alert(data);
				$.messager.alert('Logistik','Data deleted!','info');
				$('#dg1').datagrid('reload');
			},
			error:function(xhr, status, error){
        		 var errorMessage = xhr.status + ': ' + xhr.statusText
         		alert('Error - ' + errorMessage);
     		}
		});
			//var string = "id="+id;
			//alert (string);	
		});

		

		
			
		 function formatPrice(val,row){
    if (val <= 0){
    return '<span style="color:red;">('+val+')</span>';
    } else {
	var Rp=toRp(val);
    return (Rp);
    }
    }
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return  rev2.split('').reverse().join('') ;
}

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

		

    </script>
</div>