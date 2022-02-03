<!DOCTYPE html>
<html>
<head>
	<title>Select Option</title>
<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body{
	width: 100%;
	height: 100vh;
	background:url('../Admin/child_img.jpeg');
	background-size: cover;
	background-attachment: fixed;
	
}
.box{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	border: 2px crimson solid;
	width: 300px;
	height: 410px;
	align-items: center;
	background: crimson;
	border-radius: 25px;
}
.select-option{
	align-items: center;
	margin: 25px;
	margin-left: 50px;

}
.select-option button{
	align-items: center;
	padding: 5px;
	width: 90%;
	height: 50px;
	font-size: 19px;
	border-radius: 15px;
	color: crimson;
	font-weight: bold;
}
.home-page{
	margin: 50px;
	box-sizing: border-box;
	border: crimson;
	padding: 10px;
	color: #fff;
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
</head>
<body>
	<div class="home-page">
		<button id="return-home">Home</button>
		<script>
		    document.getElementById("return-home").onclick = function () {
		       location.href = "../DoleOut/Doleout.html";
		   };
		</script>
	</div>
	<div class="box">
		<div class="select-option">
			<button><a href="MembersDetail.php">Member Login</a></button>
		</div>
		<div class="select-option">
			<button><a href="DonationDetails.php">Donation</a></button>
		</div>
		<div class="select-option">
			<button><a href="NgoList.php">NGO List</a></button>
		</div>
		<div class="select-option">
			<button><a href="FeedbackList.php">Donor Feedback</a></button>
		</div>
		<div class="select-option">
			<button><a href="login_form.php">Log Out</a></button>
		</div>
	</div>
</body>
</html>