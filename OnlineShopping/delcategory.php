<?php
include 'adminheader.php';
include('dbConnection.php');
$id = $_GET['id'];
echo "$id";
$sql = "DELETE FROM Category WHERE Category_ID = $id";
$db1->exec($sql);
header("location: category.php");
?>
