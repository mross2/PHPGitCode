<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>DelEmp2</title>
    <style type="text/css">
        html{background-color: lightgoldenrodyellow}
    </style>
</head>
<body>
<?php
require_once('dbConn.php');
$db = getDBConnection();

if(!empty($_POST['emp_no'])){
    $emp_no = $_POST['emp_no'];
    mysqli_query($db,"DELETE FROM employees WHERE emp_no = '$emp_no'");
    echo "Successfully Deleted ".mysqli_affected_rows($db)." row!!!";

}else{
    echo "<p>Invalid input</p>";
}
?>
<br/><a href="http://localhost:8880/employeeRecords.php">Return to last Page!</a>
</body>
</html>