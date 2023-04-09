<?php

 session_start();

require_once "../config/dbConnect.php"; 
 

//create order_details process

if (isset($_POST["provideProduct"])){
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_buyingprice = mysqli_real_escape_string($dbConn, $_POST["product_buyingprice"]);
	
	
	
	$farmer_insert= "INSERT INTO tbl_order_details(product_name , quantity, product_sellingprice, product_buyingprice )VALUES('$product_name','$quantity','$product_sellingprice', '$product_buyingprice')";
	
//Acess Quantity_stock from the database
//$quantity_saved = $Quantity_stock - $quantity;
//if($quantity_saved < = quantity_stock){
//Update Quantity stock}
//else {quantity entered is more than available quantity in the stock}

//save the authenticated user.
	
	if($dbConn->query($farmer_insert) === TRUE){
		header("Location: ../farmer/product.php");
		exit();
	}
	else{
		die("Failed to insert the record: " .$dbConn->error);
	}
	
}




//Google how to update a record in php
// Delete order_details process
	
	if(isset($_GET["DeleteOrder"])){
	$DeleteOrder = mysqli_real_escape_string($dbConn, $_GET["DeleteOrder"]);
	
	$DeleteOrder_SQL = "DELETE FROM tbl_order_details WHERE order_details_id = '$DeleteOrder' LIMIT 1";
	 
	$uDelete_res = $dbConn->query($DeleteOrder_SQL);
	if($DeleteOrder_SQL === TRUE){
		header("Location: ../farmer/product.php");
			exit();
		
		}else{
		print $dbConn->error;
		header("Location: ../farmer/product.php");
			exit();
	}
}

	//Update order_details process
	
	if (isset($_POST["updateProvidedProduct"])){ 
	$Client_name = mysqli_real_escape_string($dbConn, $_POST["Client_name"]);
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_buyingprice = mysqli_real_escape_string($dbConn, $_POST["product_buyingprice"]);


	$farmer_update= "UPDATE tbl_order_details SET Client_name= '$Client_name', product_name ='$product_name',quantity ='$quantity', product_sellingprice ='$product_sellingprice', product_buyingprice ='$product_buyingprice' WHERE order_details_id='$order_details_id' LIMIT 1";
	
	
	if($dbConn->query($farmer_update) === TRUE){
		header("Location: ../farmer/product.php");
		exit();
	}
	else{
		print $dbConn->error;
		
	
	}
	
}


?>