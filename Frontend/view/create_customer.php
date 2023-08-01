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
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="JS/customer_insert.js"></script>
    <script src="JS/cart.js"></script>


</head>

<body data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <?php include 'header.php' ?>
    <!--- Sidemenu -->
    <div class="container">
        <form id="create_customer" class="parsley-examples">

            <div class="row customer-create">
                <h2 class="mt-3">Create New Customer Account</h2>
                <div class="col-lg-6 mb-4 login-card">
                    <div class="card">
                        <img class="card-img-top" src="" alt="">
                        <div class="card-body login-card-body">
                            <h5 class="card-title">Personal Information</h5>
                            <p class="card-text"> If you have an account, sign in with your email address.</p>
                            <div class="form-group">
                                <label class="font-weight-normal">First Name</label>
                                <input type="text" id="f_name" name="first_name" class="form-control" required placeholder="Type something" />
                                <input type="hidden" id="add_customer" class="form-control" name="action" value="create_customer" />
                            </div>
                            <div class="form-group">
                                <label class="font-weight-normal">Last Name</label>
                                <input type="text" id="l_name" name="last_name" class="form-control" required placeholder="Type something" />
                            </div>
                            <div class="form-group">
                                <label class="font-weight-normal">Phone Number</label>
                                <div>
                                    <input data-parsley-type="number" id="mobile_num" name="mobile_number" type="text" class="form-control" required placeholder="Enter only numbers" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 login-card">
                    <div class="card">
                        <div class="card-body login-card-body ">
                            <h5 class="card-title">Sign-in Information</h5>
                            <div class="form-group">
                                <label class="font-weight-normal">E-Mail</label>
                                <div>
                                    <input type="email" id="email_id" name="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                </div>
                                <span id="email_err"></span>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-normal">Password</label>
                                <div>
                                    <input type="password" id="pass2" name="password" class="form-control" required placeholder="Password" />
                                </div>
                                <div class="mt-2">
                                    <label class="font-weight-normal">Confirm Password</label>
                                    <input type="password" class="form-control" id="re_pass" name="confirm_password" required data-parsley-equalto="#pass2" placeholder="Re-Type Password" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border-hr">
                <div class="form-group row">
                    <div class="col-md-4">
                        <a href="customer_login.php" class="text-primary text-decoration-none">Alerady have an Account?</a>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light create-btn">Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php' ?>
    <!-- <div class="content-page">
		<div class="content ">  Start Content -->
    <!-- <div class="container-fluid mt-3">
                <div class="row  d-flex align-items-center justify-content-center ">
                    <div class="col-lg-6 ">
                        <div class="card-box shadow p-3 mb-5 bg-white rounded">
                            <h1 class="header-title m-t-0 text-center"><b>Create New Customer Account</b></h1><br>
                                <form id="create_customer" class="parsley-examples">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="f_name" name ="first_name" class="form-control" required placeholder="Type something"/>
                                            <input type="hidden"  id="add_customer" class="form-control" name ="action" value ="create_customer" />
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" id="l_name" name ="last_name" class="form-control" required placeholder="Type something"/>
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <div>
                                                <input type="email" id="email_id" name ="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"/>
                                            </div>
                                            <span id="email_err"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <div>
                                                <input type="password" id="pass2" name="password" class="form-control" required  placeholder="Password"/>
                                            </div>
                                            <div class="mt-2">
                                            <label>Confirm Password</label>
                                                <input type="password" class="form-control" id ="re_pass" name ="confirm_password"  required data-parsley-equalto="#pass2"
                                                placeholder="Re-Type Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div>
                                                <input data-parsley-type="number" id="mobile_num" name="mobile_number" type="text" class="form-control" required
                                                 placeholder="Enter only numbers"/>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"  class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>

                                            </div><br>
                                            <a href="customer_login.php" class="text-primary text-decoration-none">Alerady have an Account?</a>
                                        </div>
                                </form>
                         </div>    end card-box
                    </div>      end col
                </div>
            </div>
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