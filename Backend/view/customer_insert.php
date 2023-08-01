<?php 

session_start();

if(!isset($_SESSION["email"])){

	header("location:../view/index.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Plugins css-->
        <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="JS/customer_insert.js"></script>


    </head>
    <body data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                Dhrumin Patel <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" id = "logout">
                                <!-- item-->
                                <a  href="logout.php" class="dropdown-item notify-item" id ="logout">
                                    <i class="fe-log-out"></i>
                                    <span >Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-dark.png" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                      
                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
            
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">Geneva Kennedy</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">
                        <li>
                                <a href="#sidebarEcommerce" data-toggle="collapse">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Ecommerce </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div  id="sidebarEcommerce">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="admin_panel.php ">Dashboard</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#Ecommerce" data-toggle="collapse">
                                    <!-- <i data-feather="shopping-cart"></i> -->
                                    <span> Product </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="Ecommerce">
                                    <ul class="nav-second-level">
                                      
                                        <li>
                                            <a href="admin_grid.php">Manage Products</a>
                                        </li>
                                   
                                        <li>
                                            <a href="product_insert.php">Add  Product</a>
                                        </li>
                                     
                                
                                    </ul>
                                </div>
                                <a href="#categories_cat" data-toggle="collapse">
                                    <!-- <i data-feather="shopping-cart"></i> -->
                                    <span> Categories </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="categories_cat">
                                    <ul class="nav-second-level">
                                      
                                        <li>
                                            <a href="categories_grid.php"  class="active" >Manage  Categories</a>
                                        </li>
                                   
                                        <li>
                                            <a href="add_categories.php">Add  Categories</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#customer_cat" data-toggle="collapse">
                                    <!-- <i data-feather="shopping-cart"></i> -->
                                    <span> Customer </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="customer_cat">
                                    <ul class="nav-second-level">
                                       <li>
                                            <a href="customers_grid.php">Manage Customers</a>
                                        </li>
                                   
                                        <li>
                                            <a href="customer_insert.php">Add Customers</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                           </ul>
                         </div>
                     </li>
                    </ul>
                </div>
              </li>
                </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            <div class="content-page">
            <!-- Start Content-->
		    <div class="content ">

                    <!-- Start Content-->
                    <div class="container-fluid mt-3">
                    <div class="row  d-flex align-items-center justify-content-center ">
                            <div class="col-lg-6 ">
                                <div class="card-box">
                                    <h3 class="header-title m-t-0">Add/Edit New Customer</h3><br><br>


                                    <form id="customer_insert" class="parsley-examples">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="f_name" name ="first_name" class="form-control" required
                                                   placeholder="Type something"/>
                                            <input type="hidden"  id="add_customer" class="form-control" name ="action" value ="customer_insert" />
                                            <input type="hidden"  id = "hidden_input" class="form-control" name ="update_customer_id" />
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" id="l_name" name ="last_name" class="form-control" required
                                                   placeholder="Type something"/>
                                        </div>
                                
                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <div>
                                                <input type="email" id="email_id" name ="email" class="form-control" required
                                                       parsley-type="email" placeholder="Enter a valid e-mail"/>
                                            </div>
                                        </div>
                                  
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div>
                                                <input type="password" id="pass2" name="password" class="form-control" required
                                                       placeholder="Password"/>
                                            </div>
                                            <div class="mt-2">
                                            <label>Confirm Password</label>
                                                <input type="password" class="form-control" id ="re_pass" name ="confirm_password"  required
                                                       data-parsley-equalto="#pass2"
                                                       placeholder="Re-Type Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div>
                                                <input data-parsley-type="number" id="mobile_num" name="mobile_number" type="text"
                                                       class="form-control" required
                                                       placeholder="Enter only numbers"/>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit"  class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                     </div>
                </div>
            </div>

                            <!-- Ajax for getting value  -->

                                    <?php if (isset($_GET["id"])) : ?>
                                                <script>
                                                      var id = <?= $_GET["id"] ?>

                                                      var action = "edit_customer";

                                                      $("#add_customer").attr("value","customer_update");
                                                      $("#hidden_input").attr("value",`${id}`);

                                                      $.ajax({

                                                        type:"POST",
                                                        url:"../controller/admin_controller.php",
                                                        data:{ customer_id:id,
                                                               action:action },
                                                        success:function(data){
                                                            
                                                            var response = JSON.parse(data)
                                                            console.log(response);

                                                            $("#f_name").val(response[0].first_name);
                                                            $("#l_name").val(response[0].last_name);
                                                            $("#email_id").val(response[0].email);
                                                            $("#mobile_num").val(response[0].mobile_number);
                                                            $("#pass2").val(response[0].password);
                                                            $("#re_pass").val(response[0].password);

                                                        }
                                                      })

                                                </script>
                                            <?php endif; ?> 
         
        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- Plugins js -->
        <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>

        <!-- Dashboar 1 init js-->
        <!-- <script src="../assets/js/pages/dashboard-1.init.js"></script> -->

         <!-- Plugin js-->
        <script src="../assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- Validation init js-->
        <script src="../assets/js/pages/form-validation.init.js"></script>

         <!-- Dropzone file uploads-->
        <script src="../assets/libs/dropzone/min/dropzone.min.js"></script>

         <!-- Init js-->
         <script src="../assets/js/pages/form-fileuploads.init.js"></script>

        <!-- Sweet Alerts js -->
        <script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Init js -->
        <script src="../assets/js/pages/add-product.init.js"></script>

        <script src="../assets/js/plugin/webfont/webfont.min.js"></script>


        <!-- Select2 js-->
        <script src="../assets/libs/select2/js/select2.min.js"></script>

        <!-- App js-->
        <script src="../assets/js/app.min.js"></script>

        <script src="../assets/libs/summernote/summernote-bs4.min.js"></script>

        
    </body>
  

</html>