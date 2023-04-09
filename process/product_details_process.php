<?php

 session_start();

require_once "../config/dbConnect.php"; 
 

//create uploadProduct process

if (isset($_POST["uploadProduct"])){
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_marketprice = mysqli_real_escape_string($dbConn, $_POST["product_marketprice"]);
	

	
	$farmer_insert= "INSERT INTO tbl_product_details(product_name , quantity, product_sellingprice, product_marketprice )VALUES('$product_name','$quantity','$product_sellingprice', '$product_marketprice')";
	
	
	if($dbConn->query($farmer_insert) === TRUE){
		header("Location: ../farmer/uploadedProduct.php");
		exit();
	}
	else{
		die("Failed to insert the record: " .$dbConn->error);
	}
	
}



// Delete product_details process
	
	if(isset($_GET["DeleteProduct"])){
	$DeleteProduct = mysqli_real_escape_string($dbConn, $_GET["DeleteProduct"]);
	
	$DeleteProduct_SQL = "DELETE FROM tbl_product_details WHERE product_id = '$DeleteProduct' LIMIT 1";
	 
	$uDelete_res = $dbConn->query($DeleteProduct_SQL);
	if($DeleteProduct_SQL === TRUE){
		header("Location: ../farmer/uploadedProduct.php");
			exit();
		
		}else{
		print $dbConn->error;
		header("Location: ../farmer/uploadedProduct.php");
			exit();
	}
}

	//Update product_details process
	
if (isset($_POST["updateUploadedProduct"])){ 
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_marketprice = mysqli_real_escape_string($dbConn, $_POST["product_marketprice"]);
	$product_id = mysqli_real_escape_string($dbConn, $_POST["product_id"]);
	
	
	
	$farmer_update= "UPDATE tbl_product_details SET product_name ='$product_name',quantity ='$quantity',product_sellingprice ='$product_sellingprice',product_marketprice ='$product_marketprice' WHERE product_id='$product_id' LIMIT 1";
	
	
	if($dbConn->query($farmer_update) === TRUE){
		header("Location: ../farmer/uploadedProduct.php");
		exit();
	}
	else{
		print $dbConn->error;
		
	
	}
	
}


?>