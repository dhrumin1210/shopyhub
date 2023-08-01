<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
<link rel="shortcut icon"  type="image/png" href="../logo_png/logo_1-removebg.png"/>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="JS/cart.js"></script>

</head>
<style>
    .product-slider {
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

.slick-slide img {
  width: 100%;
}

.product {
  margin: 0 20px;
  text-align: center;
}

.product h3 {
  margin-top: 10px;
}

.product p {
  margin-top: 5px;
}
.brand-logos{
    
  background-color: #dcdcdc;

}
i.fa.fa-magnifying-glass {
    display: none;
}

</style>
<body>
<?php include 'header.php' ?>
    <?php 

    // echo '<pre>'; print_r($_SESSION);exit;
            if (isset($_SESSION["email"])) : ?>
                    <script>
                        $(".dropdown-menu").children().remove();
                        $(".dropdown-menu").append(`<li><a class="dropdown-item" id ="sign_in" href="customer_logout.php">Log Out</a></li>
                        <li><a class="dropdown-item" id ="order_data" href="order_history.php">My Orders</a></li>`);                                 
                    </script>
        <?php endif; 
                    // echo '<pre>'; print_r($_SESSION);exit;
                    ?> 
<div class="brand-logos-wrapper">
            <div class="col-md-12 brand-logos">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-2 text-center" style="margin: 22px"><a href="#"><img src="crousel/brand/Adidas_logo.png" alt="TIGI" height="40"></a></div>
                        <div class="col-3 text-center"><a href="#"><img src="crousel/brand/Levi's_logo.svg.png" alt="PennyPlain" height="40"></a></div>
                        <div class="col-3 text-center"><a href="#"><img src="crousel/brand/Nike-Logo.png" alt="VIZ" height="40"></a></div>
                        <div class="col-3 text-center"><a href="#"><img src="crousel/brand/Puma-Logo.png" alt="Perfect-fit" height="40"></a></div>
                    </div>
                </div>
            </div>
        </div>

<div id="carouselExampleControls" style="height: 100%;" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="crousel/banner/T-shirts.jpg"  style="height:100%;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="crousel/banner/shirts.jpg" style="height:100%;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="crousel/banner/jacket.jpg" style="height:100%;" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <!-- <div id="product-slider" class="container-fluid mt-5">
    <h2 class="text-center">Featured Products</h2>
    <div class="row">
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/product1.jpg" class="card-img-top product-image" alt="...">
          <div class="card-body">
            <h5 class="card-title product-name">Product 1</h5>
            <p class="card-text product-price">$99.99</p>
            <a href="#" class="btn btn-primary product-button">Add to Cart</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/product2.jpg" class="card-img-top product-image" alt="...">
          <div class="card-body">
            <h5 class="card-title product-name">Product 2</h5>
            <p class="card-text product-price">$49.99</p>
            <a href="#" class="btn btn-primary product-button">Add to Cart</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/product3.jpg" class="card-img-top product-image" alt="...">
          <div class="card-body">
            <h5 class="card-title product-name">Product</h5>
            <p class="card-text product-price">$49.99</p>
            <a href="#" class="btn btn-primary product-button">Add to Cart</a>
          </div>
        </div>
      </div>



    </div> -->


    <div  class="category_new_pro">
        <!-- <div class="">

            <div class="category_list">
                <div class="col-md-12 text-center">
                    <h1 class="cat_title">MEN</h1>
                </div>

                <div class="" style=" padding-top:0px; padding-bottom:25px;">
                    <div class="">

                        <div class="row category_new_products">


                        </div>

                    </div>
                </div>

            </div> -->
        <!-- </div> -->
        
        </div>




</body>
</html>