<?php

//***************************************************************************************************
 function connectToDB() {
     global $dbConnection;
     $dbConnection = mysqli_connect("localhost","root", "inet2005","employees");
     if (!$dbConnection) {
         die('Could not connect to the Database: ' .  mysqli_connect_error());
      }
 }

//***************************************************************************************************
 function closeDB() {
     global $dbConnection;
     mysqli_close($dbConnection);
 }

//***************************************************************************************************
 function selectEmpWithNameStartingWith($searchString) {
     global $dbConnection;
     global $result;
     $sqlStatement = "SELECT * FROM employees WHERE first_name LIKE '$searchString%' OR last_name LIKE  '$searchString%' LIMIT 25";
//     $sqlStatement .=
//     $sqlStatement .= "%';
//     $sqlStatement .= "";
     $result = mysqli_query($dbConnection,$sqlStatement);
     if(!$result) {
        die('Could not retrieve records from the Database: ' .  mysqli_error($dbConnection));
    }
 }

//***************************************************************************************************
 function fetchEmp() {
     global $dbConnection;
     global $result;
     if(!$result) {
         die('No records in the result set: ' . mysqli_error($dbConnection));
    }
    return mysqli_fetch_assoc($result);
 }
?>