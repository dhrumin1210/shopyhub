

<!DOCTYPE html>
<html>

<head>
    <title>Product Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
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
        .checkout{
            margin-left: 61%;

        }
        .checkout:hover{
            color: white !important;
        }
        .eye-icon{

            cursor: pointer;
        }
        .eye-icon:hover{
            color: green;
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

    <div class="container">
        <div class="row">
            <h2 class="mt-5">My Orders</h2>
            <div class="col-8">
                <form id="cart_detail_form"  enctype="multipart/form-data">
                <input type="hidden" name="action" value="view_cart">

                    <table class="table table-striped mt-5 bg-white">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Ship To</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">view</th>
                            </tr>
                        </thead>
                        <tbody class="order-history">
                            
                        </tbody>

                    </table>
                </form>


            </div>
            
            </div>
        </div>

    </div>



</body>

</html>