<!-- new file -->
<!--storing in database-->
<?php
require 'db_conn.php';
if($conn)
//include("registration - Copy.php");
$name           =  $_REQUEST['name'];
$address        =  $_REQUEST['address'];
$mobileno       =  $_REQUEST['mobile'];
$district       =  $_REQUEST['district'];
$gender         =  $_REQUEST['gender'];
$availability   =  $_REQUEST['availability'];
$email          =  $_REQUEST['to'];
$cpassword		=  $_REQUEST['cpassword'];

$query = "INSERT INTO register(Name,Address,Availability,Email_id,mobile_no,district,password) values('$name','$address','$availability','$email','$mobileno','$district','$cpassword')";//first parameter is ID(Primary KEY)) which will get Incremented automatically
$query ="INSERT INTO `register` VALUES ('','$name','$address','$availability','$email','$mobileno','$district','$cpassword')";
echo $query."<br>";
$result = mysqli_query($conn,$query);
if($result)
{
	echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
}
else
{
	echo("Error description: " . $conn -> error);
}
?>
