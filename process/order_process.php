<?php

 session_start();

require_once "../config/dbConnect.php"; 
 

//create order process

if (isset($_POST["order"])){
    $product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);	
	$product_buyingprice = mysqli_real_escape_string($dbConn, $_POST["product_buyingprice"]);

	$farmer_insert= "INSERT INTO tbl_order_details(, product_name , quantity, product_buyingprice )VALUES('$product_name','$quantity', '$product_buyingprice')";
	
	
	if($dbConn->query($farmer_insert) === TRUE){
		header("Location: ../Client/payment.php");
		exit();
	}
	else{
		die("Failed to insert the record: " .$dbConn->error);
	}
	
}



// Delete order process
	
	if(isset($_GET["DeleteOrder"])){
	$DeleteOrder = mysqli_real_escape_string($dbConn, $_GET["DeleteOrder"]);
	
	$DeleteOrder_SQL = "DELETE FROM tbl_order WHERE order_id = '$DeleteOrder' LIMIT 1";
	 
	$uDelete_res = $dbConn->query($DeleteOrder_SQL);
	if($DeleteOrder_SQL === TRUE){
		header("Location: ../Client/payment.php");
			exit();
		
		}else{
		print $dbConn->error;
		header("Location: ../Client/payment.php");
			exit();
	}
}

	//Update order process
	
	if (isset($_POST["updateOrder"])){ 
    $product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);	
	$product_buyingprice = mysqli_real_escape_string($dbConn, $_POST["product_buyingprice"]);
    $order_id = mysqli_real_escape_string($dbConn, $_POST["order_id"]);
	 
	$farmer_update= "UPDATE tbl_order SET product_name='$product_name',quantity ='$quantity',product_buyingprice ='$product_buyingprice' WHERE order_id='$order_id' LIMIT 1";
	
	
	if($dbConn->query($farmer_update) === TRUE){
		header("Location: ../Client/payment.php");
		exit();
	}
	else{
		print $dbConn->error;
		
	
	}
	
}


?>