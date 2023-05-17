<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body id=php>
    <h2><?php echo "ברוך הבא"?></h2>
    <h3>
    שם פעילות: <?php echo $_POST["actname"]?>
    <br>
    סוג פעילות: <?php echo $_POST["acttype"]?>
    <br>
    כמות כוחות: <?php echo $_POST["force"]?>
    <br>
    רמת סיכון: <?php echo $_POST["risk"]?>
    <br>
    קצין אחראי: <?php echo $_POST["officer"]?>
    <br>
    מיקום: <?php echo $_POST["loc"]?>
    <br>
    תאריך: <?php echo $_POST["date"]?>
    <br>
    שעה: <?php echo $_POST["hour"]?>
    <br>
    תיאור אירוע: <?php echo $_POST["description"]
    ?>;
</h3>
</body>
</html>