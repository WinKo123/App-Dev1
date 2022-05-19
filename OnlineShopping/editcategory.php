<html lang="en-US">
<head>
 <meta charset="UTF-8">
 <title></title>
</head>
<body>
<h1>Category Edit</h1>
<?php 
    include("adminheader.php");
    include("dbConnection.php");
    $id = $_GET['id'];
    $result = $db1->query("SELECT * FROM Category WHERE Category_ID = $id");
    if($result->rowCount() > 0){
    foreach ($result as $row)
    {
      $Categoryid = $row['Category_ID'];
      $CategoryName = $row['Category_Name'];
    }
    }
?>
<?php 
    if(isset($_POST['btnupdate']))
    {
        echo $id."id...";
     
             $id = $_POST['id'];
             $name = $_POST['name'];
             if($name){
                $sql = "UPDATE Category SET Category_Name=? WHERE Category_ID=?";
                $stmt = $db1-> prepare($sql);
                $stmt -> execute([$name, $id]);
                echo "Data updating";
            }else{
                $sql = "UPDATE Category SET Category_Name=? WHERE Category_ID=?";
                $stmt = $db1-> prepare($sql);
                $stmt -> execute([$name, $id]);
                echo "Data can't update";
            }
             header("location:category.php");
    } 
?>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Categoryid ?>">
        
        <label for="name">Category Name</label>
        <input type="text" name="name" value="<?php echo $CategoryName ?>">
         <br><br>
        <input type="submit" name="btnupdate" value="Category Update">
    </form>
</body>
</html>
<?php
include 'footer.php';
?>