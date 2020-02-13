<?php
	require_once  'config.php';
function deletefromQueue($conn,$id){
		$query = "DELETE FROM queue WHERE id=$id ";
		// echo $query;
		$result = mysqli_query($conn,$query);
		return $result ;
}


		



}


function recordSent($conn,$origin,$message,$destination){
		$query="INSERT INTO message_sent(origin,message,destination) VALUES('$origin','$message','$destination')";
		// echo $query;
		$result = mysqli_query($conn,$query);
		return $result ;
}

function selectfromQueue($conn){
		$query = "SELECT * FROM queue";
		$result = mysqli_query($conn,$query);

		 $teresa2= [ ];
		if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	array_push($teresa2,$row);
              
            }
         } 

         return $teresa2;
}




function dispatch($row){
	//WIll send the actual SMS

	$status=true;
	$response = "Success.";

	return [$status, $response];

}



//START LOGIC HERE

while(true){
	echo "Fetching\n";
	 $queuedMessages = selectfromQueue($conn);

	 for ($i=0; $i < sizeof($queuedMessages)  ; $i++) { 
	 		$record = $queuedMessages[$i];
	 	// {"id":"2","origin":"","m; essage":"\they there\t\t\t\t","destination":"741132087"}
	 		echo "Processing record ".$record['id']."\n";

	 		$id=$record['id'];
	 		$origin=$record['origin'];
	 		$message=$record['message'];
	 		$destination=$record['destination'];


	 		[$status, $response] = dispatch($record);

	 		if($status==true){
		 		recordSent($conn,$origin,$message,$destination);
	 			deletefromQueue($conn,$id);
	 			recordUsers($conn,$credit);
	 			echo "Message Sent to: " .$destination;
	 		}else{
	 			echo "Error Sending Message Sent to: " .$destination;

	 		}


	 }

	sleep(1);
	echo "-----------------------\n";
}








// 	// function to delete data from queue

// 			$r1=deletefromQueue($conn,6);
// 			echo $r1;




// 		//function to insert data into message_sent table


// 		$r3=insertIntoMessages($conn,$origin,$message,$destination);

// 		 function insertIntoMessages($conn,$origin,$message,$destination){
// 		 			$query="INSERT INTO message_sent(origin,message,destination) VALUES('$origin','$message','$destination')";

// 		 			echo $query;

// 		 			$result = mysqli_query($conn,$query);
// 					return $result ;
// 					 }


// 			//function to select data from the queue table

// 					function selectfromQueue($conn){
// 		$query = "SELECT * FROM queue";

		
// 		$result = mysqli_query($conn,$query);


// 		// if (mysqli_num_rows($result) > 0) {
//   //           

// 		 $teresa2= [ ];


// 		if (mysqli_num_rows($result) > 0) {
//             while($row = mysqli_fetch_assoc($result)) {
//             	array_push($teresa2,$row);
              
//             }
//          } 

//          return $teresa2;

		

// }




// $r5=selectfromQueue($conn);


// echo json_encode($r5);



	


//  # ...my engine example
// // while(true){
// // 	echo "Fetching\n";
// // 	sleep(1);
// // 	echo "Sent\n";
// // 	sleep(3);
// // 	echo "-----------------------\n
// // 	\n";
// // }


// // recordMessageResponse($conn,$origin,$message,$destination);

// // function recordMessageResponse($conn,$origin,$message,$destination){
// // 	$query= "INSERT INTO message_sent (origin,message,destination ) VALUES ('0705126329','hi','0700000000') ";

// // $result = mysqli_query($conn,$query) ;


// // // if($result=true){

// // // 	deletefromQueue($conn, 12);

// // // 	function deletefromQueue($conn,$id){
// // // 		$query = "DELETE * FROM queue WHERE id=$id";

// // // 	}

// // // }


// // 	// while($result=true){

// // 	// 	deletefromQueue($conn,9);

// // 	// 	function deletefromQueue($conn,$id){
// // 	// 		$query = "DELETE * FROM queue WHERE id ='$id'";

// // 	// 	}


// // return $result;


// // }



// function getQueuedMessages(){





// }

// function dispatch(){
// 	//WIll send the actual SMS

// 	$status=true;
// 	$response = "Success.";

// 	return [$status, $response];

// }



?>
