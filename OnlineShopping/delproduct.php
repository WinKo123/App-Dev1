<?php
include 'adminheader.php';
include('dbConnection.php');
$id = $_GET['id'];
echo "$id";
$sql = "DELETE FROM Product WHERE Product_ID = $id";
$db1->exec($sql);
header("location: product.php");
?>
