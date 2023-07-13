<?php
include "config.php";
include "db.php";
session_start();

if(!empty($_POST["loginMail"])) {
    $query  = "SELECT * FROM tbl_206_users WHERE email='" 
        . $_POST["loginMail"] 
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";

    $result = mysqli_query($connection , $query);
    $row    = mysqli_fetch_array($result);

    if(is_array($row)) {
        session_start();
        $_SESSION["user_id"] = $row['user_id'];

        header('Location: ' . URL . 'list.php');
    } else {
        $message = "Invalid username or password !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body id="login">
    <div id = "login-card">   
        <div class="container">
            <h1 id ="header">כניסה</h1>
            <form action="#" method="post" id="frm">
                <div class="mb-3 input">
                    <label for="exampleInputEmail1" class="form-label">אימייל: </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="mb-3 input">
                    <label for="exampleInputPassword1" class="form-label">סיסמה:</label>
                     <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary logbtn">התחבר</button>
                <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>   
            </form>
        </div>
    </div>
</body>
</html>