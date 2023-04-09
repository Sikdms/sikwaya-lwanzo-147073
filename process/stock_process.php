<?php

 session_start();

require_once "../config/dbConnect.php"; 
 

//create stock process

if (isset($_POST["recordFarmProduce"])){
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_marketpice = mysqli_real_escape_string($dbConn, $_POST["product_marketprice"]);
	
	$farmer_insert= "INSERT INTO tbl_stock(product_name , quantity, product_sellingprice, product_marketprice )VALUES('$product_name','$quantity','$product_sellingprice', '$product_marketprice')";
	
	
	if($dbConn->query($farmer_insert) === TRUE){
		header("Location: ../farmer/stock.php");
		exit();
	}
	else{
		die("Failed to insert the record: " .$dbConn->error);
	}
	
}



// Delete stock process
	
	if(isset($_GET["DeleteProduct"])){
	$DeleteProduct = mysqli_real_escape_string($dbConn, $_GET["DeleteProduct"]);
	
	$DeleteProduct_SQL = "DELETE FROM tbl_stock WHERE stock_id = '$DeleteProduct' LIMIT 1";
	 
	$uDelete_res = $dbConn->query($DeleteProduct_SQL);
	if($DeleteProduct_SQL === TRUE){
		header("Location: ../farmer/stock.php");
			exit();
		
		}else{
		print $dbConn->error;
		header("Location: ../farmer/stock.php");
			exit();
	}
}

	//Update stock process
	
	if (isset($_POST["updateFarmProduce"])){ 	
	$product_name = mysqli_real_escape_string($dbConn, $_POST["product_name"]);
	$quantity = mysqli_real_escape_string($dbConn, $_POST["quantity"]);
	$product_sellingprice = mysqli_real_escape_string($dbConn, $_POST["product_sellingprice"]);	
	$product_marketpice = mysqli_real_escape_string($dbConn, $_POST["product_marketprice"]);
	$stock_id = mysqli_real_escape_string($dbConn, $_POST["stock_id"]);

	$farmer_update= "UPDATE tbl_stock SET product_name ='$product_name',quantity ='$quantity',product_sellingprice ='$product_sellingprice',product_marketprice ='$product_marketprice' WHERE stock_id='$stock_id' LIMIT 1";
	
	
	if($dbConn->query($farmer_update) === TRUE){
		header("Location: ../farmer/stock.php");
		exit();
	}
	else{
		print $dbConn->error;
		
	
	}
	
}


?>