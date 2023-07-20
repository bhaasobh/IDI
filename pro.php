
<?php
    include 'db.php';
    include 'config.php';

    session_start();


    if(isset($_GET["btnsing"])){

    $email = mysqli_real_escape_string($connection, $_GET['proemail']);
    $pass = mysqli_real_escape_string($connection, $_GET['password']);
    $first_name= mysqli_real_escape_string($connection, $_GET['first_name']);
    $last_name= mysqli_real_escape_string($connection, $_GET['last_name']);
    $prem= mysqli_real_escape_string($connection, $_GET['prem']);
    if($prem==1)
    {
      $eid = 9999;
      $forc = "operation team";
    }else
    {
      $eid = 1;
      $query_event_id = "SELECT * FROM tbl_206_events where event_id=".$eid;
      $result_event_id = mysqli_query($connection , $query_event_id);
      $row_event_id = mysqli_fetch_array($result_event_id);
      $forc = $row_event_id['officer_qty'];
    }
    $query = "INSERT INTO tbl_206_officers(first_name,last_name,team,event_id) VALUES('$first_name','$last_name','$forc','$eid')";
    $result = mysqli_query($connection, $query);

    $query1 = 'select * from tbl_206_officers where first_name="'. $first_name .'" and last_name ="'.$last_name.'";';
    $result1 = mysqli_query($connection, $query1);
    $row_officer_id = mysqli_fetch_array($result1);
    $id=$row_officer_id["officer_id"];
    
    $query2 = "INSERT INTO tbl_206_users(email,password,officer_id,premmisions) VALUES ('$email','$pass','$id','$prem')";
    $result2 = mysqli_query($connection, $query2);
    //echo $query1;
    //$query2 = "INSERT INTO tbl_206_officers(first_name,last_name) VALUES ('$first_name','$last_name')";
     //echo $query2;
     
      //$result2 = mysqli_query($connection, $query2);
    header('Location: ' . URL . 'index.php');
    }

    ?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="java/scripts.js"></script>
  <title>Immediate Danger Indicator</title>
</head>
<body>
  <header>
    <div class="d-flex mb-3">
      <div class="me-auto p-2">
        <a href="list.php" id="logo" alt="IDI" title="IDI"></a>
        <a class="navbar-brand" href="#">
        </a>
      </div>
    </div>
  </header>
  <section id="wrapper">
    <section id="aside-and-main">
      <main id="main">
          <h2>הרשמה</h2>
            <form id="add_pro" method="GET" class="form-check" action="">
                <br><br><br>
                <div class="row d-lg-column-reverse">
                <div class="col-12" >
                    <div class="input-group input-group-lg">
                    <input type="text" name="proemail" id="proemail" class="form-control"   placeholder="אימייל" required <?php if (isset($_GET["id"])){ echo 'value="'. $row_user["email"].'"';}?>>
                    <span class="input-group-text">אימייל</span>
                </div><br><br>
                <div class="input-group input-group-lg">
                    <input type="password" name="password" id="password" class="form-control" placeholder="סיסמה" <?php if (isset($_GET["id"])){ echo 'value="'. $row_user["password"].'"';}?>>
                    <span class="input-group-text">סיסמה</span>
                </div><br><br>
                <div class="input-group input-group-lg">
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="שם פרטי"<?php if (isset($_GET["id"])){ echo 'value="'. $row_user["first_name"].'"';}?>>
                    <span class="input-group-text">שם פרטי</span>
                </div><br><br>
                <div class="input-group input-group-lg">
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="שם משפחה"<?php if (isset($_GET["id"])){ echo 'value="'. $row_user["last_name"].'"';}?>>
                    <span class="input-group-text">שם משפחה</span>
                </div><br>
                <div class="input-group mb-3 input-group-lg">
                    <select class="form-select" name="prem" id="prem" style="direction: rtl;"  <?php if (isset($_GET["event_id"])){ echo 'data-selected="'. $row["risk_level"].'"';}?>>
                      <option value="1">מוקדן</option>
                      <option value="0">שוטר</option>
                    </select>
                    <label class="input-group-text" for="prem">הרשאות</label>
                  </div>
                <button id="btnform" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  name="btnsing">
                אישור
              </button>
            </div>
            </form>
      </main>
    </section>
  </section>
</body>
</html>
