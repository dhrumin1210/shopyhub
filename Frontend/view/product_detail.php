<!DOCTYPE html>
<html>

<head>
	<title>Product Detail</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		i.fa.fa-magnifying-glass {
			display: none;
		}
		.navbar a:hover{

			text-decoration: none;
		}
		.col-8.cart-info{
			max-width: 63.666667%;
		}
	</style>

</head>

<body>
	<?php

	include 'header.php';
	include '../controller/customer_controller.php';

	// echo '<pre>'; print_r($_SESSION);exit;
	//   session_start();
	// session_destroy();
	if (isset($_SESSION["email"])) : ?>

		<script>
			$(".dropdown-menu").children().remove();
			$(".dropdown-menu").append(`<li><a class="dropdown-item" id ="sign_in" href="customer_logout.php">Log Out</a></li>`);
		</script>

	<?php endif; ?>

	<?php

	$table = "product";
	// echo $id;
	// if(isset($_GET['product_id'])){

	// 	$id = $_GET['product_id'];

	// }else{

	$id = $_GET['id'];

	// }
	$action = 'nav_categories';
	// $record = new controller($action);
	$data = $record->getProductData($table, $id);

	// echo "<pre>";print_r($data[0]);

	?>
	<div class="container my-5">
		<div class="row">
			<div class="col-lg-6">
				<img src="..\assets\images\products\<?= $data[0]['product_image'] ?>" class="img-fluid" alt="Product Image">
			</div>
			<div class="col-lg-6">
				<h1><?= $data[0]['product_name'] ?></h1>
				<p class="text-muted mb-2">SKU: 123456789</p>
				<h2 class="text-danger mb-4">$<?= $data[0]['price'] ?></h2>
				<p class="mb-4"><?= $data[0]['product_discription'] ?></p>
				<label for="quantity">Quantity:</label>
				<input type="number" min="1" class="form-control qty-no " id=<?= $id ?> value="1">
				<button type="button" id=<?= $id ?> class="btn btn-primary btn-lg my-4 add_cart"><i class="fas fa-cart-plus"></i> Add to Cart</button>
				<div class="row">
					<div class="col-sm-4">
						<h5>Brand:</h5>
						<p class="text-muted">Product Brand</p>
					</div>
					<div class="col-sm-4">
						<h5>Category:</h5>
						<p class="text-muted">Product Category</p>
					</div>
					<div class="col-sm-4">
						<h5>Availability:</h5>
						<p class="text-muted">In Stock</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="JS/cart.js"></script>

	<?php include 'footer.php' ?>
</body>

</html>