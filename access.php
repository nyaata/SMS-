<?php

include ('services.php');
//connection to the database
// $dbServer="localhost";
// $dbUsername="root";
// $dbpassword="";
// $dbName="sms";

// $conn= new mysqli($dbServer,$dbUsername,$dbpassword,$dbName);



$username =$_POST['Username'];
$password =$_POST['Password'];


checkIfExist($conn,$username);
//register($conn,$fname,$lname,$username,$password);





// function login($conn,$username,$password){


// 	$query = "SELECT * FROM users WHERE username='$username' or password='$password'";
// 	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

// 	$count = mysqli_num_rows($result);

// 		//Checks if the values are similar to the ones posted by the user if yes a new session is created

// 		if($count !=0){
			
// 			$_SESSION['username'] = $username;


		

// 		}else
// 		{
// 			echo " Wrong username or password";
// 		}

		



// }

if(checkIfExist($conn,$username)){

	login($conn,$username,$password);



echo json_encode([

					"status"=>"1",
					"Message"=>"Welcome"  .$username
				]);


echo "<script>
window.open('messageForm.php','_self')

</script>";


}


	else{


echo json_encode([
		"status"=>"0",
			"message"=>"You cannot login"

			//"link"=>"href:users.php?"
	

	]);


echo "<script>
alert('you cannot login')
window.open('users.php','_self')

</script>";
	
		
 }



// }
// 	if(register($conn,$fname,$lname,$username,$password)){

// 	header("location:users.php?message=You need to signup first");
// 	 //  echo  json_encode([
// 		// 	"status"=>"0",
// 		// 	"message"=>"Registration successful"

// 		// ])

	  

// 	// }else{
// 	//   echo  json_encode([

// 	// 		"status"=>"2",
// 	// 		"message"=>"Registration Failed. Contact Admin."
// 	// 	]);



?>
