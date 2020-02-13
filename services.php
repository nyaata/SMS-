<?php



//connection to the database

include ('db.php');
// $dbServer="localhost";
// $dbUsername="root";
// $dbpassword="";
// $dbName="sms";

// $conn= new mysqli($dbServer,$dbUsername,$dbpassword,$dbName);






//function to check if user exists

function checkIfExist($conn,$username){
		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$query); //


		  $username= [ ];
		if (mysqli_num_rows($result) > 0) {
            return true;
             
         }else{
        	return false;
        } 

}

//function that adds users


// register($conn,$fname,$lname,$username,$password);


function register($conn,$fname,$lname,$username,$password){
			$query = "INSERT INTO users(fname,lname,username ,password) VALUES('$fname','$lname','$username','".md5($password)."')";
			$result=mysqli_query($conn,$query);
			return true;
		
         }
//function login

 // login($conn,$username,$password);

function login($conn,$username,$password){
		$query = "SELECT * FROM users WHERE username='$username' or password='$password'";
		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	$count = mysqli_num_rows($result);

		//Checks if the values are similar to the ones posted by the user if yes a new session is created

		if($count !=0){
			
			$_SESSION['username'] = $username;


		}else
		{
			echo json_encode([

				"status"=>"1",
				"message"=>"welcome".$username

			]);
		}
		



}


//validates the username
function checkUsername($conn,$username){

	if (!preg_match('/^(?=[a-z]{2})(?=.{4,26})(?=[^.]*\.?[^.]*$)(?=[^_]*_?[^_]*$)[\w.]+$/iD', $username)){
		return false;

	}else{

 		return true;
}



	}






?>