<?php


session_start();

if(isset($_SESSION["email"])){

	header("location:../view/admin_panel.php"); 
}

if(isset($_SESSION['status'])){

}
?> 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        
        <!-- Sweet Alert-->
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<!-- App css -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="../assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- Sweet Alert-->
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

         <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        

        <!-- Plugin js-->
        <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- Validation init js-->
        <script src="../assets/js/pages/form-validation.init.js"></script>

    </head>
    <script src="JS/view.js"></script>

    
    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h2 class="header-title m-t-0">ShopyHub</h2>
                            <p class="text-muted font-14 m-b-20">
                             Login with username and password to enter admin panel
                            </p>
                            <form role="form" id="submit_btn" class="parsley-examples">
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
                                            </div>
                                        </div>
                                    </form>
                        </div> <!-- end card-box -->

                    </div> <!-- end col -->
                </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

          <!-- Sweet Alerts js -->
          <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="../assets/js/pages/sweet-alerts.init.js"></script>

    </body>
</html>