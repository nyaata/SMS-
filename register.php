<?php

//connection to database

include ('services.php');





// checkIfExist($conn,$fname,$lname,$username,$password);

// function checkIfExist($conn,$username){
// 		$query = "SELECT * FROM users WHERE username='$username'";
// 		$result = mysqli_query($conn,$query);


// 		 // $username= [ ];
// 		if (mysqli_num_rows($result) > 0) {
//             $error = "username already exists";
//             echo $error;
//         }else{
//          	$query = "INSERT INTO users(fname,lname,username ,password) VALUES('$fname','$lname','$username','".md5($password)."')";
// 			$result=mysqli_query($conn,$query);
// 			echo " Registration successful";
//          } 
// }




//---------------------





if (checkIfExist($conn,$username)){
  echo  json_encode([
		"status"=>"1",
		"message"=>"User exists"
	]);
}else if(checkUsername($conn,$username)==false)
{echo
"<script>
alert('Username is invalid')
window.open('users.php','_self')
</script>";

}else if(register($conn,$fname,$lname,$username,$password)){

		
	  echo  json_encode([
			"status"=>"0",
			"message"=>"Registration successful"
		]);


	}
	else{
	  echo  json_encode([

			"status"=>"3",
			"message"=>"Registration Failed. Contact Admin."
		]);

	}
	
	





// function checkIfExist($conn,$username){
// 		$query = "SELECT * FROM users WHERE username='$username'";
// 		$result = mysqli_query($conn,$query);


// 		 //


// 		  $username= [ ];
// 		if (mysqli_num_rows($result) > 0) {
//             return true;
//         }else{
//         	return false;
//         } 
// }

// function register($conn,$fname,$lname,$username,$password){
// 			$query = "INSERT INTO users(fname,lname,username ,password) VALUES('$fname','$lname','$username','".md5($password)."')";
// 			$result=mysqli_query($conn,$query);
// 			return true;
		
//          }
















 

?>