<?php
include "config.php";
include "db.php";


session_start();

    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'index.php');
    } else {

          $userID = $_SESSION["user_id"] ;
          $officer_id = $_SESSION["officer_id"] ; 
          $query_user  = "select * from tbl_206_officers inner join tbl_206_users using (officer_id) where id=" . $userID;
          $result_user = mysqli_query($connection , $query_user);
          $row_user    = mysqli_fetch_array($result_user);
          $event_id = $_GET['eventId'];



         $query_officers  = "SELECT * from tbl_206_officers where event_id=".$event_id.";";
         $result_officers = mysqli_query($connection , $query_officers);


         $query_Allofficers  = "SELECT * from tbl_206_officers ;";
         $result_Allofficers = mysqli_query($connection , $query_Allofficers);
         $row_Allofficers = mysqli_fetch_array($result_Allofficers);


         $query_event = "select * from tbl_206_events e inner join tbl_206_officers o on e.offcer_owner = o.officer_id where e.event_id =".$event_id.";";
         $result_event = mysqli_query($connection , $query_event);
         $row_event    = mysqli_fetch_array($result_event);
         $team= "select*from tbl_206_officers o inner join tbl_206_events e where o.team=e.officer_qty and o.team='".$row_event["officer_qty"]."' and e.event_id='".$event_id."';";
          $team_result=mysqli_query($connection , $team);
          $row_team = mysqli_fetch_array($team_result);
      

          $comander= "select*from tbl_206_officers o inner join tbl_206_events e where o.team=e.officer_qty and o.team='".$row_event["officer_qty"]."' and e.event_id='".$event_id."' and role='comander';";
          $comander_result=mysqli_query($connection , $comander);
          $row_comander= mysqli_fetch_array( $comander_result);
    }
    ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <section>
        <button id="hamburger" class="bi bi-list navbar-toggler d-lg-none d-inline" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"></button>
        <div class="offcanvas d-flex align-items-center flex-diraction offcanvas-bottom" tabindex="-1"
          id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small">
            <ul class="nav-flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="list.php"><svg xmlns="http://www.w3.org/2000/svg" width="35"
                    height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path
                      d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                  </svg> ראשי</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                    fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path
                      d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                    <path
                      d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                  </svg> היסטוריה אירועים </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                    fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path
                      d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                  </svg> שליחת הודעה כללית </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                    fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                  </svg> אנליזות</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                    fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path
                      d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                    <path
                      d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                  </svg> היסטרית התראות </a>
              </li>
              <li class="nav-item" <?php if($row_user["premmisions"]==1) echo 'hidden'; ?>>
                <a class="nav-link "   href="new_officer.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>הוסף שוטר חדש</a>
              </li>
              <div class="exit">
                <li class="nav-item">
                  <a class="nav-link" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                      fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                      <path
                        d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                      <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                    </svg> יציאה</a>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </section>
      <div class="me-auto p-2">
         <a href="list.php" id="logo" alt="IDI" title="IDI"></a> 
        <a class="navbar-brand" href="#">
        </a>
      </div>
      <div class="p-2">
      <h6 id="profileName">שלום  <?php echo $row_user["rank"]. " ". $row_user["first_name"]." ". $row_user["last_name"] ?></h6>
      </div>
      <div class="p-2">
      <a href="profile.php?id=<?php echo $officer_id ?>"><img src="<?php echo $row_user["photo_path"] ?>" class="profilePic" alt=<?php echo $row_user["first_name"] ?> title=<?php echo $row_user["first_name"] ?>></a>
      </div>
    </div>
  </header>
  <section id="wrapper">
    <section id="aside-and-main">
      <main>
        <h2 class="eventTitle"> <?php echo $row_event["title"] ." ". $row_event["location"]."";?> </h2>
        <section id="eventActions">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reinforcementsModal">בקש
            תגבור</button>

          <button type="button" class="btn btn-primary" id="Btn_fireman_req">הזמנת כיבוי אש</button>
          <button type="button" class="btn btn-primary" id="Btn_medical_req">הזמנת מד"א</button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#send_messageModal">שלח
            הודעה לכולם</button>
          
          <div class="modal fade" id="reinforcementsModal" tabindex="-1" aria-labelledby="reinforcements"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="reinforcements">בקשת תיגבור</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="interests[]" value="כל הצוותים"
                          id="checkbox_checkAll">
                        <label class="form-check-label" for="flexCheckDefault" id="reinforcements_team">
                          כל הצוותים
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" name="interests[]" type="checkbox" value="צוות השלום"
                          id="checkbox_hashalom">
                        <label class="form-check-label" for="flexCheckDefault" id="reinforcements_team">
                          צוות השלום
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" name="interests[]" type="checkbox" value="צוות אריה"
                          id="checkbox_aria">
                        <label class="form-check-label" for="flexCheckDefault" id="reinforcements_team">
                          צוות אריה
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" name="interests[]" type="checkbox" value="הבולדוזרים"
                          id="checkbox_boldor">
                        <label class="form-check-label" for="flexCheckDefault" id="reinforcements_team">
                          צוות הבולדוזרים
                        </label>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="form-check">
                        <input class="form-check-input" id="reinforcement_yorashalayem" type="checkbox"
                          name="interests[]" value="צוות ירושלים מרכז">
                        <label class="form-check-label" for="flexCheckDefault" id="reinforcements_team">
                          צוות ירושלים מרכז
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">סגור</button>
                  <button type="submit" class="btn btn-primary" id="submitBtn">שלח</button>
                </div>
              </div>
            </div>
          </div>
       
          <div class="modal fade" id="send_messageModal" tabindex="-1" aria-labelledby="send_message"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="send_message">שליחת הודעה לכולם</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="send_message_body">
                <form id="send_message_form" action="event.php"  method="get">
                  <input type="hidden" name="eventId" value="<?php  echo $event_id ?>" />
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">כותרת ההודעה</label><br>
                      <input type="text" class="form-control" required="true" id="title_messageAll"
                        placeholder="כותרת ההודעה">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">תוכן ההודעה</label><br>
                      <textarea class="form-control" id="Textarea_messageAll" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">סגור</button>
                  <button type="submit" class="btn btn-primary" id="message_allSubmitBtn">שלח</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <section id="event">
          <div class="container d-lg-flex flex-diraction-column justify-content-between align-items-center">

            <section id="eventDetails">
              <table class="table table-hover">
               <?php

                  echo '<thead>
                <tr class="eventTitletable">
                 
                  <th scope="col" colspan="2">'.$row_event["title"].'</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <h6> קצין אחראי </h6>
                  </td>
                  <td>'.$row_comander["first_name"].' '.$row_comander["last_name"].'</td>
                </tr>
                <tr>
                  <td>
                    <h6> צוות הפעילות</h6>
                  </td>
                  <td>'.$row_event["officer_qty"].'</td>
                </tr>
                <tr>
                  <td>
                    <h6> רמת סיכון</h6>
                  </td>
                  <td class="riskLevel">'.$row_event["risk_level"].'</td>
                </tr>
              </tbody>';

                  ?>
              
            </table>
          </section>
            <section id="eventMap">
              <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3380.908630089512!2d34.779894154304806!3d32.07171994843628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sil!4v1684015444204!5m2!1sen!2sil"
                  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </section>
              <section id="copsEvent">
                
                                            
                        <?php
                          echo '<div class="card copCard">
                          <div class="card-body copBody">
                              <h6 class="copName" >' . $row_comander["first_name"] ." ". $row_comander["last_name"]  . '</h6>
                                    <img src="'. $row_comander["photo_path"] . '" class="copPhoto">
                                        <div class="copStatusColor"></div>
                                      <label class="copStatus">מחובר</label>
                                      <svg id="cameraIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                      class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd"
                                      d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                                    </svg>
                            </div>
                        </div>';
                        while($row_officers = mysqli_fetch_assoc($team_result)){
                              echo '<div class="card copCard">
                                        <div class="card-body copBody">
                                            <h6 class="copName" >' . $row_officers["first_name"] ." ". $row_officers["last_name"]  . '</h6>
                                                  <img src="'. $row_officers["photo_path"] . '" class="copPhoto">
                                                      <div class="copStatusColor"></div>
                                                    <label class="copStatus">מחובר</label>
                                                    <svg id="cameraIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                    d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                                                  </svg>
                                          </div>
                                    </div>';
                        }
                        ?>
            </section>
        </div>
        <?php
          if($row_user["premmisions"]==1){
          echo
          '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="btn_deleteEvent">סיים אירוע</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">סיום פעילות</h1>
                      <button type="botton" class="btn-close" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      בטוח/ה שברצונך לסיים את הפעילות
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">לא</button>
                        <a href="delete.php?event_id='.$event_id.'">
                          <button type="submit" class="btn btn-primary">כן</button>
                        </a>';};
                  ?>




                </main>
                <aside id="navigation">
                  <ul class="nav-flex-column">
                    <input class="form-control mr-sm-2" type="search" placeholder="חיפוש" aria-label="חיפוש">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">חיפוש</button>
                    <br>
          <li class="nav-item">
            <a class="nav-link active" href="list.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path
                  d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
              </svg> ראשי</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                <path
                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                <path
                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
              </svg> היסטוריית אירועים </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path
                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
              </svg> שליחת הודעה כללית </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                </svg> אנליזות</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                <path
                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                <path
                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
              </svg> היסטוריית התראות </a>
            </li>
            <li class="nav-item" <?php if($row_user["premmisions"]==1) echo 'hidden'; ?>>
                <a class="nav-link "   href="new_officer.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>הוסף שוטר חדש</a>
          </li>
            <div class="exit">
              <li class="nav-item">
                <a class="nav-link" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30"
                  fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                  <path
                    d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                  </svg> יציאה</a>
                </li>
              </div>
            </ul>
          </aside>
        </section>
  </section>
</body>
</html>
