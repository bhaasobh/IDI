



<?php	
    include "db.php";

	session_start();

	
		$email = mysqli_real_escape_string($connection, $_POST["proemail"]);
		$pass = mysqli_real_escape_string($connection, $_POST['password']);
		$first_name= mysqli_real_escape_string($connection, $_POST['first_name']);
		$last_name= mysqli_real_escape_string($connection, $_POST['last_name']);
		$query3 = 'UPDATE tbl_206_users SET email = "'.$email.'" ,password = "'.$pass.'" WHERE officer_id = "'.$_SESSION["officer_id"].'";';
		$query4 = 'UPDATE tbl_206_officers SET first_name = "'.$first_name.'" ,last_name = "'.$last_name.'" WHERE officer_id = "'.$_SESSION["officer_id"].'";';
		$result3 = mysqli_query($connection, $query3);
		$result4 = mysqli_query($connection, $query4);

        mysqli_free_result($result3);
		mysqli_free_result($result4);
    