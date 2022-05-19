<?php

session_start();
include("dbConnection.php");
echo $_SESSION['uid'];
//     include("adminHeader.php");
if(isset($_SESSION['uid'])){//check authorized users
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $u = $_SESSION['uid'];
    $payment=$_POST['paymentmethod'];
    //  echo  "User ID".$u;
    $db1->query("INSERT INTO b49sw.orders
        (orders.order_date, orders.user_ID, orders.Payment_Type,orders.Delivery_Address,orders.Phone)
        VALUES( now(),'$u', '$payment','$address','$phone')");
    $order_id=$db1->lastInsertId();//get voucher number , order number
    //         var_dump($_SESSION['cart']);
    foreach($_SESSION['cart'] as $id => $qty){
        $db1->query ("INSERT INTO orderline
        (orderline.order_num, orderline.Product_ID,orderline.Qty) VALUES ($order_id,$id,$qty)
        ");
    }
    unset($_SESSION['cart']);
    unset($_SESSION['uid']);
    
    unset($_SESSION["username"]);
    session_destroy();
    echo "Your order has been submitted";
    //         header("location:login.php");
}
?>
       

<html>
<head>
<title>Products Order Submitted</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
$.ajax({
  url: 'submitorder.php',
  success: function(data) {
   
//      location.reload();
    	e.preventDefault();
  }
});
});
</script>
</head>
<body class="container">
	<h1>Products Order Submitted</h1>
    <div>
        Your Order had done successfully.
       <h1>Thank You for your shopping</h1>
        <a href="product.php" >Products Store Home</a>
    </div>
    <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>