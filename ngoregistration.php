<?php 
$conn;
$con=new mysqli('127.0.0.1','root','','doleout');
$OTPSent=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>NGO Registration Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background-image: url(../Project/volunteer1.jpeg);
			background-size: 100%;
			background-repeat: no-repeat;
			font-family: sans-serif;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			width: 100vw;
		}
		.registrationbox{
			background-color: #fff;
			/*background: transparent;*/
			border-radius: 10px;
			box-shadow: 0 2.8px 2.2px rgba(0,0,0,0.34);
			overflow: hidden;
			/*width: 500pxcalc(100%-20%);*/
			max-width: 100%;
			margin-top: 10px;

		}

		.header {
			background: crimson;
			padding: 20px 0;
		}
		.header h2{
			color: #fff;
			font-size: 24px;
			text-transform: uppercase;
			text-align: center;
		}
		form {
			padding: 24px;
			background-color: #fff;
		}
		.inputbox{
			margin-bottom: 20px;
			position: relative;
		}
		.inputbox label {
			display: inline-block;
			margin-bottom: 3px;
		}

		.inputbox input,select{
			width: 100%;

			border: 2px solid #d6d6c2;
			border-radius: 5px;
			font-size : 14px;
			padding: 12px;
		}
		.inputbox input[accept="Image/*"]{
			border: none;

		}
		form input[type="submit"]{
			background: crimson;
			box-sizing: border-box;
			border-radius: 5px;
			border:none;
			outline: none;
			color: #fff;
			display: block;
			padding: 15px 0;
			width: 85%;
			font-weight: bold;
			text-transform: uppercase;
			transition: all 1s ease;
		}

		.home-page{
			position: absolute;
			top: 40px;
			left: 30px;
			margin: 50px;
			box-sizing: border-box;
			border: crimson;
			padding: 10px;
			color: black;
			opacity: 0.7;

		}
		.home-page button{
			padding: 5px;
			width: 100px;
			height: 50px;
			font-size: 19px;
			color: crimson;
			font-weight: bold;

		}
		form td,select{
			width: 250px;
		}
		select{
			color: #787878;
		}
		table { border-spacing: 40px 0px; }
	</style>
</head>
<body>
	<div class="home-page">
		<button id="return-home">Home</button>
		<script>
			document.getElementById("return-home").onclick = function () {
				location.href = "Doleout.html";
			};
		</script>
	</div>
	<div class="registrationbox">
		<div class="header">
			<h2>NGO Registration Form</h2>
		</div>

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?> " enctype='multipart/form-data'>
			<table border="0">	
				<tr>
					<td>	
						<div class="inputbox">
							<label>NGO Name:</label>
							<input type="text" name="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" placeholder="Enter NGO Name" required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
						</div>	
					</td>
					<td>	
						<div class="inputbox">
							<label>District:</label>
							<input type="text" name="district" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" placeholder="Enter District" required value="<?php if(isset($_POST['district'])) echo $_POST['district']; ?>"  >
						</div>
					</td>	
				</tr>	
				<tr>
					<td>
						<div class="inputbox">
							<label>Address:</label>
							<input type="text" name="address" placeholder="Enter Address" required value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" >
						</div>
					</td>
					<td>
						<div class="inputbox">
							<label>Contact No:</label>
							<input type="number" name="mobile" maxlength="10" placeholder="Enter Contact Number" pattern="^\d{3}-\d{3}-\d{4}$"  required value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" $(document).ready(function(){$(".numeric").numeric();});>
						</div>
					</td>	
				</tr>	
				<tr>
					<td>
						<div class="inputbox">
							<label>Donation can be acccepted in form of.. </label>
							<input type="text" name="donation" placeholder="Amount,Cloths,Books,etc." required value="<?php if(isset($_POST['donation'])) echo $_POST['donation']; ?>">
						</div>
					</td>
					<td>
						<div class="inputbox">
							<label>Describe Your NGO</label>
							<input type="text" name="describe" placeholder="Describe Your NGO" required value="<?php if(isset($_POST['describe'])) echo $_POST['describe']; ?>" >
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="inputbox">
							<label>Email</label><br>
							<input type="email" name="to" id="email" placeholder="Enter your E-mail" autocomplete="off" value="<?php if(isset($_POST['to'])) echo $_POST['to']; ?>" required>
							<input type="submit" name="send" value="Send OTP">
							<?php 


							if(isset($_POST['send']))
							{

								$otp=0;

								$conn=new mysqli('127.0.0.1','root','','test');
								if($conn)
								{
									$query="update otp_table set otp='".(int)substr(strrev(time()),0,4)."' where id=1";
									$result=mysqli_query($conn,$query);

								}
								$query="select otp from otp_table where id=1";
								$result=mysqli_query($conn,$query);
								while ($rows =$result->fetch_assoc())
								{
									$otp=(int)$rows['otp'];
								}

								$to_email = $_POST['to']; 
								$subject = "Otp"; 
								$body = "Your otp is ".$otp."."; 
								$headers = "From: doleout139@gmail.com"; 

								if (mail($to_email, $subject, $body, $headers))
								{ 
									$OTPSent=1;
									echo "<script>alert('OTP successfully sent to $to_email');</script>"; 
								}
								else { 
									echo "Email sending failed..."; 
								}   
							}
							?>
						</div>
					</td>
					<td>
						<div class="inputbox">
							<label>Verify E-mail</label><br>
							<input type="email" name="otp" id="verify" placeholder="Enter OTP" autocomplete="off">
							<input type="submit" name="verify" value="Verify">
							<?php 
							if(isset($_POST['verify']))
							{ 
								$otp=0;

								$conn=new mysqli('127.0.0.1','root','','test');
								if($conn)
								{
									$query="select otp from otp_table where id=1";
									$result=mysqli_query($conn,$query);
									while ($rows =$result->fetch_assoc())
									{
										$otp=(int)$rows['otp'];
									}
								}

								if((int)$_POST['otp']==$otp)
								{
									echo "<script>alert('Email Verified!')</script>";

								}
								else
								{
									echo "<script>alert('Incorrect OTP!')</script>";
								}

							}
							?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="inputbox">
							<label>Upload Your QR Code</label>
							<input type=file name=file class=pic value="<?php if(isset($_POST['file'])) echo $_POST['file']; ?>" required>
						</div>
					</td>
				</tr>
			</table>
			<center><input type="submit" name="submit" value="Submit"></button></center>
			<?php 
			if(isset($_POST["submit"]))
			{
				$target="register/upload/".basename($_FILES['file']['name']);
				move_uploaded_file($_FILES['file']['tmp_name'],$target);
				$name           =  $_REQUEST['name'];
				$district       =  $_REQUEST['district'];
				$address        =  $_REQUEST['address'];
				$Contactno      =  $_REQUEST['mobile'];
				$Describe       =  $_REQUEST['describe'];
				$email			=  $_REQUEST['to'];
				$qr_code        =  $_FILES['file']['name'];

				$query = "INSERT INTO `ngoregistration`( `Name`, `Contact_no`, `district`, `address`, `description`, `qr_code`,`email`) VALUES ('$name','$Contactno','$district','$address','$Describe','$qr_code','$email')";
				$result = mysqli_query($con,$query);
				echo $con -> error;
				if($result)
				{
					echo '<script>alert("Thank You..! Your NGO is Valuable to Us");location.replace(document.referrer); </script>';
				}
				else
				{
					echo '<script>alert("Sorry we are unable to accept your form! Try Again");location.replace(document.referrer); </script>';
				}

			}
			?>
		</form>
	</div>
</body>
</html>
















