
<?php      
      session_start();
      require_once "config/dbConnect.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Farmer</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="farmer.php">Marketing and sales</br> agricultural products</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="process/user_process.php?logout">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="farmer/stock.php">
                  <span data-feather="shopping-cart"></span>
                  stock
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="farmer/farmProduce.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Marketprice
                </a>
              </li>
               
               <li class="nav-item">
                <a class="nav-link" href="farmer/order.php">
                  <span data-feather="users"></span>
                  View orders
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="farmer/farmProduce.php">
                  <span data-feather="users"></span>
                  Record farm produce
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="farmer/uploadProduct.php">
                  <span data-feather="users"></span>
                  upload product
                </a>
              </li>
             
              
              <li class="nav-item">
                <a class="nav-link" href="farmer/farmProduce.php">
                  <span data-feather="layers"></span>
                  Record farmer product
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="farmer/payment.php">
                  <span data-feather="users"></span>
                 payment
                </a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="News.html">
                  <span data-feather="layers"></span>
                  News
                </a>
              </li>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Farmer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
               <div class="profile-details">
    
    <span class="admin-name">
    <?php
        if(isset($_SESSION["control"])){
   
        ?> 
        
         <?php print $_SESSION["control"]["firstname"];?>

        <?php
          
        }
        ?>
        </span>
    <i class='bx bx-chevron-down'></i>
    </div>
            </div>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="0"></canvas>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
    <div class="left-side">
    <div class="box-topic">
    <button><a href="farmer/stock.php" style="text-decoration: none;"><span style = "color: black;">stock</span></a></button> 
    </div>
    
    </div>
    <i class='bx bxs-cart-alt cart'></i>
    </div>
    
    <div class="box">
    <div class="right-side">
    <div class="box-topic">
   <button><a href="farmer/order.php" style="text-decoration: none;"><span style = "color: black;">Order list</span></a> </button> 
    </div>
   
    <i class='bx bxs-cart-add cart two' ></i>
    </div>
    <div class="box">
    <div class="left-side">
    <div class="box-topic">
    <button><a href="farmer/product.php" style="text-decoration: none;"><span style = "color: black;">product</span></a></button>
    </div>
    
    
    </div>
  <i class='bx bxs-cart-download cart four' ></i>
    
    </div>
    </div>


    </body>

    </html>
    