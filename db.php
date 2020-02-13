<?php

$dbServer="localhost";
$dbUsername="root";
$dbpassword="";
$dbName="sms";

$conn= new mysqli($dbServer,$dbUsername,$dbpassword,$dbName);


$fname=$_POST['Firstname'];
$lname=$_POST['Lastname'];
$username =$_POST['Username'];
$password =$_POST['password'];


?>