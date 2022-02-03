<?php
     include('db_conn.php');
?>
    <?php
        $query = "select ID,Name,Gender,Availability,district,Email_id,mobile_no from register";
    ?>
<html>
<head>
	<!-- search-box icon link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Search</title>

<style>
	body h1{
		color: crimson;
		position: relative;
		vertical-align: middle;
		margin-left: 35%;
		margin-top: 8%;
	}
	.box{
		margin: auto;
		margin-top: 30px;
		position: relative;
		width: 500px;
		height: 45px;
		border: 4px solid crimson;
		border-radius: 50px;
	}
	.element{
		width: 100%;
		height: 100%;
		vertical-align: middle;
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
	.search:focus{
		outline: none;
	}
	i{
		font-size: 18;
		color: crimson;
	}
	.table .details{
		margin: 30px;
		/*border: none;*/
		border-radius: 5px;
		/*border: 2px black solid;*/
		/*opacity: 0.8;*/
	}
	.table .details tr{
		width: 10%;
		height: 50px;
	}
	.table .details tr th,td{
		margin: 50px;
		padding: 6px;
		font-size: 18px;
		vertical-align: middle;
	}
	.table .details th{
		color: #fff;
		background: black;
		opacity: 0.8;
		vertical-align: middle;
	}
	.home-page{
	margin: 50px;
	box-sizing: border-box;
	border: crimson;
	padding: 10px;
	color: #fff;
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
	<h1>Search Volunteer In Your District</h1>
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
		<table border="1" class="details" style="width: 95%; border:#4d4d33; outline: none; ">
            <thead>
			<tr>
				<th>Volunteer ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>District</th>
				<th>Availability</th>
                <th>Email-ID</th>
				<th>Mobile Number</th>
			</tr>
            </thead>
            <tbody>
            <?php
            if($query_run=mysqli_query($con, $query))
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
            ?>    
			<tr>
            <td><?php echo $row['ID'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Gender'];?></td>
            <td><?php echo $row['district'];?></td>
            <td><?php echo $row['Availability'];?></td>
            <td><?php echo $row['Email_id'];?></td>
            <td><?php echo $row['mobile_no'];?></td>
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