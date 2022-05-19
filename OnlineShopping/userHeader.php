
<?php 
 
 $cart = 0;
 if(isset($_SESSION['cart'])) {
     foreach($_SESSION['cart'] as $qty) {
         $cart += $qty;
     }
 }
 ?>
 <?php if(isset($_SESSION["username"]))  
    {
    
    $userName = $_SESSION["username"];

    
    
    }  ?>
<!doctype html>
<html lang="en">
  
  <head>

<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<!--     <h1>Hello, world!</h1> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MEGA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="indexuser.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="searchbycategoryuser.php">Product</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="aboutususer.php">Contact us</a>
      </li>
    </ul>
    
<ul class="navbar-nav ms-auto">
  
  <li class="nav-item">
  <a href="view-cartuser.php"  class="cart position-relative d-inline-flex mt-3" style="text-decoration:none;">
   <i class="fas fa fa-shopping-cart fa-lg "></i> <!-- Shopping cart icon -->
   <span class="cart-basket d-flex align-items-center justify-content-center"><!-- buy quantity-->
             <?php echo $cart  ?>
           </span>
           
     </a>
  </li>
  
  
  <li class="nav-item">

   <a class="nav-link" href="login.php">

    <i class="fas fa-sign-in-alt mt-2"></i>
   </a>
   
  </li>
  <li class="nav-item dropdown">
   <a class="nav-link  dropdown-toggle mt-2" href="" data-bs-toggle="dropdown" > 
   <?php
   if(isset($_SESSION["username"])){
       echo $_SESSION["username"];
   }
   else{?>
       <i class="fas fa-sign-out-alt"></i>
   <?php } 
    ?> </a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="login.php">Logout </a></li>
       
   </ul>
      
  </li>
 </ul>
   
  </div>
</nav>


</body>
</html>
