
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>.: Logistik :.</title>
	 <link rel="shortcut icon" href="./img/mistic.png">
	<link rel="stylesheet" type="text/css" href="./themes/metro/easyui.css">
	<link rel="stylesheet" type="text/css" href="./themes/icon.css">
	<link rel="stylesheet" type="text/css" href="./demo/demo.css">
	 <link rel="stylesheet" type="text/css" href="./themes/color.css">
	<link rel="stylesheet" type="text/css" href="./css/navpanel.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
	<link rel="stylesheet" href="./css/w3.css">
	<!--<link rel="stylesheet" href="./css/button.css">-->


<style>
html { 
  background: url(img/bg2.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.textbox{
    border-color: grey;
  }
  

</style>
<script>

$(document).ready(function(){
	var header = $('#p').panel('header');
	header.css('background', 'black');
	header.css('border-color','grey')
	$("#login").click(function(){
			
			var action = $("#lg-form").attr('action');
			var form_data = {
				uname: $("#uname").textbox('getValue'),
				upass: $("#upass").textbox('getValue'),
			};
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
				 	//alert(response.message);		
					if(response.message == "success"){
						$("#lg-form").slideUp('slow', function(){
							$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
							setTimeout(myFunction, 1000);
						});
					}else{
					$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');}
					//alert('here');
				},
				error: function (response){
					//alert('here1');
					$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');
				}
			});
			return false;
		});	
		
function myFunction() {
window.location='home.php';
}		
});



</script>
</head>
<body>

	<Center>
	
    <div style="margin-top:15%;">
	<form id ="lg-form" name="lg-form" action='./control/validate.php' method="post">
    <div class="easyui-panel" id="p"  style="width:100%;max-width:400px;padding:30px 60px;border-color:#e7e7e7">
		<div style="margin-bottom:10px;margin-top:15px;">
            <input id="uname" name="uname" class="easyui-textbox" style="width:100%;height:35px;padding:12px;border-color:#008145;" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38">
        </div>
        <div style="margin-bottom:20px">
            <input id ="upass" name="upass" class="easyui-textbox" type="password" style="width:100%;height:35px;padding:12px;border-color:#008145;" data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38">
        </div>

        <div align="right">
        <!--<button name="submit" id="login" class="w3-button w3-green" style="width:100px;">Login</button>-->
		<!--<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px;height:45px">Login</a>-->
		<!--<button name="submit" id="login" class="button button1">Login</button>-->
		<button id ="login" class="w3-button w3-blue" style="width:100%">Login</button>
	</div>
    </div>
	<center><div id="demo"><small><font color="black"> &copy;  Syerif 2017 - <?php echo date("Y"); ?> </font> </small></div>
	</form>
	<div id="message"></div> 
	</div>
	</Center>
	
</body>
</html>