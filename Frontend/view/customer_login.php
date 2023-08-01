

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>ShopyHub</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->

        <!-- Sweet Alert-->
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="../assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

        <!-- icons -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>           
         <script src="JS/customer_login.js"></script>
         <script src="JS/cart.js"></script>
        

    </head>
    <body  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <?php include 'header.php' ;
        
        // session_start();
        // echo '<pre>'; print_r($_SESSION);exit;
        ?>
     

    <div class="container">
        <div class="row">
            <h2 class ="mt-3">Customer Login</h2>
               <div class="col-lg-6 mb-4 login-card"> 
                    <div class="card">
                       <!-- <img class="card-img-top" src="" alt=""> -->
                    <div class="card-body login-card-body">
                        <h5 class="card-title">Login</h5>
                        <p class="card-text">
                        If you have an account, sign in with your email address.
                        </p>
                        <form role="form" id="cust_login" class="parsley-examples">
                                        <label for="email_id" class="col-4 col-form-label  font-weight-normal">Email<span class="text-danger">*</span></label><br>
                                    <div class="form-group row">
                                            <div class="col-7">
                                                <input type="email" required parsley-type="email" class="form-control"
                                                    id="email_id" placeholder="Email">
                                                </div>
                                    </div>
                                        <label for="password" class="col-4 col-form-label font-weight-normal">Password<span class="text-danger">*</span></label>
                                    <div class="form-group row">
                                            <div class="col-7">
                                                <input id="password" type="password" placeholder="Password" required class="form-control">
                                            </div>
                                    </div>
                                    <div class="border-top mt-3 form-group row">
                                            <div class="col-6 ">
                                                <p  class="mt-3">Don't Have an Account ?</p>
                                                <a href="create_customer.php" class="text-primary text-decoration-none">Sign Up</a>
                                            </div>
                                            <div class="col-6 ">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light login ">
                                                    Sign In
                                                </button>
                                            </div>
                                    </div>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 login-card">
                <div class="card">
                    <div class="card-body login-card-body ">
                        <h5 class="card-title">New Customers</h5>
                        <p class="card-text">
                        Creating an account has many benefits: check out faster, keep more than one address, track orders and more.
                        <div class="border-top mt-3 form-group row">                
                        <div class="col-6 new_account">
                                <a href="create_customer.php" class=" text-primary" >Create New customer</a>         
                             </div>
                        </div>                                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>





<!-- <div class="content-page"> -->
            <!-- Start Content
 <div class="content ">

              Start Content 
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6" id="form_center">
                        <div class="card-box shadow p-3 mb-5 bg-white rounded">
                            <img src="logo" alt="">
                            <h2 class="header-title m-t-0 text-center">ShopyHub</h2><br> -->
                                    <!-- <p class="text-muted font-14 m-b-20 text-center">
                                    Login with email and password 
                                    </p> -->
                                <!-- <form role="form" id="cust_login" class="parsley-examples">
                                        <div class="form-group row">
                                                <label for="email_id" class="col-4 col-form-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input type="email" required parsley-type="email" class="form-control"
                                                        id="email_id" placeholder="Email">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-4 col-form-label">Password<span class="text-danger">*</span></label>
                                            <div class="col-7">
                                                <input id="password" type="password" placeholder="Password" required
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light login ">
                                                    Log In
                                                </button>
                                                <p  class="mt-3">Don't Have an Account ?</p>
                                                <a href="create_customer.php" class="text-primary text-decoration-none">Sign Up</a>

                                            </div>
                                        </div>
                                </form> -->
                             <!-- </div> end card-box -->
                        <!-- </div>/ end col -->
                    <!-- </div> -->
                <!-- </div> -->
                <!-- end row -->
            <!-- </div> -->
            <!-- end container -->
        <!-- </div>
    </div>
</div> -->

      
         
         <!-- Plugin js-->
        <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- Validation init js-->
        <script src="../assets/js/pages/form-validation.init.js"></script>

        <!-- Sweet Alerts js -->
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>


    </body>
</html>