<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>DelEmp</title>
    <style type="text/css">
        html{background-color: lightgoldenrodyellow}
        h1{font-weight: bold; color: red;}
    </style>
</head>
<body>
<?php
require_once('dbConn.php');
$db = getDBConnection();

if(!empty($_POST['emp_no'])) {
    $emp_no = $_POST['emp_no'];
    $result = mysqli_query($db, "SELECT * FROM employees WHERE emp_no LIKE $emp_no");
    while ($row = mysqli_fetch_assoc($result)):
        ?>
        <h1>Are You Sure You Want to Delete <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?> From The Employees Data base?!</h1>
        <form action="DelEmp2.php" method="post">
            <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']?>"/>
            <input type="submit" name="Submit" value="YES!!!" />
        </form>
        <?php
    endwhile;}
mysqli_close($db);
?>
<br/><a href="http://localhost:8880/employeeRecords.php">Return to last Page!</a>
</body>
</html>