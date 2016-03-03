<?php
require 'loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
    <title>Employee Records</title>
    <style type="text/css">
/*        Changes My background color and sets border size,type and color*/
        html{background-color: lightgoldenrodyellow}
        table,td,th {border: 1px solid blue;}
    </style>
</head>
<body>
<a href="php/logout.php">Logout</a>
<?php
//checks if next page was hit adds 25 to the offset if it was
if(isset($_POST['NextPg'])){
    $_POST['Offset'] = $_POST['Offset'] +25;
    $Offset = $_POST['Offset'];
}//checks if last page was hit subtracts 25 to the offset if it was
elseif(isset($_POST['LastPg'])){
    if(!($_POST['Offset'])==(0)) {
        $_POST['Offset'] = $_POST['Offset'] - 25;
        $Offset = $_POST['Offset'];
        }
    else{$Offset = 0;}
}else{//if neither button was pushed it sets or resets the offset to 0
    $Offset = 0;
    $_POST['Offset']=$Offset;
    }
//checks if the sorting button is pushed and change's the OrderBy to the value selected in the dropdown box
if(isset($_POST['sortSubmit'])){
    $OrderBy = $_POST['sortVal'];
}else{//if button wasn't pushed then it sets or resets the OrderBy back to emp_no
    $OrderBy= "emp_no";
    $_POST['sortVal'] = $OrderBy;
}
?>
<!--Form For Search, Paging and Sorting-->
<h2>Search first and last names in the database</h2>
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post" name="Employee Rec">
    <p>Search:<!--text box for searching-->
        <input name="search" type="text" value="<?php if(!empty($_POST['search'])){echo $_POST['search'];} ?>">
    </p>
    <p><!--Button for searching-->
        <input name="" type="submit">
    </p><!--HIDDEN POST variable for Paging-->
        <input name="Offset" type="hidden" value="<?php if(!empty($_POST['Offset'])){echo $_POST['Offset']; } else{echo 0;}?>" >
        <input name="LastPg" type="submit" value="Last Page"><!--LastPage Button-->
    <!--Spacing because Im lazy-->&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input name="NextPg" type="submit" value="Next Page"><!--NextPage Button-->
    </p>
    <p>
        Sort By:<!--ORDERBY Drop Down-->
        <select name="sortVal">
            <option value='emp_no'>Emp. Number</option>
            <option value='birth_date, emp_no'>Birth Date</option>
            <option value='first_name, emp_no'>First Name</option>
            <option value='last_name, emp_no'>Last Name</option>
            <option value='gender, emp_no'>Gender</option>
            <option value='hire_date, emp_no'>Hire Date</option>
            <option value='emp_no Desc'>Emp. Number Desc</option>
            <option value='birth_date Desc, emp_no Desc'>Birth Date Desc</option>
            <option value='first_name Desc, emp_no Desc'>First Name Desc</option>
            <option value='last_name Desc, emp_no Desc'>Last Name Desc</option>
            <option value='gender Desc, emp_no Desc'>Gender Desc</option>
            <option value='hire_date Desc, emp_no Desc'>Hire Date Desc</option>
        </select><!--ORDERBY Button-->
        <input name="sortSubmit" type="submit" value="Sort Now" />
    </p>
</form>
<table>
    <thead>
    <tr>
        <th>Emp. Number</th>
        <th>Birth Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //connect to database
    require_once('dbConn.php');
    $db = getDBConnection();
//    Checks if The Search box is Filled when either the Search Or Sort button
    if(isset($_POST['search'])||isset($_POST['sortSubmit'])) {
        $searchText = $_POST['search'];//sets $searchText Equal to the search Text Box Value
        //Magical Search Query that checks if first or last name contain the search text
        $result = mysqli_query($db, "SELECT * FROM employees WHERE first_name LIKE '%$searchText%' OR last_name LIKE '%$searchText%' ORDER BY $OrderBy LIMIT $Offset,25");
        if (!$result) {//If the result from the query didn't work then it makes the db connection die
            die('Could not retrieve records from the Employees Database: ' . mysqli_error($db));
        }
    }else{//If the search box wasn't set then runs this magical query that doesn't check if they contain the search and just grabs all
    $result = mysqli_query($db,"SELECT * FROM employees ORDER BY $OrderBy LIMIT $Offset,25");
    }
    if(!$result)//If the result from the query didn't work then it makes the db connection die
    {
        die('Could not retrieve records from the Employees Database: ' . mysqli_error($db));
    }//Creates a row with all of the results of currently selected section of result for each section  that result grabbed
    while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr><!--Sets the cells in the table to their respected value of the current row        -->
            <td><?php echo $row['emp_no'] ?></td>
            <td><?php echo $row['birth_date'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['hire_date'] ?></td>
            <td><!--adds the image buttons for edit that send you to that php file and sends that row's emp_no to the next php file-->
                <form action="EditEmp.php" method="post">
                    <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']?>"/>
                    <input type="image" src="edit.PNG" alt="submit"/>
                </form>
            </td>
            <td><!--adds the image buttons for delete that send you to that php file and sends that row's emp_no to the next php file-->
                <form action="DelEmp.php" method="post">
                    <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']?>"/>
                    <input type="image" src="Delete.PNG" alt="submit"/>
                </form>
            </td>
        </tr>
    <?php
    endwhile; //end while loop
    mysqli_close($db);//Closes the DataBase
    ?>
    </tbody>
</table>
<br/>
<!--Button/form For adding a new employee to the database-->
<form action="AddEmp.php">
    <input type="submit" value="Add Employee">
</form>
<br/>
</body>
</html><!--this is a html closing tag it closes the html tag-->
