<?php
include 'adminHeader.php';
include 'dbConnection.php';
?>
<html>
<head>
 <meta charset="UTF-8">
<title>CategoryAdd Form</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
 <body>
 <div class="container">
 <form method="Post" action="addcategory.php" enctype="multipart/form-data">
  
  <table>
   <tr>
    <td>Category Name:</td>
    <td><input type="text" name="CN"></td>
   </tr>
   
  </table>
  <input type="submit" name="Submit" class="btn btn-primary">
  <a href ="category.php">Go back to CategoryList</a>
 </form>
 </div>
 </body>
</html>

<?php 
    //if ($_SERVER["REQUEST_METHOD"]=="POST") {
if(isset($_POST['Submit'])){
    $CAN = $_POST['CN'];
   

    
    //Create our SQL query.
    $sql = "INSERT INTO Category(Category_Name) VALUES (?)";
    $stmt = $db1->prepare($sql);
    $stmt->execute([$CAN]);
    }
 ?>
 <?php
include 'footer.php';
?>