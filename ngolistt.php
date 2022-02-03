<?php
include('db_conn.php');
?>
<html>
<head>
	<!-- search-box icon link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Search</title>

	<style>	
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{

		}
		.ngo-list{
			position: absolute;
			top: 50px;
			margin-left: 400px;
			display: inline-block;
			box-sizing: border-box;
			background: crimson;
			border-radius: 5px;
			width: 700px;
			height: 250px;
			padding: 10px;

		}
		.ngo-list .input{
			display: flex;
		}
		.ngo-list .input .input-box{
			display: inline-flex;
			margin: 20px;

		}
		.ngo-list .input .input-box label{
			padding: 10px;
			color: #fff;
			font-weight: bold;
		}
		.ngo-list .input .input-box input{
			border-radius: 5px;
			border: none;
			outline: none;
			overflow: hidden;
			font-size: 11px;
			width: 200px;
			padding: 2px;

		}
		.ngo-list input[type="submit"]{
			margin-top: 15px;
			width: 100px;
			padding: 10px;
			box-sizing: border-box;
			border-radius: 10px;
			border: none;
			color: crimson;
			font-weight: bold;
			font-size: 15px;
		}
		body h1{
			color: crimson;
			position: relative;
			vertical-align: middle;
			margin-left: 35%;
			margin-top: 21%;
		}
		.box{
			margin: auto;
			margin-top: 30px;
			position: relative;
			width: 500px;
			height: 45px;
			border: 4px solid crimson;
			border-radius: 50px;
			margin-left: 490px;
		}
		.element{
			width: 100%;
			height: 100%;
			vertical-align
		}
		.search{
			border: none;
			height: 100%;
			width: 100%;
			padding: 0px 10px;
			border-radius: 50px;
			font-size: 18px;
			font-family: "Nunito";
			color: crimson;
			font-weight: 500;
		}
   /* .input{
		border: none;
		height: 5%;
		width: 50%;
		padding: 0px 10px;
		border-radius: 50px;
		font-size: 12px;
		font-family: "Nunito";
		color: crimson;
		font-weight: 500;
		}*/
		.search:focus{
			outline: none;
		}
		i{
			font-size: 18;
			color: crimson;
		}
		.table .details{
			margin: 30px;
			border: 2px 5px;
			align-items: center;
		}
		.table .details tr{
			width: 10%;
			height: 50px;
		}
		.table .details tr th,td{
			margin: 50 px;
			padding: 6px;
			font-size: 18px;
			margin: 5px;
		}
		.table .details th{
		color: #fff;
		background: black;
		opacity: 0.8;
		vertical-align: middle;
	}
	.table button{
		padding: 5px;
		text-align: center;

	}
	.home-page button{
	padding: 10px;
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
	<form method="POST" class="ngo-list" action="<?php echo $_SERVER['PHP_SELF']?>">
		<div class="input">
			<div class="input-box">
				<label>Full Name:</label><br>
				<input type="text" name="name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" placeholder="Enter Your Full Name" required>
			</div>
			<div class="input-box">
				<label>Mobile No:</label><br>
				<input type="number" name="mobile" maxlength=10 pattern="^\d{3}-\d{3}-\d{4}$" placeholder="Enter Mobile No"  $(document).ready(function(){$(".numeric").numeric();}); required>
				<br>
			</div>
		</div>
		<div class="input">
			<div class="input-box">
				<label>NGo Name:</label><br>
				<!-- <input type="text" name="ngo" placeholder="Select NGO District Wise In Search Bar" required> -->
				<input type="text" name="ngo" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" placeholder="Select NGO District Wise In Search Bar" required>
			</div>
			<div class="input-box">
				<label>Amount:</label>
				<!-- <input type="text" name="amt" placeholder="Enter Ammount You Want To Donate" required> -->
				<input type="number" name="amt" placeholder="Enter Ammount You Want To Donate" $(document).ready(function(){$(".numeric").numeric();}); required>
			</div>
		</div>
		<center><input type="submit" value="Proceed" name="Proceed"></center>
	</form>
	<h1>Search NGO In Your District</h1>
	<div class="box">
		<table class="element">
			<tr>
				<td>
					<input type="text" name="Search" id="myinput" placeholder="Search" class="search" onkeyup="searchFun()">
				</td>
				<td>
					<a href="#"><i class="fas fa-search"></i></a>
				</td>
			</tr>
		</table>	
	</div>
	<!-- <input type="text" name="" value="text" id="myinput" onkeyup="searchFun()"> -->
	<div class="table" id="mytable">
		<table border="1" class="details" style="width: 95%; border: #4d4d33; outline: none;">
			<thead>
				<tr>
					<th> Ngo_ID </th>
					<th> Ngo Name</th>
					<th> Contact Number</th>
					<th> District</th>
					<th> Address</th>
					<th> Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "select ID,Name,Contact_no,district,address,description from ngoregistration";
				if($query_run=mysqli_query($con, $query))
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						?>    
						<tr>
							<td><?php echo $row['ID'];?></td>
							<td><?php echo $row['Name'];?></td>
							<td><?php echo $row['Contact_no'];?></td>
							<td><?php echo $row['district'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><?php echo $row['description'];?></td>
							<td>
								<form action="register/demo.php" method="post">
									<!--<input type="hidden" name="select1" value="<?php echo $row['ID'];?>">-->
									<button type="submit" name="select" value="<?php echo $row['ID'];?>" class="btn btn-danger">Select</button>
								</form></td>
							</tr>
							<?php
						}
					}
					else 
					{
						echo "No Record Found";
					}
					?>
				</table>
			</div>
			<script>
				const searchFun = () =>{
					let filter = document.getElementById('myinput').value.toUpperCase();

					let mytable = document.getElementById('mytable');

					let tr = mytable.getElementsByTagName('tr');

					for(var i=0; i<tr.length; i++){
						let td = tr[i].getElementsByTagName('td')[3];

						if(td){
							let textvalue = td.textContent || td.innerHTML;

							if (textvalue.toUpperCase().indexOf(filter) > -1) {
								tr[i].style.display = "";
							}else{
								tr[i].style.display = "none";
							}
						}
					}
				}
			</script>
		</body>
		</html>
<!-- <?php
$name	=		$_POST['name'];
$mobile	=		$_POST['mobile'];
$NgoName	=	$_POST['ngo'];
$Amount		=	$_POST['amt'];

$query = "INSERT into donation(Name,Mobile_no,Ngo_Name,Amount) values('$name','$mobile','$NgoName','$Amount')";
$query_run = mysqli_query($con,$query);
if($query_run)
{
	//header("NgoList.php");
	echo'<script>alert("Thankyou..");</script>';
}
else
{
	echo'<script>alert("Sorry Try Again");</script>';
}
?> -->