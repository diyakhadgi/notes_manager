<?php
include "dbconnect.php";
$id = $_GET["id"];
$deleteQuery = "DELETE FROM `note` WHERE `id`='$id'";
$result = mysqli_query($conn, $deleteQuery);
header("location: welcome.php");
?>
