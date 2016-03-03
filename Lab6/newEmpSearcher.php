<?php
    // Let's simulate a slow page load from the Server
    //sleep(1);
            
    $searchValue = "";

    if(!empty($_GET['q'])) {
        $searchValue = $_GET['q'];

        include("dbConn.php");

        connectToDB();

        selectEmpWithNameStartingWith($searchValue);


        while ($row = fetchEmp()) {
            echo $row['first_name'] . " " . $row['last_name'] . "<br/>";
        }

        closeDB();
    }
?>
           