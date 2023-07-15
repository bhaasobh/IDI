<?php
	// echo '{"retVal":"' . $_POST['title'] . '"}';
	
    include "db.php";

	//testing connection success
	if(mysqli_connect_errno()) {
		die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
		);
	}
		
	// if we want to show current list then get data from DB to display
    // $query1  = "SELECT * FROM tbl_test order by title desc";
    // $result = mysqli_query($connection, $query1);
    // if(!$result) { 
    //     die("DB query failed.");
    // }
	
	//if data was sent, save it and display in the list
	if(isset($_POST['title'])) {
		// escape variables for security
		$actname = mysqli_real_escape_string($connection, $_POST['actname']);
		$offcer_owner  = mysqli_real_escape_string($connection, $_POST['officer']);
        $event_type = mysqli_real_escape_string($connection, $_POST['acttype']);
		$location  = mysqli_real_escape_string($connection, $_POST['loc']);
        $officer_quantity = mysqli_real_escape_string($connection, $_POST['force_Qty']);
		$date  = mysqli_real_escape_string($connection, $_POST['date']);
		$description  = mysqli_real_escape_string($connection, $_POST['description']);
        $start_time = mysqli_real_escape_string($connection, $_POST['hour']);
		$risk_level  = mysqli_real_escape_string($connection, $_POST['risk']);

		//SET: insert new data to DB
		$query2 = "insert into tbl_206_events(title,txt) values ('$ttle','$txt')";
		$result = mysqli_query($connection, $query2);
		
		//GET: get data again
		$query3 = "SELECT * FROM tbl_test order by title desc";
    	$result = mysqli_query($connection, $query3);
	}
	
	// GET: get data again
   	$str  = "<ul>";
   	while($row = mysqli_fetch_assoc($result)) {//results are in an associative array. keys are cols names
       //output data from each row
       $str  .= "<li><h2>" . $row["title"] . "</h2><h3>" .$row["txt"] ."</h3></li>";
   	}
	$str  .= "</ul>";
	// echo $str;
	echo '{"retVal":"' . $str . '"}';
