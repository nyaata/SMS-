<?php

$dbServer="localhost";
$dbUsername="root";
$dbpassword="";
$dbName="sms";
//connection to database

$conn=new mysqli($dbServer,$dbUsername,$dbpassword,$dbName);


$fname=$_POST['Firstname'];
$lname=$_POST['Lastname'];
$username =$_POST['Username'];

$password =$_POST['password'];

selectfromUsers($conn,$fname,$lname,$username,$password);

function selectfromUsers($conn,$fname,$lname,$username,$password){
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$query);


		 // $username= [ ];
		if (mysqli_num_rows($result) > 0) {
            $error = "username already exists";
            echo $error;
        }else{
         	$query = "INSERT INTO users(fname,lname,username ,password) VALUES('$fname','$lname','$username','".md5($password)."')";
			$result=mysqli_query($conn,$query);
			echo " Registration successful";
         } 
}


//---------------------

if(checkIfExist($conn,$username)){
	return json_encode({
		"status"=>"1",
		"message"=>"User exists"
	});
}else{
	if(register($conn,$fname,$lname,$username,$password)){
		return json_encode({
			"status"=>"0",
			"message"=>"Registration successful"
		});

	}else{
		return json_encode({
			"status"=>"3",
			"message"=>"Registration Failed. Contact Admin."
		});

	}

}



function checkIfExist($conn,$username){
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$query);


		 //


		  $username= [ ];
		if (mysqli_num_rows($result) > 0) {
            return false;
        }else{
        	return true;
        } 
}

function register($conn,$fname,$lname,$username,$password){
		
         	$query = "INSERT INTO users(fname,lname,username ,password) VALUES('$fname','$lname','$username','".md5($password)."')";
			$result=mysqli_query($conn,$query);
			return true;
         
}
















 

?>