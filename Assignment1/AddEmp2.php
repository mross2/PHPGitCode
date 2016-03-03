<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>AddEmp2</title>
</head>
<body>
<?php
require_once('dbConn.php');
$db = getDBConnection();
if(!empty($_POST['birth_date'])||($_POST['first_name'])||($_POST['last_name'])||($_POST['gender'])||($_POST['hire_date'])) {
    $result = mysqli_query($db, "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($result)){
        $emp_no = $row['emp_no']+1;
    }
    $birth_date = $_POST['birth_date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $hire_date = $_POST['hire_date'];
    mysqli_query($db, "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES ('$emp_no','$birth_date','$first_name','$last_name','$gender','$hire_date')");
    echo "Successfully affected " . mysqli_affected_rows($db) . " row!!!";
    ?>
    <br/><a href="http://localhost:8880/employeeRecords.php">Return to last Page!</a>
<?php
}mysqli_close($db);
?>
</body>
</html>