<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>EditEmp</title>

    <style type="text/css">
        html{background-color: lightgoldenrodyellow}
    </style>
</head>
<body>
<?php
require_once('dbConn.php');
$db = getDBConnection();

    $emp_no = $_POST['emp_no'];
    $result = mysqli_query($db, "SELECT * FROM employees WHERE emp_no LIKE $emp_no");
    while ($row = mysqli_fetch_assoc($result)):
        ?>
        <form action="EditEmp2.php" method="post" onsubmit="return validForm()">
            <input type="hidden" name="emp_no" value="<?php echo "$emp_no"?>">
            Birth Date:
            <input type="date" id="birth" name="birth_date" value="<?php echo $row['birth_date'] ?>" required><br/>
            First name:
            <input Type="text" id="fName" class="textBox" name="first_name" value="<?php echo $row['first_name'] ?>"/><br />
            Last name:
            <input Type="text" id="lName" class="textBox" name="last_name" value="<?php echo $row['last_name'] ?>"/><br/>
            Gender:
            <input type="text" id="gender" class="textBox" name="gender" value="<?php echo $row['gender'] ?>"><br/>
            Hire Date:
            <input type="date" id="hire" name="hire_date" value="<?php echo $row['hire_date'] ?>" required><br/>
            <input Type="submit" name="Submit" value="Update Employee"/><br/>
        </form>
    <?php
    endwhile;
mysqli_close($db);
?>
<script src="Scripts.js"></script>
</body>
</html>