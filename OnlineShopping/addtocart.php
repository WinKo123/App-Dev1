<?php
session_start();
$id = $_GET['id'];//accept product id
$_SESSION['cart'][$id]++;
echo "Product id ".$id;
echo"<br>";
echo  $_SESSION['cart'][$id];
header("location:searchbycategory.php");
?>
