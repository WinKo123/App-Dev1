<?php

session_start();
$id = $_GET['id '];//accept product id
unset ($_SESSION['cart'][$id]);//delete product
header("location:viewcart.php");

?>