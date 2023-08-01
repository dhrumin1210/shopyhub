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

        <!-- Sweet Alert-->
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css-->
        <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        
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


    </head>
    <script src="JS/product_insert.js"></script>

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
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row ">
                            <div class="col-12">
                                <!-- <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                            <li class="breadcrumb-item active">Product Edit</li>
                                        </ol>
                                    </div> -->
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- <form class="needs-validation" novalidate> -->
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-lg-6">

                                <h4 class="page-title mt-3">Add / Edit Product</h4> 
                                <div class="card">

                                    <div class="card-body">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Product</h5>

                                  
                                        <form class="needs-validation"  enctype="multipart/form-data" id = "product_form" novalidate>

                                        <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="switchbox" id="customSwitch" checked>
                                                    <label class="custom-control-label" for="customSwitch">status</label>

                                            </div></br>
                                            <div class="form-group mb-3">
                                                <label for="validationCustomUsername">Product Name</label>
                                            
                                                <div class="input-group">
                                                    <input type="text" class="form-control product_name" name ="product_name" id="validationCustomUsername"  placeholder="Product Name" aria-describedby="inputGroupPrepend"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please choose a Product Name.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label for="product-description">Product Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control description" id="product-description" name ="product_description" rows="5" placeholder="Please enter description" required></textarea>
                                            <div class="invalid-feedback">
                                                 Please choose a valid Product Description.
                                            </div>
                                        </div>
                                            <div class="form-group mb-3">
                                                <label for="product-category">Categories <span class="text-danger">*</span></label>
                                                <select class="form-control select2 categories_list" name ="categories[]" id="product-category" multiple  required>
                                                    <option >Select</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="validationCustom04">price</label>
                                                <input type="text" data-parsley-type="number" class="form-control price"  name= "price" id="validationCustom04" placeholder="price" required>
                                                <input type="hidden" name ="action" id= "hidden_input" value = "product_insert">
                                                <input type="hidden"  id="edit_id"  name = "edit_id">
                                                <div class="invalid-feedback">
                                                    Please choose a valid price.
                                                </div>
                                            </div>
                                       </br></br>
                                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                                         
                                            <span id="preview_image"></span>                                                
                                            <div class="form-group mb-3">
                                                <div id="preview">
                                                </div>
                                                <h3>Upload Image</h3>
                                                <input type="file" multiple class="form-control img_upload"  name ="product_images[]" id="validationCustom05" placeholder="file" required>
                                                <div class="invalid-feedback">
                                                    Please choose image.    
                                                </div>
                                            </div>
                                         </br></br>
                                            <button class="btn btn-primary" id="submit_btn" name = "submit" type="submit">Submit form</button>
                                        </form>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <!-- <div class="col-lg-6">
                                
                                <div class="card-box">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                        data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                                            <h3>Drop files here or click to upload.</h3>
                                            <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                                <strong>not</strong> actually uploaded.)</span>
                                        </div>
                                    </form>
                                  


                                    <-- Preview -->
                                    <!-- <div class="dropzone-previews mt-3" id="file-previews"></div> -->

                                <!-- </div> end col -->

                        <!-- </div> - -->

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                        </div>
                                        <div class="col pl-0">
                                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 



                            <!-- Ajax for getting value  -->

                            <?php if (isset($_GET["id"])) : ?>
                                                <script>
                                                var id = <?= $_GET["id"] ?>

                                                var action = "edit_product";
                                                $(".img_upload").removeAttr("required");

                                                    $.ajax({

                                                        type:"POST",
                                                        url: "../controller/admin_controller.php",
                                                        data:{ edit_product:id,
                                                               action:action 
                                                             },

                                                        success:function(data){

                                                            var response = JSON.parse(data);
                                                            
                                                            $(".product_name").val(response[0].product_name);

                                                            console.log(response[0]);

                                                            if(response[0].status == "Disable"){

                                                                $("#customSwitch").removeAttr("checked");                                                    
                                                            
                                                            }

                                                            $("#preview_image").append("<h3>Preview Image</h3>");
                                                            $("#hidden_input").attr("value","update_product");
                                                            $("#edit_id").attr("value",`${id}`);


                                                            for (var i = 0; i < response[0].product_image.length; i++) {


                                                                var fullimage = `../assets/images/products/${response[0].product_image[i]}`;
                                                                $("#preview").append(`<img src="${fullimage}" alt="table-user"  width="130" height="130" class="mr-2 rounded-circle">`)

                                                            }

                                                            $categories =  response[0].categories_id
                                                            // console.log( $categories);
                                                            setTimeout(function(){
                                                                $("#product-category").val($categories).trigger("change");
                                                            }, 200);
                                                        
                                                           
                                                            $(".description").val(response[0].product_discription);
                                                            $(".price").val(response[0].price);

                                                            // Image delete 
                                                            
                                                            $(document).on("click",".delete_img",function(){

                                                              var value = $(this).attr("value");
                                                              var delete_images = response[0].product_image;
                                                              delete_images.splice(value,1);
                                                              var action = "image_update";

                                                               $.ajax({

                                                                    type : "POST",
                                                                    url : "../controller/admin_controller.php",
                                                                    data:{ id:id,
                                                                           images:delete_images,
                                                                           action:action 
                                                                        },
                                                                    
                                                                    
                                                                        
                                                                    })
                                                                        
                                                            })

                                                            // $("product_form").submit(function(){

                                                            //     alert(23242);
                                                            // })
                                                            
                                                                                                                                                                                    
                                                        }
                                                    });


                                            </script>
                                            <?php endif; ?> 

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            </div>


         
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

        <!-- Select2 js-->
        <script src="../assets/libs/select2/js/select2.min.js"></script>

        <!-- App js-->
        <script src="../assets/js/app.min.js"></script>

        <script src="../assets/libs/summernote/summernote-bs4.min.js"></script>

        
    </body>
  

</html>