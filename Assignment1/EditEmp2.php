<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>EditEmp2</title>
</head>
<body>
<?php
require_once('dbConn.php');
$db = getDBConnection();

    $emp_no = $_POST['emp_no'];
    $birth_date= $_POST['birth_date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $hire_date = $_POST['hire_date'];
    mysqli_query($db, "UPDATE employees SET birth_date = '$birth_date',first_name = '$first_name', last_name = '$last_name', gender = '$gender', hire_date = '$hire_date' WHERE emp_no = '$emp_no'");
    echo "Successfully Updated ".mysqli_affected_rows($db)." row!!!";
    ?>
    <br/><a href="http://localhost:8880/employeeRecords.php">Return to last Page!</a>
<?php
mysqli_close($db);
?>
</body>
</html>