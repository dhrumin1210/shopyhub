<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="shortcut icon"  type="image/png" href="../logo_png/logo_1-removebg.png"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="JS/product.js"></script>
    <script src="JS/cart.js"></script>

<style>
  i#order_icon {
    cursor: pointer;
    margin-left: 10px;
    /* height: 24px; */
}
  
  .card {
  height: 450px;
  transition: transform 0.2s ease-in-out;

}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1)
}

.card .card-img-top {
  height: 300px;
  object-fit: cover;
}
#cart_alert{
  padding: 8px;
    margin-top: 16px;
}
i.fa.fa-magnifying-glass {
    display: none;
}
</style>
</head>

<body>
  <?php include 'header.php'; ?>
  <?php
  //  session_start();
        // session_destroy();

  // echo '<pre>'; print_r(count($_SESSION['cart']));exit;
  if (isset($_SESSION["email"])) : ?>
    <script>
      $(".dropdown-menu").children().remove();
      $(".dropdown-menu").append(`<li><a class="dropdown-item" id ="sign_in" href="customer_logout.php">Log Out</a></li>`);
    </script>
  <?php endif; ?>

  <div class="container">
  <div class="alert alert-success"  id="cart_alert" role="alert">
  </div>
    <div class="row">

      <div class="ShowOrder">
        <select id="myOrder" name="order_by" id="product_sorting">

          <option value="product_name">Product Name</option>
          <option value="price">Price</option>
        </select>
        <span id="order"><i id="order_icon" class="fa fa-arrow-up-wide-short"></i></span>

      </div>
    </div>

    <div class="row card_listing">
  
      </div>

    <div class="mt-5 d-flex justify-content-between">
      <nav aria-label="Page navigation example">
        <ul class="pagination">

        </ul>
      </nav>
      <!-- <p id="p-data">:</p> -->
      <div class="showLimit">
        <select id="mySelect" name="cars" id="cars">
          <option value="3">3</option>
          <option value="6">6</option>
          <option value="10">10</option>
          <option value="15">15</option>
        </select>
      </div>
    </div>
  </div>

</body>

</html>