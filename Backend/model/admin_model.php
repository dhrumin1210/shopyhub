<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../config.php";

$var = new DatabaseConnection();

class admin extends DatabaseConnection
{
    //------------------Login----------------------------------------------

    public function login()
    {
        if (isset($_POST['action'])) {

            session_start();

            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $password;
            // echo '<pre>'; print_r($_POST);exit;

            if ($email == '') {
                echo $emailErr="Username  is required";
            }
            if ($password == '') {
                echo  $passErr="Password is required";
            }

            if ($email != '' || $password != '') {
                $sql_user = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";

                $result = mysqli_query($this->conn, $sql_user);


                if (mysqli_num_rows($result) == 1) {
                    
                    $data = mysqli_fetch_array($result);

                    //   echo '<pre>'; print_r($data);exit;

                    if ($data['email'] == $email || $data['password'] == $password) {

                        $_SESSION['loggedin'] = true;
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['status'] = "Login successfully";
 
                        echo "success";
                    }
                } else {
                    echo "error"
                        . mysqli_error($this->conn);
                }
            }
        }
    }


  //------------Product listing-----------------------------------------------

    public function product_records()
    {
        if (isset($_POST['action'])) {

            $display = mysqli_query($this->conn, "SELECT `id`, `product_name`, `price`, `status`, `product_image` FROM `product` ");

            $data = [];
            $i = 0;
            while ($row = mysqli_fetch_assoc($display)) {
                $impload_images = ($row['product_image']);
                $image =  explode(",", $impload_images);
                // echo '<pre>'; print_r($image[0]);exit;
                $data[] = $row;
                $data[$i]['product_image'] = $image[0];
                $i++;
            }
            echo(json_encode($data));
        }
    }

//------------Product update-------------------------------------

    public function update_product()
    {
        if (isset($_POST['action'])) {
            $id = $_POST['edit_id'];
            // echo '<pre>'; print_r($_FILES);exit;

            if (!isset($_POST['switchbox'])) {
                $status = "Disable";
            } else {
                $status = "Enable";
            }
            $image =implode(",", $_FILES['product_images']['name']);
            $total = count($_FILES["product_images"]["name"]);

            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $product_description = $_POST['product_description'];

            $categories = implode(",", $_POST['categories']);



            if($image == ''){

            $result = mysqli_query($this->conn, "UPDATE `product` SET `categories_id`='$categories',`product_name`='$product_name',`product_discription`=' $product_description ',`price`='$price',`status`='$status' WHERE `id`=$id ");

            if ($result === true) {
                $message = "success update";
                echo json_encode($message);
            } else {
                $error = "failed";
                echo json_encode($error);
            }

            }else{


                $result = mysqli_query($this->conn, "UPDATE `product` SET `categories_id`='$categories',`product_name`='$product_name',`product_discription`=' $product_description ',`price`='$price',`status`='$status',`product_image`='$image' WHERE `id`=$id ");
                
                
                $expImage = explode(",",$image);
                // echo "<pre>"; print_r($expImage);exit;

                for ($i=0 ; $i < $total ; $i++) {
                    $folder = "../assets/images/products/".$expImage[$i];
    
                    // echo "<pre>"; print_r(  $folder);exit;
                    if (move_uploaded_file($_FILES["product_images"]["tmp_name"][$i], $folder)) {
                        $msg =   "uploaded";
                    // echo json_encode($msg);
                    } else {
                        $err = "Failed to upload image";
                        echo json_encode($err);
                    }
                }


                if ($result === true && $msg == 'uploaded') {
                    $message = "success update";
                    echo json_encode($message);
                } else {
                    $error = "failed";
                    echo json_encode($error);
                }
    
            }


         
        }
    }


    //------------Product delete-------------------------------------


      public function delete_products()
      {
          if (isset($_POST['action'])) {
              $id = $_POST['student'];

              $display = mysqli_query($this->conn, "DELETE  FROM `product` WHERE id = $id ");

              if($display){
                $output['status'] = 'success';
                $output['message'] = 'Member deleted successfully';
            }
            else{
                $output['status'] = 'error';
                $output['message'] = 'Something went wrong in deleting the member';
            }
     
            echo json_encode($output);
          }
      }


    //--------------------categories for dropdown In Product Insert Form--------------------


      public function categories()
      {
          if (isset($_POST['action'])) {
              $result = mysqli_query($this->conn, "SELECT `id`,`categorie_name` FROM `categories` ");

              $data = [];
              while ($row = mysqli_fetch_assoc($result)) {
                  $data[] = $row;
              }
              echo json_encode($data);
          }
      }



    //-------------------- New Product Insert --------------------

      public function product_insert()
      {
          if (isset($_POST['action'])) {
              if ($_POST['switchbox'] == "on") {
                  $status = "Enable";
              } elseif (!isset($_POST['switchbox'])) {
                  $status = "Disable";
              }


              $image =implode(",", $_FILES['product_images']['name']);
            //   echo "<pre>"; print_r($image);
              $total = count($_FILES["product_images"]["name"]);
              $product_name = $_POST['product_name'];
              $price = $_POST['price'];
              $product_description = $_POST['product_description'];
              $categories = implode(",", $_POST['categories']);



              $result = mysqli_query($this->conn, "INSERT INTO `product` (`categories_id`, `product_name`, `product_discription`, `price`, `status`, `product_image`) VALUES ('$categories','$product_name','$product_description','$price','$status','$image')");

              $expImage = explode(",",$image);

              for ($i=0 ; $i < $total ; $i++) {

                  $folder = "../assets/images/products/".$expImage[$i];

                  $record =  [];
                  $notification = [];
                  if (move_uploaded_file($_FILES["product_images"]["tmp_name"][$i], $folder)) {
                      $msg =  "Image uploaded successfully!";
                      // header('location:display_students.php');
                      $notification['image'] = $msg;
                    //   echo(json_encode($msg));
                  } else {
                      $err = " Failed to upload image!";
                      echo json_encode($err);
                  }
              }

              if ($result) {
                  $message =  "success";
                  $notification['status'] = $message;
                  echo json_encode($notification);
              } else {
                  $error = "failed";
                  echo json_encode($error);
              }
          }
      }

//-------------------- Get defualt data for  edit product form --------------------

        public function edit_product()
        {
            if (isset($_POST['action'])) {
                $id= $_POST['edit_product'];
                // SELECT  `categories_id`, `product_name`, `product_discription`, `price`, `status`, `product_image`FROM `product` WHERE 1
                $result = mysqli_query($this->conn, "SELECT  `categories_id`, `product_name`, `product_discription`, `price`, `status`, `product_image`FROM `product` WHERE `id` = $id");

                $data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                    $product_images = explode(",", $data[0]['product_image']);
                    $categories = explode(",", $data[0]['categories_id']);
                    $data[0]['categories_id']=   $categories;
                    $data[0]['product_image'] = $product_images;
                }
                echo json_encode($data);
            }
        }


  //--------------------categories Delete----------------------------------

        public function delete_categories()
        {
            if (isset($_POST['action'])) {
                $id = $_POST['id'];

                $result = mysqli_query($this->conn, " DELETE FROM   `categories`  WHERE `id` = $id");



                if ($result === true) {
                    $message =  " successfully";
                    echo json_encode($message);
                } else {
                    $error = "failed";
                    echo json_encode($error);
                }
            }
        }

//--------------------categories listing--------------------------------

    public function categories_list()
    {
        if (isset($_POST['action'])) {
            $result = mysqli_query($this->conn, "SELECT `id`,`categorie_name`,`image` FROM `categories` ");

            $data = [];
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $impload_images = ($row['image']);
                $image =  explode(",", $impload_images);

                $data[] = $row;
                $data[$i]['image'] = $image[0];
                $i++;
                // $data[] = $row;
                // echo '<pre>'; print_r($data);
            }
            // echo '<pre>'; print_r($data);exit;
            echo json_encode($data);
        }
    }
//--------------------categories Insert-------------------------------------

    public function categorie_insert()
    {
        if (isset($_POST['action'])) {
            $image =implode(",", $_FILES['categories_images']['name']);
            $total = count($_FILES["categories_images"]["name"]);

            $categorie_name = $_POST['categorie_name'];
            $categorie_discription = $_POST['categories_description'];

            $result = mysqli_query($this->conn, " INSERT INTO `categories`(`categorie_name`, `image`, `categorie_discription`) VALUES ('$categorie_name','$image','$categorie_discription')");

            for ($i=0 ; $i < $total ; $i++) {

                $images = $_FILES['categories_images']['name'];
                // $expImage = explode(",",$images); 

                // echo '<pre>'; print_r($images);exit;
                $folder = "../assets/images/products/".$images[$i];

                if (move_uploaded_file($_FILES["categories_images"]["tmp_name"][$i], $folder)) {
                    $msg =   "Image uploaded successfully!";
                    echo $msg;
                } else {
                    $err = "Failed to upload image";
                    echo json_encode($err);
                }
            }


            if ($result === true) {
                $message =  "success";
                echo json_encode($message);
            } else {
                $error = "failed";
                echo json_encode($error);
            }
        }
    }

//--------------- Get default data in categories form for categories edit --------------


      public function edit_categorie()
      {
          if (isset($_POST['action'])) {
              $id = $_POST['edit_categorie'];

              $result = mysqli_query($this->conn, "SELECT `id`,`categorie_name`,`image`,`categorie_discription` FROM `categories` WHERE id = $id ");

              $data = [];
              $i = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                  $impload_images = ($row['image']);
                  $image =  explode(",", $impload_images);

                  $data[] = $row;
                  $data[$i]['image'] = $image;
                  $i++;
                  // $data[] = $row;
                  // echo '<pre>'; print_r($data);
              }
              // echo '<pre>'; print_r($data);exit;
              echo json_encode($data);
          }
      }



//--------------- Categories Update---------------------------------

      public function categorie_update()
      {
          if (isset($_POST['action'])) {
              $id = $_POST['update_id'];
              // echo '<pre>'; print_r($_FILES);exit;


              // $categories_images = $_FILES['categories_images']['name'];
              $image =implode(",", $_FILES['categories_images']['name']);
              $total = count($_FILES["categories_images"]["name"]);
              $categorie_name = $_POST['categorie_name'];
              $categorie_discription = $_POST['categories_description'];

            if($image == ''){

                $result = mysqli_query($this->conn, "UPDATE `categories` SET `categorie_name`='$categorie_name',`categorie_discription`='$categorie_discription' WHERE `id` = $id ");

            }else{

                $result = mysqli_query($this->conn, "UPDATE `categories` SET `categorie_name`='$categorie_name',`image`='$image',`categorie_discription`='$categorie_discription' WHERE `id` = $id ");

                for ($i=0 ; $i < $total ; $i++) {

                    $expImage = explode(",",$image); 
                    $folder = "../assets/images/products/".$expImage[$i];

    
                    if (move_uploaded_file($_FILES["categories_images"]["tmp_name"][$i], $folder)) {
                        $msg =   "Image uploaded successfully!";
                    } else {
                        $err = "Failed to upload image";
                        echo json_encode($err);
                    }
                }
            }
             

              if ($result === true) {
                  $message =  "success update";
                  echo json_encode($message);
              } else {
                  $error = "failed";
                  echo json_encode($error);
              }
          }
      }



//----------------------------------------------------------------------------------

          public function image_update()
          {
              if (isset($_POST['action'])) {
                  // echo '<pre>'; print_r($_POST);exit;
                  // for( $i = 0 ; $i<= )
                  $id = $_POST['id'];
                  $product_images = implode(",", $_POST['images']);

                  // UPDATE `product` SET `product_image` = 'product-5.png,product-3.png' WHERE `product`.`id` = 10;
                  $result = mysqli_query($this->conn, " UPDATE `product` SET `product_image` = '$product_images' WHERE `id` = $id");

                  if ($result === true) {
                      $message =  " successfully";
                      echo json_encode($message);
                  } else {
                      $error = "failed";
                      echo json_encode($error);
                  }
              }
          }

//-------------------------------------------------------------------------------------------------


            public function customer_list()
            {
                if (isset($_POST['action'])) {
                    $result = mysqli_query($this->conn, "SELECT `id`,`first_name`,`last_name`,`email`,`mobile_number`,`created_date`,`updated_date` FROM `customer`");

                    $record = [];

                    while ($row = mysqli_fetch_assoc($result)) {
                        $record[] =$row;
                    }

                    echo json_encode($record);
                }
            }

//-------------------------Customer Delete Query--------------


          public function customer_delete(){

            // echo '<pre>'; print_r($_POST);exit;
              if (isset($_POST['action'])) {
                  $id = $_POST['customer_id'];

                  $result = mysqli_query($this->conn, " DELETE FROM   `customer`  WHERE `id` = $id");



                  if ($result === true) {
                      $message =  "success";
                      echo json_encode($message);
                  } else {
                      $error = "failed";
                      echo json_encode($error);
                  }
              }
          }

//-------------------------Customer Insert Query--------------

          public function customer_insert(){


            if(isset($_POST['action'])){


                // echo '<pre>'; print_r($_POST);exit;

              $email = $_POST['email'];
              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $password = $_POST['password'];
              $confirm_password = $_POST['confirm_password'];
              $mobile_number = $_POST['mobile_number'];

              $result = mysqli_query($this->conn,"SELECT * FROM `customer` WHERE `email` = '$email'");
              $data = [];
              while($row = mysqli_fetch_assoc($result)){

                  $data[]  = $row;
              }

              // echo '<pre>'; print_r($data);

              if($password == $confirm_password){

                $pass = "true";
              }else{
                $pass = "false";
              }
              

              if(empty($data) && ($pass == 'true')){
                
                $record = mysqli_query($this->conn,"INSERT INTO `customer` (`first_name`,`last_name`,`email`,`password`,`mobile_number`) VALUES ('$first_name','$last_name','$email','$password','$mobile_number')");
                // echo $record;exit;


                if($record){

                  $msg = "success";
                  echo json_encode($msg);
                }

              }else{

                $err = "failed";
                echo json_encode($err);

              }
              
            }
          }

//---------------------------Get data for Edit Customer Form ----------------------


          public function edit_customer(){

            // echo '<pre>'; print_r($_POST);exit;
            if(isset($_POST['action'])){


            $id = $_POST['customer_id'];

            $result = mysqli_query($this->conn, "SELECT `id`,`first_name`,`last_name`,`email`,`password`,`mobile_number` FROM `customer` WHERE  `id` = $id ");

            $record = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $record[] =$row;
            }

            echo json_encode($record);


            }
          }

//-----------------------Update Customer -----------------------------------------------------

          public function update_customer(){

            // echo '<pre>'; print_r($_POST);exit;

            if(isset($_POST['action'])){

              $id = $_POST['update_customer_id'];


              $email = $_POST['email'];
              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $password = $_POST['password'];
              $confirm_password = $_POST['confirm_password'];
              $mobile_number = $_POST['mobile_number'];

             

              if($password == $confirm_password){

                $pass = "true";
              }else{
                $pass = "false";
              }
              

              if( $pass == 'true'){
                
                 $record = mysqli_query($this->conn,"UPDATE `customer` SET  `first_name` = '$first_name',`last_name`='$last_name',`email`='$email',`password`='$password',`mobile_number`='$mobile_number' WHERE `id` = $id");

                if($record){

                  $msg = "success update";
                  echo json_encode($msg);
                }

              }else{

                $err = "failed";
                echo json_encode($err);

              }
              
            }
            }
          
//---------------------Dashboard Count -----------------------------------------

            public function dashboard(){

                if (isset($_POST['action'])) {

                    $record = mysqli_query($this->conn,"SELECT
                    (SELECT COUNT(*) FROM categories ) as categories, 
                    (SELECT COUNT(*) FROM customer ) as customer,
                    (SELECT COUNT(*) FROM product ) as product");

                    $data = [];
                    while($res = mysqli_fetch_assoc($record)){

                        $data[] = $res;
                        // echo '<pre>'; print_r($data);exit;

                    }
                    echo json_encode($data);

                }

            }
//-------------------------------------------------------------------------------------------

            // public function product_records_list(){

            //     if(isset($_POST['action'])){

            //         ## Read value
            // $draw = $_POST['draw'];
            // $row = $_POST['start'];
            // $rowperpage = $_POST['length']; // Rows display per page
            // $columnIndex = $_POST['order'][0]['column']; // Column index
            // $columnName = $_POST['columns'][$columnIndex]['data']; // Column name

            // $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
            // $searchValue = mysqli_real_escape_string($this->conn,$_POST['search']['value']); // Search value


            // ## Search 
            // $searchQuery = " ";
            // if($searchValue != ''){
            // $searchQuery = " and (id like '%".$searchValue."%' or 
            //         product_name like '%".$searchValue."%' or 
            //         price like'%".$searchValue."%' or
            //         status like'%".$searchValue."%'  ) ";
            // }

            // ## Total number of records without filtering
            // $sel = mysqli_query($this->conn,"SELECT count(*) as allcount from product");
            // $records = mysqli_fetch_assoc($sel);
            // $totalRecords = $records['allcount'];

            // ## Total number of record with filtering
            // $sel = mysqli_query($this->conn,"SELECT count(*) as allcount from product WHERE 1 ".$searchQuery);
            // $records = mysqli_fetch_assoc($sel);
            // $totalRecordwithFilter = $records['allcount'];

            // ## Fetch records
            // $empQuery = "SELECT * from product WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
            // $empRecords = mysqli_query($this->conn, $empQuery);
            // $data = array();

            // // $i = 0;
            // while ($row = mysqli_fetch_assoc($empRecords)) {
            // // echo '<pre>'; print_r($row);exit;

            // // $impload_images = ($row['product_image']);
            // // $image =  explode(",", $impload_images);
            // // // echo '<pre>'; print_r($image[0]);exit;
            // // $data[$i]['product_image'] = $image[0];
            // // $i++;
            
            // $data[] = array( 
            //     "id"=>$row['id'],
            //     "product_image"=>$row['product_image'],
            //     "product_name"=>$row['product_name'],
            //     "price"=>$row['price'],
            //     "status"=>$row['status']
            // );
            // }

            // ## Response
            // $response = array(
            //     "draw" => intval($draw),
            //     "iTotalRecords" => $totalRecords,
            //     "iTotalDisplayRecords" => $totalRecordwithFilter,
            //     "aaData" => $data
            // );
            // echo json_encode($response);


            //     }
            // }

//-------------------------------------------------------------------------------------

public function delete_all_product(){

                
    // $id = $_POST['id']
    // echo "<pre>";print_r($id);exit;
    $type = $_POST['type'];
    // $id = $_POST['id'];
    if($type == 'categories'){

        $id = implode(",", $_POST['id']);

        $result = mysqli_query($this->conn, "DELETE FROM `categories` WHERE id IN ($id) ");
    
        echo json_encode("success");

    }else if($type == 'products'){

        $id = implode(",", $_POST['id']);

        $result = mysqli_query($this->conn, "DELETE FROM `product` WHERE id IN ($id) ");
    
        echo json_encode("success");
    }else{

        $id = implode(",", $_POST['id']);

        $result = mysqli_query($this->conn, "DELETE FROM `customer` WHERE id IN ($id) ");
    
        echo json_encode("success");
    }



}

}
?>