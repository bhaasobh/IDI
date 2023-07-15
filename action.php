

<?php	
    include "db.php";

	if(isset($_POST['actname'])) {
		$actname = mysqli_real_escape_string($connection, $_POST['actname']);
		$offcer_owner  = mysqli_real_escape_string($connection, $_POST['officer']);
        $event_type = mysqli_real_escape_string($connection, $_POST['acttype']);
		$location  = mysqli_real_escape_string($connection, $_POST['loc']);
        $officer_quantity = mysqli_real_escape_string($connection, $_POST['force_Qty']);
		$date  = mysqli_real_escape_string($connection, $_POST['date']);
        $start_time = mysqli_real_escape_string($connection, $_POST['hour']);
		$description  = mysqli_real_escape_string($connection, $_POST['description']);
		$risk_level  = mysqli_real_escape_string($connection, $_POST['risk']);
		
		$query2 = "insert into tbl_206_events(title,event_type,location,officer_quantity,date,risk_level,time_start,description,offcer_owner) values
		 ('$actname','$event_type','$location','$officer_quantity','$date','$risk_level','$start_time','$description','$offcer_owner')";
		$result = mysqli_query($connection, $query2);

	}

	
	
	mysqli_free_result($result);
	
	
	mysqli_close($connection);

	?>