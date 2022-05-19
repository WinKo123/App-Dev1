<?php
session_start();
include 'dbConnection.php';
include 'adminHeader.php';

$result = "select * from Category";
?>
<div class="container">
<ul>

<?php foreach($db1->query($result) as $row)
{
    
    $id=$row['Category_ID'];
    $catname=$row['Category_Name'];
    
    
    
    ?>
 	 
<?php }
?>
</ul>
</div>
<?php  
 //login_success.php  

 if(isset($_SESSION["username"]))  
 {  
      
      echo '<center><h3>Login Success, Welcome - '.$_SESSION["username"].'</h3></center>';  
      echo '<p align=center><br /><br /><a href="logout.php">Logout</a><p>';  

     
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>  

<head>
	
</head>
<body>

<div class="row justify-content-center">

<div class="col-auto">
  <table class="table table-responsive">
    <tr>
    	<th colspan="5" class="text-center">Category List</th>
    <tr>
    <tr >
			<th>Category ID</th> 
			<th>Category Name</th>  
			<th>Delete</th> 
			<th>Edit</th> 
			
	</tr>
	<?php foreach($db1->query($result) as $row)
	 {?>
		<tr >
			<td><?php echo $row['Category_ID']?></td> 
			<td><?php echo $row['Category_Name']?></td> 
			<td> [<a href="delcategory.php?id=<?php echo $row['Category_ID']?>"> del</a> ]</td> 
			<td>[<a href="editcategory.php?id=<?php echo $row['Category_ID']?>">edit</a> ]</td> 
		</tr>
		
	<?php }?>
  </table>
  <div>
  </div>
   <p align="center"><a href="addcategory.php" class="text-info" >Add New Category &raquo;</a><p>
</div>	

</div>
<div class = "container">
	<?php include 'footer.php';?>
</div>

</body>
</html>
