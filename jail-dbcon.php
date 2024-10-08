<?php

$con = mysqli_connect("localhost", "root", "", "jail_db");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
?>
