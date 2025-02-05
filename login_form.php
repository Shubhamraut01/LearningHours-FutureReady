<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!font link>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

<style>

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Josefin Sans', Sans-serif;


}
body{
	background-color: #e1e1d0;
	/*background: url(../Project/loginbackground.jpeg);*/
	width: 100%;
	background-size: cover;

}
.main_div{
	width: 100%;
	height: 100vh;
	position: relative;
}

.box{
	width: 400px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%); /*to right it in center*/
	padding: 50px;
	background: rgba(0,0,0,0.8);
	border-radius: 10px;
}

.box h1{
	margin-bottom: 30px;
	color: crimson;
	text-align: center;
	text-transform: capitalize;
}

.box .inputBox{
	position: relative;
	color: #fff;
}

.box .inputBox input{
	width: 100%;
	padding: 15px;
	font-size: 16px;
	color: white;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom: 2px solid crimson;
	background: transparent;
	outline: none;

}

.box .inputBox label{
	position: absolute;
	top: 0;
	left: 0;
	letter-spacing: 1px;
	padding: 10px 0;
	font-size: 16px;
	color: crimson;
	transition: 0.5s;
}

.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label{
	top: -20px;
	left: 0;
	color: #03a9f4;
	font-size: 12px;
}


.box input[type="submit"]{
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: crimson;
	padding: 8px 16px;
	border-radius: 5px;
	font-size: 18px;
	letter-spacing: 2px;
}
</style>
</head>
<body>
	<div class="main_div">
		<div class="box">
			<h1>Admin Login Form</h1>
			<form method="" action="login.php">
				<div class="inputBox">
					<input type="text" name="uname" autocomplete="off" required>
					<label>Username</label>
				</div>
				<div class="inputBox">
					<input type="password" name="password" autocomplete="off" required>
					<label>Password</label>
				</div>
				<center>
				<input type="submit" id="login" value="login">
					<!--<script>
						   document.getElementById("login").onclick = function () {
						    location.href = "../Projecttt/Admin/admin_dashboard.php";
						};
					</script>-->
				</center>
			</form>	
		</div>
	</div>
</body>
</html>
