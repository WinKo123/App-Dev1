<?php
session_start();
unset($_SESSION['cart']);
unset($_SESSION['username']);
header("location:searchbycategory.php");
?>
