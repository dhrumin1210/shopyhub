<?php

// session_start();
// echo '<pre>'; print_r($_SESSION['email']);exit;

if (!isset($_SESSION['email'])) {

    header('http://localhost/shopyhub/Frontend/view/customer_login.php');
}
if (isset($_SESSION['count_item'])) {


    header('http://localhost/shopyhub/Frontend/view/index.php');
}


?>
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
        #cart_info {
            margin-top: 22px;
        }

        input.form-control.qtty_input {
            margin-top: 16px;
            width: 81px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table.td {

            border: 1px solid black;


        }

        .g_total {
            font-size: 30px;

        }

        .update_cart {
            margin-left: 80%;
        }

        .checkout {
            margin-left: 61%;

        }

        .checkout:hover {
            color: white !important;
        }

        .checkout {
            margin-left: 52%;
        }

        .update_cart {
            margin-left: 75%;
        }
    </style>

</head>

<body>
    <script src="JS/cart.js"></script>

    <?php
    include 'header.php';
    include '../controller/customer_controller.php';
    // session_destroy();
    // echo '<pre>'; print_r($_SESSION);exit;
    if (isset($_SESSION["email"])) : ?>

        <script>
            $(".dropdown-menu").children().remove();
            $(".dropdown-menu").append(`<li><a class="dropdown-item" id ="sign_in" href="customer_logout.php">Log Out</a></li>`);
        </script>

    <?php endif; ?>
    <!--
    <div class="container order">
        <div class="row  cart-edit-view">
            <p class="cart-lable">Shopping Cart</p>
            <div class="row title">
                <div class="col-6">
                    <p class="lable">Item</p>
                </div>
                <div class="col-2">
                    <p class="lable">Price</p>
                </div>
                <div class="col-2">
                    <p class="lable">Qty</p>
                </div>
                <div class="col-2">
                    <p class="lable">SubTotal</p>

                </div>
            </div> -->
    <!-- <div class="col-8 cart-detail"> -->
    <div class="container">
        <div class="row">
            <h2 class="mt-5">Shopping Cart</h2>
            <div class="col-8">
                <form id="cart_detail_form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="view_cart">

                    <table class="table table-striped mt-5 bg-white">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">SubTotal</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="cart-detail">

                        </tbody>

                    </table>
                    <button type="submit" class="btn btn-outline-dark update_cart">Update Shopping Cart</button>
                </form>


            </div>
            <div class="col-4 mt-5">
                <h3>Summary</h3>
                <hr>
                <div class="row">
                    <div class="col-6">
                        SubTotal
                    </div>
                    <div class="col-6 sub-total">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p class="g_total"><b>Grand Total</b></p>
                    </div>
                    <div class="col-6 ">
                        <p class="g_total"><b class="grand_total"></b></p>
                    </div>

                </div>
                <a href="http://localhost/shopyhub/Frontend/view/checkout.php" class="btn btn-outline-dark  mt-4 checkout">Proceed to Checkout</a>

            </div>
        </div>

    </div>



</body>

</html>