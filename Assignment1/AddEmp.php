<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>AddEmp</title>
<!--my add employee form page-->
    <style type="text/css">
        html{background-color: lightgoldenrodyellow}
    </style>
</head>
<body>
        <form action="AddEmp2.php" method="post" onsubmit="return validForm()">
            Birth Date:
            <input type="date" id="birth" name="birth_date" required/><br/>
            First name:
            <input Type="text" id="fName" class="textBox" name="first_name" /><br />
            Last name:
            <input Type="text" id="lName" class="textBox" name="last_name" /><br/>
            Gender:
            <input type="text" id="gender" class="textBox" name="gender" ><br/>
            Hire Date:
            <input type="date" id="hire" name="hire_date" required><br/>
            <input Type="submit" name="Submit" value="Add Employee"/><br/>
        </form>
<script src="Scripts.js"></script>
</body>
</html>