<!DOCTYPE html>
<html>

<head>
    <title>Product Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
            padding: 25px;

        }

        .address-details {

            background-color: white;
        }

        .eye-icon {

            cursor: pointer;
        }
    </style>

</head>

<body>
    <script src="JS/checkout.js"></script>
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

    <div class="container ">
        <h2 class="mt-5">My Orders</h2>
        <div class="row bg-white address-details-data">
<!-- 
            <div class="mt-5 col-3">
                <h4>Billing Address</h4>
                <p>sdsd</p>
                <p>sdsd</p>
                <p>sdsd</p>

            </div>
            <div class=" mt-5 col-3">
                <h4>Shipping Address</h4>

                sdsd
            </div>
            <div class="mt-5 col-3">
                <h4>Shipping Method</h4>

                sdsd
            </div>
            <div class="mt-5 col-3">
                <h4>Payment Method</h4>

                sdsd
            </div> -->
            <!-- <h5 class="mt-5">Items Orderd</h5>
            <table class="table table-striped mt-3   bg-white">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                 <tbody> 
                    <tr>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    </tr>
                    <tr>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    </tr>
                    <tr>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    <td>sdasds</td>
                    </tr>
                  
                </tbody> 

            </table> -->
        </div>
    </div>



</body>

</html>