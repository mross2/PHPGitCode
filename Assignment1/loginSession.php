<?php

function checkLogin() {
    session_start();
    if ((empty($_SESSION['username']) || (empty($_SESSION['password'])))) {
        header("location: ../index.html");
    }
}

?>