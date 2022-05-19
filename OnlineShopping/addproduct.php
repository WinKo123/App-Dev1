
<?php
session_start();
include 'dbConnection.php';
include 'adminHeader.php';

if(isset($_POST['Submit']))
{
    $description=$_POST['PN'];
    $price=$_POST['price'];
    $category_id = $_POST['category_id'];
    $photo = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    if($photo) {
        move_uploaded_file($tmp, "image/$photo");
    }
    $sql = "INSERT INTO product (Product_Name,Category_ID,Photo,Price) VALUES ('$description', '$category_id','$photo','$price')";
    $db1->exec($sql);
    echo "<div> New product is inserted successfully</div>";
    // header("location: book-list.php");
}
?>
<body>
 <div class="container">
 <form method="Post" action="addproduct.php" enctype="multipart/form-data">
  
  <table>
   <tr>
    <td>Product Name:</td>
    <td><input type="text" name="PN"></td>
   </tr>

<tr>
   <td>
    <label for="price">Price</label>
   </td>
   <td>
   <input type="text" name="price" id="price">
   </td>
  </tr>
  <tr>
   <td>
   <label for="category">Category</label>
   </td>
   <td>
   <select name="category_id" id="categories">
   <option value="0">-- Choose --</option>
   <?php

            $result =  "SELECT Category_ID, Category_Name FROM Category";
            foreach ($db1->query($result) as $row) {
   
            ?>
   <option value="<?php echo $row['Category_ID'] ?>">
   <?php echo $row['Category_Name'] ?>
   </option>
   <?php } ?>
  </select>
   </td>
  </tr>
  <tr>
   <td>
   <label for="cosmetic">Photo</label>
   </td>
   <td>
   <input type="file" name="image" id="cosmetic">
   </td>
  </tr>
  </table>
  <input type="submit" name="Submit" class="btn btn-primary">
  <a href ="product.php">Go back to ProductList</a>
 </form>
 </div>
 </body>
<?php
include 'footer.php';
?>
