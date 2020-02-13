<?php

include ('services.php');

$dbServer="localhost";
$dbUsername="root";
$dbpassword="";
$dbName="sms";

$conn= new mysqli($dbServer,$dbUsername,$dbpassword,$dbName);



$origin=$_POST['From'];
$destination=$_POST['To'];

$message =$_POST['message'];



validate($conn,$origin,$destination,$message);


function validate($conn,$origin,$destination,$message){





	// filters any special characters

	     $filtered_send_phone_number = filter_var($origin, FILTER_SANITIZE_NUMBER_INT);
	      $filtered_receive_phone_number = filter_var($destination, FILTER_SANITIZE_NUMBER_INT);

	      //replaces the special characters with  numerical value
	       $phone_to_check_send = str_replace("-", "", $filtered_send_phone_number);
	        $phone_to_check_receive = str_replace("-", "", $filtered_receive_phone_number); 
     		//checklength
     		$sender=strlen($phone_to_check_send);
     		$receiver=strlen($phone_to_check_receive);



	//checks if the length is valid
	
	if ($sender>=10 && $sender<=14 &&  $receiver >=10 && $receiver <=14) {

	$query= "INSERT INTO queue (origin,message,destination ) VALUES ('$origin','$message','$destination')";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	echo json_encode([
      "status"=>"0"
	]);
	}
	else{
	echo json_encode([
      "status"=>"1","message"=>"Invalid values"
	]);
	 }





}

checkIfExist($conn,$username);





// $query= "INSERT INTO queue (origin,message,destination ) VALUES ('$origin','$message','$destination')";





// if($result = true){

// $query ="INSERT INTO `message_sent`(origin,message,destination)  SELECT origin,message,destination FROM `queue`";

// }






 

?>