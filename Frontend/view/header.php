<?php 
  session_start();
  // echo '<pre>'; print_r($_SESSION);exit;
          if (isset($_SESSION["email"])) : ?>
                  <script>
                      $(".dropdown-menu").children().remove();
                      $(".dropdown-menu").append(`<li><a class="dropdown-item" id ="sign_in" href="customer_logout.php">Log Out</a></li>
                      <li><a class="dropdown-item" id ="order_data" href="order_history.php">My Orders</a></li>`);                                 
                  </script>
      <?php endif; 
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="JS/header_nav.js"></script>
  <style>
      .navbar a:hover{

        color: white;
      }
    .cart-img {

      margin-left: 10px;

    }

    .cart-info {

      margin-top: 13px;

    }

    .cart {
      /* #e7e7e7 */
      background-color: white;
      height: 35%;

    }
    .cart:hover {
      /* #e7e7e7 */
      background-color: #e7e7e7 ;
      height: 35%;

    }
    

  
  </style>
</head>

<body>

  <div class="header">
    <div class="logo-image">
      <a href="index.php" class="logo_png">
        <!-- <img src="../logo_png/magento.png" class="logo_png"  alt=""> -->
      </a>
    </div>
    <div class="navbar">

    </div>

    <div class="header-icon">

      <!-- search icon -->

      <a href="#"> <i class="fa fa-magnifying-glass"></i></a>

      <!-- dropdown  -->

      <div class="dropdown">
        <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" id="sign_in" href="customer_login.php">Sign In</a></li>
          <li><a class="dropdown-item" id="account" href="create_customer.php">Create an Account</a></li>
        </ul>
      </div>
      <button type="button" class="btn btn-light position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

        <a href="#"> <i class="fa fa-cart-shopping"></i></i></a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="card-item-count">
          <span class="visually-hidden">unread messages</span>
        </span>
    </div>
    </button>

    <!-- sidebar for cart -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="cart_add">
          
          <!-- <div class="row">
            <div class="ml-2 col-4 ImgDiv">
              <img src="../assets/images/products/" alt="table-user" class="mt-2 ml-2 cart-img" width="90" height="90">
            </div>
            <div class="col-8 cart-info">
              2
            </div>

          </div> -->

        </div>
        <a href="view_cart.php " class="text-primary"> View Or Edit Cart</a>
      </div>
    </div>

  </div>

  <div class="search-box" style="display: none;">
    <input type="text" id="search_input" class="search-input" placeholder="Search...">
    <button id="search_product" class="btn btn-outline-primary">Find</i></button>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>