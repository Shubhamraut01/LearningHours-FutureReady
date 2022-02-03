
<?php 
$conn;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Volunteer Registration Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="registration.css">
</head>
<style type="text/css">
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
</style>
<body>
	<div class="home-page">
		<button id="return-home">Home</button>
		<script>
		    document.getElementById("return-home").onclick = function () {
		       location.href = "Doleout.html";
		   };
		</script>
	</div>
	<div class="container">
		<div class="header">
			<h2>VOLUNTEER REGISTRATION FORM</h2>
		</div>
		<!-- <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> -->
			<form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?> ">
				<table border=0>
					<tr>
						<td>
							<div class="form-control">
								<label>Name</label><br>
								<input type="text" name="name" id="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" placeholder="Enter your full name" autocomplete="off" required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
						<td>
							<div class="form-control">
								<label>Address</label><br>
								<input type="text" name="address" id="address" placeholder="Enter your Address" autocomplete="off" required value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>">
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="form-control">
								<label>Mobile No.</label><br>
								<input type="number" name="mobile" id="phone" maxlength="10" placeholder="Enter your Mobile No." autocomplete="off" required pattern="^\d{3}-\d{3}-\d{4}$" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" $(document).ready(function(){$(".numeric").numeric();});>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>


						</td>
						<td>
							<div class="form-control">
								<label>District</label><br>
								<input type="text" name="district" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" id="district" placeholder="Enter your full name" autocomplete="off" required value="<?php if(isset($_POST['district'])) echo $_POST['district']; ?>">
								
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-control">
								<label>Gender</label><br>
								<select name="gender" id="gender" required>
									<option value="" selected="No">-Select-</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									
								</select>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
						<td>
							<div class="form-control">
								<label>Availability</label><br>
								<select name="availability" id="availability" required>
									<option value="" selected="No">-Select-</option>
									<option value="parttime">Part Time</option>
									<option value="fulltime">Full Time</option>
								</select>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-control">
								<label>Email</label><br>
								<input type="text" name="to" id="email" placeholder="Enter your E-mail" autocomplete="off" value="<?php if(isset($_POST['to'])) echo $_POST['to']; ?>">
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

										echo "<script>alert('Email successfully sent to $to_email');</script>"; 
									}
									else { 
										echo "Email sending failed..."; 
									}   
								}
								?>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
						<td>
							<div class="form-control">
								<label>Verify E-mail</label><br>
								<input type="text" name="otp" id="verify" placeholder="Enter OTP" autocomplete="off">
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
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error Msg</small>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="submit" class="btn" name="submit">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
	<script type="text/javascript">
		const form =document.getElementById('form');
		const name =document.getElementById('name');
		const address =document.getElementById('address');
		const email =document.getElementById('email');
		const verify =document.getElementById('verify');
		const phone =document.getElementById('phone');
		const district =document.getElementById('district');


	//add event
	form.addEventListener('submit', (event)=>{
		event.preventDefault();

		validate();
	})

	//more email validate 
	const isEmail = (emailVal) => {
		var atSymbol = emailVal.indexOf("@");
		if(atSymbol <1) return false; //checkin if @ is at first pos
		
	} 

	//defining validate function
	const validate =() => {
		const name =name.value.trim();//value.trim() removing white spaces from start and end
		const address =address.value.trim();
		const emailVal =email.value.trim();
		const verify =verify.value.trim();
		const phone =phone.value.trim();
		const district =district.value.trim();

		//validate name
		if (name === "") {
			setErrorMsg(name, 'Name cannot be blank');
		}else if(name.length <= 2){
			setErrorMsg(name, 'Name min 3 char');
		}else{
			setErrorMsg(name);
		}

		//validate address
		if (address === "") {
			setErrorMsg(address, 'Address cannot be blank');
		}else if(Address.length <= 2){
			setErrorMsg(address, 'address min 3 char');
		}else{
			setErrorMsg(address);
		}

		//validate name
		if (emailVal === "") {
			setErrorMsg(email, 'email cannot be blank');
		}else if(isEmail(!emailVal)){
			setErrorMsg(emailVal, 'email min 3 char');
		}else{
			setErrorMsg(email);
		}
	}

	function setErrorMsg(input,errormsgs){
		const formControl = input.parentElement;
		const small = formControl.querySelector('small');
		formControl.className="form-control error";
		small.innerText = errormsgs;
	}
</script>
</html>
<?php
if(isset($_POST['submit']))
{
require 'db_conn.php';
//include("registration - Copy.php");
$name           =  $_REQUEST['name'];
$address        =  $_REQUEST['address'];
$mobileno       =  $_REQUEST['mobile'];
$district       =  $_REQUEST['district'];
$gender         =  $_REQUEST['gender'];
$availability   =  $_REQUEST['availability'];
$email          =  $_REQUEST['to'];

$query = "INSERT INTO register(Name,Address,Gender,Availability,Email_id,mobile_no,district) values('$name','$address','$gender','$availability','$email','$mobileno','$district')";//first parameter is ID(Primary KEY)) which will get Incremented automatically
$result = mysqli_query($con,$query);
if($result)
{
	echo '<script>alert("Thank You..! For Joining Us"); location.replace(document.referrer);</script>';
}
else
{
	echo '<script>alert("Try Again!"); location.replace(document.referrer);</script>';
}
}
?>


