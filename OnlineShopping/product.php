<?php
session_start();
include 'dbConnection.php';
include 'adminHeader.php';

$result = "select * from product";
?>

<div class="container">
<ul>
<?php  
 //login_success.php  

 if(isset($_SESSION["username"]))  
 {  
      
      echo '<center><h3>Login Success, Welcome - '.$_SESSION["username"].'</h3></center>';  
      echo '<p align=center><br /><br /><a href="logout.php">Logout</a><p>';  

     
 }  
 ?>  
 </ul>
</div>
<head>
 
</head>
<body>

<div class="container">
 <div class="row justify-content-center">

<div class="col-auto">
  <table class="table table-responsive">
    <tr> 
     <th colspan="5" class="text-center">Product List</th>
    <tr>
    <tr >
   <th>Product_ID</th> 
   <th>Product_Name</th> 
   <th class="text-center">Photo</th> 
   <th>Price</th>
   <th>Delete</th> 
   <th>Edit</th> 
   
 </tr>
 <?php foreach($db1->query($result) as $row)
  {?>
  <tr >
   <td><?php echo $row['Product_ID']?></td> 
   <td><?php echo $row['Product_Name']?></td> 
   
   <td><img class="img-respnsive img-thumbnail bg-image" width="150" height="150" src="image/<?php echo $row['Photo']?>" alt=""></td> 
   
   <td><?php echo $row['Price']?></td>
   
   <td> [<a href="delproduct.php?id=<?php echo $row['Product_ID']?>"> del</a> ]</td> 
   <td>[<a href="editproduct.php?id=<?php echo $row['Product_ID']?>">edit</a> ]</td> 
  </tr>
  
 <?php }?>
  </table>
  <div>
  </div>
   <p align="center"><a href="addproduct.php" class="text-info" >Add Product &raquo;</a><p>
</div> 

</div>
</div>
<div class = "">
 <?php //include 'adminfooter.php';?>
</div>

</body>
</html>
<?php
include 'footer.php';
?>