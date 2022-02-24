<?php
session_start();
if (isset($_SESSION['username']) && isset ($_SESSION['level'])){
$username = $_SESSION['username'];
$level = $_SESSION['level'];
// get version
}else{
	header( "Location: ./" );
}
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>.: Logistik :.</title>
	 <link rel="shortcut icon" href="img//mistic.png">
	<link rel="stylesheet" type="text/css" href="./themes/material-teal/easyui.css">
	<link rel="stylesheet" type="text/css" href="./themes/icon.css">
	<link rel="stylesheet" type="text/css" href="./demo/demo.css">
	 <link rel="stylesheet" type="text/css" href="./themes/color.css">
	<link rel="stylesheet" type="text/css" href="./css/navpanel.css">
	<link rel="stylesheet" type="text/css" href="./themes/color.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
	<script type="text/javascript">var mylevel = "<?= $level ?>";</script>
	<script type="text/javascript">var myusername = "<?= $username ?>";</script>
	<link rel="stylesheet" href="./css/w3.css">
</head>
<body>
<style>
html { 
  background: url(img/b1.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

div.fixed {
    position: absolute;
	top:15;
    bottom: 0;
    right: 0;
	left:93%;
    width: 70px;
}<!--- logo --->
div.fixed1 { <!-- menu-->
	position: fixed;
    bottom: 0;
    right: 0;
	left:100%;
	top:0;
    width: 300px;

}
div.fixed2 { <!-- menu shortcut-->
	
    bottom: 0;
    right: 0;
	left:0;
	top:300px;
    width: 100%;
	
}

div.fixed3 { <!-- menu bar1-->
	position: absolute;
    bottom: 0;
    right: 0;
	left:0;
	top:0px;
    width: 30%;
	
}
div.fixed4 { <!-- menu bar2-->
	position: absolute;
    bottom: 0;
    right: 10;
	left:0;
	top:0px;
	margin-top:-18px;
	margin-left:50%;
    width: 30%;

}
</style>



</head>

<body>
		<div style="position:fixed;">

	  </div>
    <div class="easyui-layout" style="width:100%;height:100%;opacity:0.85;">
        <div data-options="region:'north'" style="height:80px">
		<div class="fixed">
			<!--<img src="./img/ksk.png" style="width:50px;height:50px;margin-top:12px;">-->
		</div>
		<!--<div class="fixed1" style="color:white;background-color:#99b433;">-->
		<div class="fixed1">
		<a href="#" id="mb0" class="easyui-menubutton" data-options="menu:'#mm0'">File</a>
        <a href="#" id="mb1" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:'icon-gear'">Menu</a>
        <a href="#" id="mb2" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Help</a>
		</div>
		<br>
		<div class="fixed2">
		<!--<a href="#" id="btn1" class="easyui-linkbutton" data-options="iconCls:'icon-monitoring'">Stock Monitoring</a>
		<a href="#" id="btn2" class="easyui-linkbutton" data-options="iconCls:'icon-transaction'">Kasir Transaction</a>-->
		</div>
		
		<div id="mm0" style="width:100px;" data-options="
				onClick:function(item){
					logoff();
				}
			">
        <div name="Exit" data-options="iconCls:'icon-close'">Exit</div>
		</div>
		
		<div id="mm1" style="width:150px;" data-options="
				onClick:function(item){
					//alert(item.name);
					menuSelection(item.name);
				}
			">
        <!--<div id="init" name="Initial Stock" data-options="iconCls:'icon-stock'">Initial Stock</div>
		<div name="Stock monitoring" data-options="iconCls:'icon-monitoring'">Stock Monitoring</div
        <div id="sep1" class="menu-sep"></div>>-->
		
		 <div id="mn_setting">
            <span>Master</span>
            <div>
				<div name="Level" data-options="iconCls:'icon-man'">Level</div>
				<div name="Role" data-options="iconCls:'icon-man'">Role</div>
				<div name="User" data-options="iconCls:'icon-man'">User</div>
				<div name="Satuan" data-options="iconCls:'icon-product'">Satuan</div>
				<div name="Satuan Waktu" data-options="iconCls:'icon-product'">Satuan Waktu</div>
				<!--<div id="opt-mn" name="Option Menu" data-options="iconCls:'icon-menu'">Menu</div>-->
				<div name="Kategori Barang" data-options="iconCls:'icon-product'">Kategori Barang</div>
				<div name="Master Barang" data-options="iconCls:'icon-product'">Master Barang</div>
                <div name="Stok Awal" data-options="iconCls:'icon-product'">Stok Awal</div>
				<!--<div name="Format Nomor Asset" data-options="iconCls:'icon-purchase'">Format Nomor Asset</div> -->
				<!--<div name="Kategori" data-options="iconCls:'icon-product'">Kategori</div>
				<div  name="Barang" data-options="iconCls:'icon-product'">Barang</div>
				<div name="Supplier" data-options="iconCls:'icon-supplier'">Supplier</div>
				<div name="Supplier_Barang" data-options="iconCls:'icon-supplier'">Supplier-Barang</div>-->
				
			</div>
        </div>
		 <div class="menu-sep"></div>
        <div>
            <span>Transaction</span>
            <div>
				<div id="penerimaan" name="Penerimaan Barang" data-options="iconCls:'icon-product'">Penerimaan Barang</div>
				<div id="permintaan" name="Permintaan Barang" data-options="iconCls:'icon-product'">Permintaan Barang</div>
                <!-- <div id="pengeluaran" name="Pengeluaran Barang" data-options="iconCls:'icon-product'">Pengeluaran Barang</div> -->
				<!--<div id="po" name="Purchase Order" data-options="iconCls:'icon-purchase'">Purchase Order</div>
				<div id="polist" name="Purchase Order List" data-options="iconCls:'icon-purchase'">Purchase Order List</div>
                <div id="ro" name="Receive Transaction" data-options="iconCls:'icon-receive'">Receive Transaction</div>
				<div id="rolist" name="Receive Transaction List" data-options="iconCls:'icon-receive'">Receive Transaction List</div>
                <div id="ks" name="Kasir Transaction" data-options="iconCls:'icon-transaction'">Kasir Transaction</div>
				<div id="kslist" name="Kasir Transaction List" data-options="iconCls:'icon-transaction'">Kasir Transaction List</div>
				<div id="as" name="Angsuran Transaction" data-options="iconCls:'icon-transaction'">Angsuran Transaction</div>-->
				
            </div>
        </div>
		 <div id="rep" name="Report" data-options="iconCls:'icon-stock'">Report</div>
	   
	   
		</div>

    <div id="mm2" style="width:150px;">
        <div>Help</div>
        <div>Update</div>
        <div>
            <span>About</span>
            <div class="menu-content" style="padding:10px;text-align:left">
                <img src="./img/logo1.png" style="width:100px;height:100px">
                <p style="font-size:14px;color:#444">Try our complete solution applications for your business.</p>
            </div>
        </div>
    </div>
		</div>
        <div data-options="region:'south',split:false" style="height:25px;">
			<div style="text-align:left;">Asyst orde - Logistik
			<span style="float:right;">Welcome, you login as : <?php echo($level);?></span> 
			</div>
		</div>
        <div data-options="region:'center'">
		<div class="easyui-tabs" fit="true" border="true" id="ttab" style="width:100%;height:100%;max-width:100%; border-radius:1px">
					<div title="Welcome" closable="true" style="padding:20px;"> 
						<div style="margin-top:20px;">
							<h3>Selamat datang di Logistik System</h3>
							<li>dalam system ini dapat di lakukan entry data .</li> 
							<li>proses reporting juga dapat dilakukan dalam aplikasi ini.</li> 
							<li>aplikasi ini masih dalam tahap pengembangan.</li> 											
						</div>
					</div>					
		</div>
		</div>
</div>

<script>
$(document).ready(function(){
var level = "<?php echo $level; ?>";
if (level=='Kasir'){
	$('#mn_setting').hide();
	$('#init').hide();
	$('#sep1').hide();
	$('#po').hide();
	$('#polist').hide();
	$('#ro').hide();
	$('#rolist').hide();
	$('#as').hide();
	$('#rpo').hide();
	$('#rro').hide();
	$('#ras').hide();
	$('#rep').hide();
	
}else if(level=='Supervisor'){
	$('#as').hide();
	$('#ras').hide();
	$('#opt-mn').hide();
}

$('#dlg').dialog('close');
//check current version
								var string = "";
								//alert (string);
								
								$.ajax({
									type	: 'POST',
									url		: "./control/get_version.php",
									data	: string,
									cache	: false,
									success	: function(data){
									//alert (data);
									//$('#dlg').dialog('open');
									if (data != 'Your version is update') {
										//$('#dlg').dialog('open');
										
										$('#dlg').dialog({
										closed: false,
										cache: false,
										href: './control/get_version.php',
										modal: true
									});
										
										
									}}
								});
							
							//alert (mylevel);

});

function logoff(){
	var winVisible = 0;
	var win
	
		var TopPosition = (window.innerHeight) /6;
		var LeftPosition = (window.innerWidth)/ 2.5;
		
winVisible = 1;
 win = $.messager.confirm('Logout Confirm', 'Do you want to Logout?', function(r){

	if (r){
		window.location='./control/logout.php';
	}else{
		winVisible = 0;
	}
});
win.window('move',{
	left:LeftPosition,
	top:TopPosition
})


$(window).resize(function() {
  //resize just happened, pixels changed
  //alert ("window resize");
  //alert (winVisible);
  //alert (win.filter(":visible")​​​​​​​​.length);
	if (winVisible>0){
		var TopPosition = (window.innerHeight) /3;
		var LeftPosition = (window.innerWidth)/ 2.5;
		win.window('move',{
	left:LeftPosition,
	top:TopPosition
})
	}
});

}

		var index = 0;
		function addTab(title,url){
		if ($('#ttab').tabs('exists', title)){
				$('#ttab').tabs('select', title);
			} else {
			index++;
			//alert (url);
			var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
			$('#ttab').tabs('add',{
				title: title,
				content: content,
				closable: true,
				fit: true
			});
			
			}
			//$('#cc').layout('collapse','west');
			$('#ttab').tabs('close', 'Welcome');
			
		}
function menuSelection(title){
	//alert (title);
	var url= "./view/"+title+'?username='+myusername;
	//alert (url);
	addTab (title,url);
}	
 $('#btn1').bind('click', function(e){
    menuSelection('Stock monitoring');
  });	
   $('#btn2').bind('click', function(e){
    menuSelection('Kasir Transaction');
  });
</script>
</body>
</html>