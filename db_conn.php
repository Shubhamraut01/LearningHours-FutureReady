<?php

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "doleout";

$con = mysqli_connect($sname, $uname, $password, $db_name);

if (!$con) {
        echo "Connection failed!";
}
