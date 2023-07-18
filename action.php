

<?php	
    include "db.php";

	session_start();
	$event_id = $_SESSION["event_id"];
		
		$actname = mysqli_real_escape_string($connection, $_POST['actname']);
		$offcer_owner  = mysqli_real_escape_string($connection, $_POST['officer']);
        $event_type = mysqli_real_escape_string($connection, $_POST['acttype']);
		$location  = mysqli_real_escape_string($connection, $_POST['loc']);
        $officer_quantity = mysqli_real_escape_string($connection, $_POST['force_Qty']);
		$date  = mysqli_real_escape_string($connection, $_POST['date']);
        $start_time = mysqli_real_escape_string($connection, $_POST['hour']);
		$description  = mysqli_real_escape_string($connection, $_POST['description']);
		$risk_level  = mysqli_real_escape_string($connection, $_POST['risk']);
		if(!empty($_SESSION["event_id"])){
			
			$query2 = 'UPDATE tbl_206_events SET title = "'.$actname.'" ,event_type = "'.$event_type.'" ,location = "'.$location.'"
			,officer_qty = "'.$officer_quantity.'" ,date = "'.$date.'" ,risk_level = "'.$risk_level.'" ,time_start = "'.$start_time.'" 
			,description = "'.$description.'" ,offcer_owner = "'.$offcer_owner.'"  WHERE event_id = "'.$event_id.'";';
			
			$result = mysqli_query($connection, $query2);
			unset($_SESSION['event_id']);
		}
		else {
			$query2 = "INSERT INTO tbl_206_events(title,event_type,location,officer_qty,date,risk_level,time_start,description,offcer_owner) VALUES
			('$actname','$event_type','$location','$officer_quantity','$date','$risk_level','$start_time','$description','$offcer_owner')";
			$result = mysqli_query($connection, $query2);
		}
	

	
	
	mysqli_free_result($result);
	
	
	mysqli_close($connection);

	?>