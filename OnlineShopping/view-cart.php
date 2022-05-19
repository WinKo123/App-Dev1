<?php
session_start();
include("dbConnection.php"); //for connect to DB
include 'adminHeader.php';//for header navigation

if(!isset($_SESSION['cart'])) { // isEmpty shopping cart
  
    header("location:searchbycategory.php");
    exit();
}

?>
<!doctype html>
<html>
<head>
<title>View Cart</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
/* Style buttons */

div .row  {
margin-top:20px;
}
.btn {
  background-color: DodgerBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
  border-radius: 4px;
}
.row .order{
margin-right:10px;
margin-left:10px;
}
.table.align-middle.table-striped{
    border-color: #21d192;
}
.total{
font-weight:bold;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: white;/*RoyalBlue;*/
}
input[type="number"] {
   width:50px;
}
</style>

<script>
	function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "update-pro-cart.php",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
 		success:function (data) {}
 
       
	});
	 setInterval('location.reload()', 50);  
}
</script>
 

</head>
<body>
<div class="container mx-auto">
<div class="row">
<!-- <h1 align="center">View Shopping Cart</h1> -->

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
	<thead class="til" border="0" mt-6>
     <tr>
    	<th colspan="5" align="center"><h2 align="center"  class="p-3 mb-2 bg-info text-white">Your Order Summary</h2></th>
     </tr>
    </thead>
<form action="viewcart.php" method="post" id="my-form">
    <table class="table align-middle table-striped" mt-50 border="1">
    
    <thead>
    <tr>
        <th class="font-weight-bold text-white " style="background-color: #21d192;">Product Name</th>
        <th class="font-weight-bold text-white " style="background-color: #21d192;">Quantity</th>
        <th class=" font-weight-bold text-white " style="background-color: #21d192;">Unit Price</th>
        <th class=" font-weight-bold text-white " style="background-color: #21d192;">Subtotal</th>
        <th class=" font-weight-bold text-white " style="background-color: #21d192;">Update</th>
        <th class=" font-weight-bold text-white " style="background-color: #21d192;">Delete</th>
    </tr>
     <thead>
<?php
$total = 0; //for total amount
$p=0;
// var_dump($_SESSION['cart']);

foreach($_SESSION['cart'] as $id=>$qty):
 
    $result=("SELECT Product_Name, Price FROM product WHERE Product_ID='$id'");

    foreach($db1->query($result) as $row)
    {
        
       
        $p=$row['Price'];
      
        
        
    }
    $total += $row['Price'] * $qty;
?>
<tr>
<td><?php echo $row['Product_Name'] ?></td>
<td>
<!-- <input  onclick="saveCart(this);" size="2" type="number" name="qty" step="1" id="<?php echo $id ?>" value="<?php echo $qty ?>">-->

<input onclick="save(this);"  size="2" type="number" name="qty" step="1" id="<?php echo $id ?>" value="<?php echo $qty ?>"> 

</td>
<td>$<?php echo $row['Price'] ?></td>
<td id="total">$<?php echo $row['Price'] * $qty ?></td>
<td> 
<button type="submit">
	update
</button>
   	


<script>
  function save(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "up-pro-cart.php",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
 	//	success:function (data) {}
 
       
	});
	
// 	 setInterval('location.reload()', 50);  
	 }
</script>
	
 
</td>
<td> 
	<a href="delprocart.php?id=<?php echo $id ?>"  style="text-decoration:none;color:black; " >
	<i class="fa fa-trash" aria-hidden="true"></i> </a>

</td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="3" align="right" style="font-weight:bold;font-size:20px;"><b>Total:</b></td>
<td colspan="2"class="total" style="font-weight:bold;font-size:20px;">$<?php echo  $total; ?></td>
</tr>
<tr>

<td colspan="3" align="center">
	<button type="button" class="btn btn-info"><a href="searchbycategory.php"style="color: black";>&laquo; Continue Shopping</a></button>
</td>
<td colspan="2" align="right">
<button type="button" class="btn btn-info"><a href="clearcart.php" id="del" style="color: black";>&times; Clear Cart</a></button>
</td>


</tr>
</table>

</form>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

<div class="row  border order">
<h2 class="display-6">Order Now</h2>
<form action="submitorder.php" method="post">
<div class="col-md-6"></div>
<input type="hidden" name="usid" value=<?php 
            if(!isset($_SESSION['uid'])){
                echo "";
            }
            else {
                echo $_SESSION['uid'];
            }
            ?>
            >
</div>
<div class="col-md-12">
    <label for="name">Your Name</label>
    <input type="text" name="name" class="form-control" id="name" disabled value=<?php if(!isset($_SESSION['username'])){
                                                    echo "";
                                            }
                                            else{
                                                echo $_SESSION['username'];}?> >
</div>   
<div class="col-md-12">                                            
<label for="email">Email</label>
<input type="text" name="email" class="form-control" id="email" disabled value=<?php if(!isset($_SESSION['email'])){
                                                    echo "";
                                            }
                                            else{
                                                echo $_SESSION['email'];}?> >
 </div>   
 
 <div class="col-md-12">                                                 
<label for="phone">Phone</label>
<input type="text" name="phone" id="phone" class="form-control" >
 </div>
 <div class="col-md-12"> 
	<label for="address">Address</label>
	<textarea name="address" id="address" class="form-control"></textarea>
</div>
<div class="col-md-12">
<tr>
                                    <td>Shippffing</td>
                                    <td class="d-flex justify-content-center">
                                        <ul class="shipping-type">
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="flatrate" name="shipping"
                                                           class="custom-control-input" checked/>
                                                    <label class="custom-control-label" for="flatrate">Flat Rate:
                                                        $70.00</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="freeshipping" name="shipping"
                                                           class="custom-control-input"/>
                                                    <label class="custom-control-label" for="freeshipping">Free
                                                        Shipping</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                
                                 <!-- Order Payment Methodss -->
                        <div class="order-payment-method">
                            <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                               class="custom-control-input" checked/>
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="cash">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="directbank" name="paymentmethod" value="bank"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="directbank">Direct Bank
                                            Transfer</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="bank">
                                    
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="checkpayment" name="paymentmethod" value="check"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="checkpayment">Pay with Check</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="check">
                                    
                                </div>
                            </div>

                                                            

</div>
<div class="col-md-12"> 
<?php if(!isset($_SESSION['uid'])){ ?>
	<input type="submit" disabled value="Submit Order" class="form-control">
<?php }?>
<?php if(isset($_SESSION['uid'])) {?>
<input type="submit" value="Submit Order">
<?php }?>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="container">
<?php include 'footer.php';?>
</div>
</body>


</html>