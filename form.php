
<?php
    include 'db.php';
    include 'config.php';

    session_start();

    if(!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'index.php');
    }
    $userID = $_SESSION["user_id"] ;
    $officer_id = $_SESSION["officer_id"] ; 
    $query_user  = "select * from tbl_206_officers inner join tbl_206_users using (officer_id) where officer_id=" . $officer_id;
    $result_user = mysqli_query($connection , $query_user);
    $row_user    = mysqli_fetch_array($result_user);
    $event_id = null;
    if (!empty($_GET["event_id"])) { 
      
      $_SESSION["event_id"] = $_GET["event_id"];
        $event_id = $_GET["event_id"];
        $query  = "SELECT * FROM tbl_206_events e join tbl_206_officers o on e.offcer_owner = o.officer_id  WHERE e.event_id=".$event_id.";";
        $result = mysqli_query($connection , $query);

        if($result) { 
            $row    = mysqli_fetch_assoc($result); 
            
        }
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
      <main id="main">
      <?php if (isset($_GET["event_id"])){ echo "<h2>עריכה</h2>";}else{echo "<h2>הוספת אירוע חדש</h2>";}?>
                <form  id="add_form" method="POST" action=""  class="form-check">
                <br><br><br>
                <div class="row d-lg-column-reverse">
                <div class="col-lg-6">
                    <div class="input-group input-group-lg">
                    <div class="input-group mb-3 input-group-lg">
                    <select class="form-select" name="loc" id="loc" style="direction: rtl;" <?php if (isset($_GET["event_id"])){ echo 'data-selected="'. $row["location"].'"';}?>>
                      <option value="שפרעם">שפרעם</option>
                      <option value="עפולה">עפולה</option>
                      <option value="רמת גן">רמת גן</option>
                      <option value="תל אביב">תל אביב</option>
                      <option value="ירושלים">ירושלים</option>
                      <option value="אילת">אילת</option>
                      <option value="נתניה">נתניה</option>
                      <option value="קריית שמונה">קריית שמונה</option>
                      <option value="עכו">עכו</option>
                      <option value="נהריה">נהריה</option>
                      <option value="כפר סבא">כפר סבא</option>
                      <option value="חיפה">חיפה</option>
                      <option value="בית שאן">בית שאן</option>
                      <option value="רעננה">רעננה</option>
                      <option value="ראשון לציון">ראשון לציון</option>
                    </select>
                    <label class="input-group-text" for="loc">מיקום</label>
                  </div>
                    </div><br>
                    <div class="input-group input-group-lg">
                        <input type="date" name="date" id="date"  class="form-control" placeholder="תאריך" required  <?php if (isset($_GET["event_id"])){ echo 'value="'. $row["date"].'"';}?>>
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg>
                        </span>
                    </div><br><br>
                    <div class="input-group input-group-lg">
                        <input type="text"  name="hour" class="form-control" placeholder="שעה" <?php if (isset($_GET["event_id"])){ echo 'value="'. $row["time_start"].'"';}?>>
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                              </svg>
                        </span>
                    </div>
                    <br><br>
                </div>
                <div class="col-lg-6" >
                    <div class="input-group input-group-lg">
                    <input type="text" name="actname" id="actname" class="form-control"   placeholder=" שם פעילות" required <?php if (isset($_GET["event_id"])){ echo 'value="'. $row["title"].'"';}?>>
                    <span class="input-group-text">שם פעילות</span>
                </div><br><br>
                <div class="input-group input-group-lg">
                    <input type="text" name="acttype" id="acttype" class="form-control" placeholder="סוג פעילות" <?php if (isset($_GET["event_id"])){ echo 'value="'. $row["event_type"].'"';}?>>
                    <span class="input-group-text"> סוג פעילות</span>
                </div><br><br>
                <div class="input-group mb-3 input-group-lg">
                    <select class="form-select" name="force_Qty" id="force_Qty" style="direction: rtl;" <?php if (isset($_GET["event_id"])){ echo 'data-selected="'. $row["officer_qty"].'"';}?>>
                      <option value="אריה">אריה</option>
                      <option value="השלום">השלום</option>
                      <option value="ירושלים מרכז">ירושלים מרכז</option>
                      <option value="הבולדוזרים">הבולדוזרים</option>
                    </select>
                    <label class="input-group-text" for="force_Qty">בחירת צוות</label>
                  </div>
                <br>
                <div class="input-group mb-3 input-group-lg">
                    <select class="form-select" name="risk" id="risk" style="direction: rtl;"  <?php if (isset($_GET["event_id"])){ echo 'data-selected="'. $row["risk_level"].'"';}?>>
                      <option value="נמוכה">נמוכה</option>
                      <option value="בינונית">בינונית</option>
                      <option value="גבוהה">גבוהה</option>
                    </select>
                    <label class="input-group-text" for="risk">רמת סיכון</label>
                  </div>
                <br>
            </div>
            <div class="input-group input-group-lg">
                <textarea name="description" id="description" cols="50" class="form-control" <?php if (isset($_GET["event_id"])){ echo 'value="'. $row["description"].'"';}?>></textarea> 
                <span class="input-group-text">סיכום אירוע</span>
            </div><br><br>
            <input type="hidden" id="event_id" name="event_id" <?php if (isset($_GET["event_id"])){ echo 'value='. $row["event_id"];}?>>
            <button id="btnform" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                אישור
              </button>
                    </div>
                    <div id="msg"></div>
            </form>
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
  <script>makeSelected ("#loc")</script>
  <script>makeSelected ("#force_Qty")</script>
  <script>makeSelected ("#risk")</script>
  <script>sub()</script>
</body>
</html>


<?php
	
	
mysqli_close($connection);
?>