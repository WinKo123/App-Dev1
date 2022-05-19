<?php
session_start();
include 'dbConnection.php';
include_once "adminHeader.php";

?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
echo $id." first loading id ...";



$sql="select * from product where Product_ID='$id'";

foreach($db1->query($sql) as $row)
{
    
    $description=$row['Product_Name'];
    $price=$row['Price'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>


	
</head>
<body>




<div class="container">


	



</div><!-- container //  -->


<form method="post"  enctype="multipart/form-data">
  <div class="container">
    <h1>Edit Product Information</h1>
    <p>Please fill in this form to update product information.</p>
    <hr>

   

	
	<label for="title">Product Description</label>
	<input type="text" name="Product_Name" id="Product_Name" value="<?php echo $description ?>">
	<label for="Price">Price</label>
	<input type="text" name="Price" id="Price" value="<?php echo $price ?>">
	<label for="Category">Category</label>
    <select name="Category_ID" id="category">
    <option value="0">-- Choose --</option>
    
    <?php
    $category = "select * from Category";
    ?>
   <?php foreach(($db1->query($category)) as $cat){
    ?>
    <option value="<?php echo $cat['Category_ID'] ?>"
    <?php if($cat['Category_ID'] == $row['Category_ID']) echo "selected" ?> >
    <?php echo $cat['Category_Name'] ?>
    </option>
    <?php } ?>
    </select>
    <br><br>
    <img src="image/<?php echo $row['Photo'] ?>" alt="" height="150">
    <label for="image">Change Photo</label>
    <input type="file" name="image" id="image">
    <br><br>
    <button type="submit" name="btnupdate" value="Update Product">Update</button>
    <a href="product.php">Back</a>
    
  </div>
  
  
</form>
</body>
</html>


<?php 
    if(isset($_POST['btnupdate']))
{
   
    echo $id ." id ...";
        
         $des=$_POST['Product_Name'];
        $price=$_POST['Price'];
        $category_id = $_POST['Category_ID'];
        $cosmetic = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        if($cosmetic) {
            move_uploaded_file($tmp, "image/$cosmetic");
            $sql = "UPDATE product SET Product_Name='$des', Price='$price', Category_ID='$category_id',Photo='$cosmetic' WHERE Product_ID = '$id'";
        } else {
            $sql = "UPDATE product SET Product_Name='$des', Price='$price', Category_ID='$category_id' WHERE Product_ID = '$id'";
        }
        $db1->query($sql);
//         header("location: product-list.php");
    
}

?>
<?php
include 'footer.php';
?>