<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../config.php";

$var = new DatabaseConnection();

class customer extends DatabaseConnection
{
    //----------------------Categories for  Navbar------------------------------------------------------

    public function categories_data()
    {

        // echo '<pre>'; print_r($_POST);exit;

        $display = mysqli_query($this->conn, "SELECT `id`,`categorie_name` FROM `categories`");
        // $image = mysqli_query($this->conn,"SELECT logo_png FROM logo ORDER BY id DESC LIMIT 1");

        // echo '<pre>'; print_r($_POST);exit;
        // $total = $image->fetch_assoc();

        $data = [];
        // $record = [];
        while ($row = mysqli_fetch_assoc($display)) {

            // echo '<pre>'; print_r($image[0]);exit;
            $data[] = $row;
        }
        // $record['data'] = $data;
        // $record['image'] = $total;
        echo json_encode($data);
    }

    //-----------------------CustomerLogin--------------------------------------------------------------

    public function customer_login($login_data)
    {
        // echo '<pre>'; print_r($_POST);exit;
        session_start();

        // echo '<pre>'; print_r($_POST);exit;
        $email = $login_data['usernames'];
        $password = $login_data['pass'];

        // echo '<pre>'; print_r($login_data);exit;
        if ($email == '') {
            echo $emailErr = "Username  is required";
        }
        if ($password == '') {
            echo  $passErr = "Password is required";
        }

        if ($email != '' || $password != '') {

            $sql_user = "SELECT * FROM `customer` WHERE `email` = '$email' AND `password` = '$password'";

            $result = mysqli_query($this->conn, $sql_user);


            if (mysqli_num_rows($result) == 1) {

                $data = mysqli_fetch_array($result);

                $get_id = mysqli_query($this->conn, "SELECT `id` FROM `customer` WHERE `email` = '$email' AND `password` = '$password'");
                $customer_id = $get_id->fetch_assoc();
                // echo '<pre>'; print_r($customer_id);exit;


                //   echo '<pre>'; print_r($data);exit;

                if ($data['email'] == $email || $data['password'] == $password) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['customer_id'] = $customer_id;
                    $_SESSION['status'] = "Login successfully";

                    $msg =  "success";
                    echo json_encode($msg);
                }
            } else {
                $err = "error";
                echo json_encode($err);
            }
        }
    }







    //--------------------------- Create New Customer--------------------------------------------------------

    public function customer_insert($customer_data)
    {

        // echo '<pre>'; print_r($customer_data['confirm_password']);exit;
        $email = $customer_data['email'];
        $first_name = $customer_data['first_name'];
        $last_name = $customer_data['last_name'];
        $password = $customer_data['password'];
        $confirm_password = $customer_data['confirm_password'];
        $mobile_number = $customer_data['mobile_number'];

        $result = mysqli_query($this->conn, "SELECT * FROM `customer` WHERE `email` = '$email'");
        // $data = [];

        $num = mysqli_num_rows($result);
        // echo $num;exit;
        if ($num !== 0) {
            echo json_encode("true");
        } else {

            if (($password == $confirm_password)) {

                $record = mysqli_query($this->conn, "INSERT INTO `customer` (`first_name`,`last_name`,`email`,`password`,`mobile_number`) VALUES ('$first_name','$last_name','$email','$password','$mobile_number')");


                if ($record) {
                    $msg = "success";
                    echo json_encode($msg);
                }
            } else {
                $err = "failed";
                echo json_encode($err);
            }
        }
    }

    //---------------------------- Categorie Listing in card-----------------------------------
    // SELECT * FROM `product` WHERE FIND_IN_SET(2,categories_id);

    public function product_listing($id)
    {

        // echo '<pre>'; print_r($_POST);exit;

        $product_id = $id['id'];
        $limit = $id['limit'];

        $sort = $id['sort'];
        $order = $id['order'];
        $page = $id['page'];



        $result_fetch = mysqli_query($this->conn, "SELECT count(*) FROM `product` WHERE FIND_IN_SET($product_id,categories_id) AND `status` = 'Enable'  ");


        $fetch = mysqli_fetch_array($result_fetch)[0];


        $total_page = ceil($fetch / $limit);
        $start_page = ($page - 1) * $limit;

        $record = mysqli_query($this->conn, "SELECT * FROM `product` WHERE  FIND_IN_SET($product_id,categories_id)  AND `status` = 'Enable'  ORDER BY $sort  $order  LIMIT $start_page,$limit  ");
        // }
        //    echo "<pre>"; print_r($record);exit;

        $data = [];
        $totalData = [];
        $i = 0;

        // if( $fetch > 0 ){

        while ($row = mysqli_fetch_assoc($record)) {



            $explode_images = ($row['product_image']);
            $image =  explode(",", $explode_images);
            // echo '<pre>'; print_r($image[0]);exit;
            $data[] = $row;
            $data[$i]['product_image'] = $image[0];
            $i++;


            // }

        }

        $totalData['data'] = $data;
        $totalData['total_page'] = $total_page;
        $totalData['current_page'] = $page;
        echo json_encode($totalData);
    }
    //-----------------------------------------------------------------------

    public function getProductData($data)
    {

        $id = $data['id'];
        $table = $data['table'];

        // echo $id;
        // echo $table;
        // exit;
        $record = mysqli_query($this->conn, "SELECT * FROM $table WHERE id = $id");
        // echo "<pre>";print_r($id);exit;
        $i = 0;
        $data = [];

        while ($row = mysqli_fetch_assoc($record)) {

            $explode_images = ($row['product_image']);
            $image =  explode(",", $explode_images);

            $data[] = $row;
            $data[$i]['product_image'] = $image[0];
            $i++;
        }

        return ($data);
    }

    //------------------------------------------------------------------------------------



    public function cart_data($data)
    {

        session_start();

        // echo '<pre>'; print_r($data);exit;p
        // echo '<pre>'; print_r($data);exit;

        $table = 'product';
        $id = $data['id'];

        
        
        $qty = isset($data['quantity']) ? $data['quantity'] : 1;
        // echo "<pre>";print_r($qty);exit;
        
        $record = mysqli_query($this->conn, "SELECT * FROM $table WHERE id = $id");

        $data = [];
        $row = $record->fetch_assoc();

        $explode_images = ($row['product_image']);
        $image =  explode(",", $explode_images);

        $data[] = $row;
        $data[0]['product_image'] = $image;

        // echo '<pre>'; print_r($_SESSION);exit;
        if (isset($_SESSION['email']) &&  $_SESSION['customer_id']['id']) {


            
            $product_name = $data[0]['product_name'];
            
            $price = $data[0]['price'];
            $prod_img =   $data[0]['product_image'][0];
            
            $customer_id = $_SESSION['customer_id']['id'];
            // echo '<pre>'; print_r($customer_id);exit;
            
            $check_item = mysqli_query($this->conn, "SELECT * FROM `cart` WHERE  `product_id` = $id");
            
            // echo '<pre>'; print_r($check_item);exit;
            
            $item = mysqli_num_rows($check_item);

            // echo '<pre>'; print_r($item);exit;
            if ($item > 0 && $qty == '') {


                $total_qty = mysqli_query($this->conn, "SELECT `quantity` FROM `cart` WHERE  `product_id` = '$id' ");
                $cart_query = $total_qty->fetch_assoc();
                $qtty = $cart_query['quantity'] + 1;

                $query_cart = mysqli_query($this->conn, "UPDATE `cart` SET `quantity`='$qtty' WHERE `product_id` = '$id' ");

            } elseif ($item == 0 && $qty == '') {

                $qtt = 1;
                $query = mysqli_query($this->conn, "INSERT INTO `cart` (`customer_id`,`product_id`, `quantity`, `product_name`, `product_image`, `product_price`) VALUES ('$customer_id','$id','$qtt','$product_name','$prod_img','$price') ");

                // if($query){
                //     echo 1;
                // }else{
                //     echo 2;
                // }
            } elseif ($item > 0 && $qty !== '') {

                // echo '<pre>'; print_r($data);exit;
                // echo "1212";
                $total_qty = mysqli_query($this->conn, "SELECT `quantity` FROM `cart` WHERE  `product_id` = '$id' ");
                $cart_query = $total_qty->fetch_assoc();
                $cart_query_total = $cart_query['quantity'] + $qty;

                $up_cart = mysqli_query($this->conn, "UPDATE `cart` SET `quantity`='$cart_query_total' WHERE `product_id` = '$id' ");

            } else {

                $cart_queri = mysqli_query($this->conn, "INSERT INTO `cart`( `customer_id`, `product_id`, `quantity`, `product_name`, `product_image`, `product_price`) VALUES ('$customer_id','$id','$qty','$product_name','$prod_img','$price')");
            }
        } else {

            // if user is guest


            if (isset($_SESSION['cart'][$id]) && $qty == '') {

                $_SESSION['cart'][$id]['quantity']++;
            } elseif (!isset($_SESSION['cart'][$id]) && $qty == '') {

                $_SESSION['cart'][$id] = array(
                    'product_id' => $data[0]['id'],
                    'product_image' => $data[0]['product_image'][0],
                    'price' => $data[0]['price'],
                    'product_name' => $data[0]['product_name'],
                    'quantity' => 1
                );
            } elseif (isset($_SESSION['cart'][$id]) && $qty !== '') {

                $_SESSION['cart'][$id]['quantity'] += $qty;
            } else {
                $_SESSION['cart'][$id] = array(
                    'product_id' => $data[0]['id'],
                    'product_image' => $data[0]['product_image'][0],
                    'price' => $data[0]['price'],
                    'product_name' => $data[0]['product_name'],
                    'quantity' => $qty
                );
            }



            return json_encode($data);
        }
    }
    //----------------------------------------------------------------------------------------------------

    public function add_cart_data()
    {
        // $_SESSION['cart'] = array();

        session_start();


        $cart_html = '';
        $view_cart = '';
        $Grand_total = 0;
        $order_summary = '';


        if (isset($_SESSION['email']) && isset($_SESSION['customer_id']['id'])) {

            $customer_id = $_SESSION['customer_id']['id'];

            // echo '<pre>'; print_r($customer_id);exit;
            $check_item = mysqli_query($this->conn, "SELECT * FROM `cart` WHERE `customer_id` =  $customer_id  ");

            
            // $item = mysqli_num_rows($check_item);
            // $data = $check_item ->fetch_assoc();
            $record = [];
            $i= 0;
            while ($data = mysqli_fetch_assoc($check_item)) {

                $record[] = $data;
                // $coupan_id = $record[$i]['coupan_id'];
                // $coupan_status = $record[$i]['coupan_status'];
            }
            
  

            if (count($record) !== 0) {

                foreach ($record as $key => $product) {
                    $cartPrice = $product['product_price'];
                    $quantities = $product['quantity'];
                    $SubTotal = $cartPrice * $quantities;
                    $Grand_total += $SubTotal;
                    
                                         

                    $cart_html .= '<div class="row">';
                    $cart_html .= '<div class="ml-2 col-4 ImgDiv">';
                    $cart_html .= '<img class ="cart-img" src="../assets/images/products/' . $product['product_image'] . '" alt="">';
                    $cart_html .= '</div>';
                    $cart_html .= '<div class="col-8 cart-info">';
                    $cart_html .= '<p class="mb-0">' . $product['product_name'] . '</p>';
                    $cart_html .= '<p class="mb-0">$' . $product['product_price'] . '</p>';
                    $cart_html .= '<p class="mb-0">Quantity: ' . $product['quantity'] . '</p>';
                    $cart_html .= '	<input type="number" class="form-control qty-input quantity"  id=' . $product['product_id'] . ' value=' . $product['quantity'] . '>';
                    $cart_html .= '<p class="edit-pen" id=' . $product['product_id'] . '><i   class="fa fa-pen"></i></p>';
                    $cart_html .= '<p class="delete-icon" id = ' . $product['product_id'] . '><i class="fa fa-trash-can"></i></p>';
                    $cart_html .= '</div>';
                    $cart_html .= '<hr class="mt-2">';
                    $cart_html .= '</div>';



                    $view_cart .= '
                
                    <tr>
                    <th scope="row"><img class="cart-img"  id="cart_info" src="../assets/images/products/' . $product["product_image"] . '"  alt=""></th>
                    <td>' . $product["product_name"] . '</td>
                    <td>$' . $product['product_price'] . '</td>
                    <td> <input type="number" class="form-control qtty_input quantity"  name="' . $product["product_id"] . '" value=' . $product['quantity'] . '>
                    </td>
                    <td class="subtotal" id=' . $product["product_id"] . '>$' . $SubTotal . '</td>
                    <td><a href="product_detail.php?id=' . $product["product_id"] . '" ><i class="fa fa-pen" id=' . $product["product_id"] . ' ></i></a></td>
                    <td><span class="delete-icon" id=' . $product["product_id"] . '  ><i class="fa fa-trash-can"></i></span></td>
                </tr>  ';


                    $order_summary .= '    <tr>
                <th scope="row"><img class="cart-img"  id="cart_info" src="../assets/images/products/' . $product["product_image"] . '"  height="70" width="70" alt=""></th>
                <td>' . $product["product_name"] . '</td>
                <td>$' . $product['product_price'] . '</td>
                <td>' . $product['quantity'] . '
                </td>
                <td class="subtotal" id=' . $product["product_id"] . '>$' . $SubTotal . '</td>
             
                 </tr>
                  <hr>
                 ';

                    $count =  count($record);
                }
            } else {

                $cart_html .= '<p class="text-center">Your cart is empty.</p>';
                $count = 0;
            }


            if($count == 0){

                $count_item = 0;
                $_SESSION['count_item'] = $count_item;

            }else{

                unset($_SESSION['count_item']);
            }

            // echo '<pre>';
            // print_r(($Grand_total));exit;
            // echo '<pre>'; print_r($coupan_status);exit;

            // if($coupan_status != 0){

            //     $DQuery = mysqli_query($this->conn,"SELECT `amount` FROM `coupan` WHERE `coupan_id` =  $coupan_id ");

            //     $dTotal = [];
            //     while($row = mysqli_fetch_assoc($DQuery)){


            //         // echo '<pre>'; print_r($row);exit;
            //         $dTotal[0] = $row['amount'];

            //     }
            //     // $dTotal = $DQuery->fetch_assoc();

            //     $totalDiscount = $Grand_total - $dTotal[0];

            //     $total['Grand_total'] = $totalDiscount;

            // }else{
                // $total['Grand_total'] = $Grand_total;
                // echo '<pre>'; print_r($Grand_total);exit;

            // }


            $total = [];

            $total['count'] = $count;
            $total['cart_item']  = $cart_html;
            $total['view_cart'] = $view_cart;
            $total['Grand_total'] = $Grand_total;
            $total['order_summary'] = $order_summary;
            return json_encode($total);
        } else {

            $Grand_total = 0;

            // echo '<pre>'; print_r($_SESSION);exit;
            // $view_cart = '';

            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

                foreach ($_SESSION['cart'] as $key => $product) {

                    $cartPrice = $product['price'];
                    $quantities = $product['quantity'];
                    $SubTotal = $cartPrice * $quantities;
                    $Grand_total += $SubTotal;

                    $cart_html .= '<div class="row">';
                    $cart_html .= '<div class="ml-2 col-4 ImgDiv">';
                    $cart_html .= '<img class ="cart-img" src="../assets/images/products/' . $product['product_image'] . '" alt="">';
                    $cart_html .= '</div>';
                    $cart_html .= '<div class="col-8 cart-info">';
                    $cart_html .= '<p class="mb-0">' . $product['product_name'] . '</p>';
                    $cart_html .= '<p class="mb-0">$' . $product['price'] . '</p>';
                    $cart_html .= '<p class="mb-0">Quantity: ' . $product['quantity'] . '</p>';
                    $cart_html .= '	<input type="number" class="form-control qty-input quantity"  id=' . $key . ' value=' . $product['quantity'] . '>';
                    $cart_html .= '<p class="edit-pen" id=' . $key . '><i   class="fa fa-pen"></i></p>';
                    $cart_html .= '<p class="delete-icon" id = ' . $key . '><i class="fa fa-trash-can"></i></p>';
                    $cart_html .= '</div>';
                    $cart_html .= '<hr class="mt-2">';
                    $cart_html .= '</div>';

                    $cartPrice = $product['price'];
                    $quantities = $product['quantity'];
                    $SubTotal = $cartPrice * $quantities;
                    $Grand_total += $SubTotal;

                    $view_cart .= '
                
                    <tr>
                    <th scope="row"><img class="cart-img"  id="cart_info" src="../assets/images/products/' . $product["product_image"] . '"  alt=""></th>
                    <td>' . $product["product_name"] . '</td>
                    <td>$' . $product['price'] . '</td>
                    <td> <input type="number" class="form-control qtty_input quantity"  name="' . $product["product_id"] . '" value=' . $product['quantity'] . '>
                    </td>
                    <td class="subtotal" id=' . $product["product_id"] . '>$' . $SubTotal . '</td>
                    <td><a href="product_detail.php?id=' . $product["product_id"] . '" ><i class="fa fa-pen" id=' . $product["product_id"] . ' ></i></a></td>
                    <td><span class="delete-icon" id=' . $product["product_id"] . '  ><i class="fa fa-trash-can"></i></span></td>
                </tr>  ';
                }

                $count =  count($_SESSION['cart']);
            } else {

                $cart_html .= '<p class="text-center">Your cart is empty.</p>';
                $count = 0;
            }


            // $DQuery= mysqli_query($this->conn,"SELECT * FROM `cart`"))

            $total = [];
            // if(isset($_SESSION['cart']))
            // $count =  count($_SESSION['cart']);

            $total['count'] = $count;
            $total['cart_item']  = $cart_html;
            $total['view_cart'] = $view_cart;
            $total['Grand_total'] = $Grand_total;
            // echo '<pre>'; print_r($total);exit;
            return json_encode($total);
        }
    }
    //----------------------------------------------------------------------------------

    public function cart_delete_item()
    {
        session_start();

        // echo '<pre>'; print_r($_POST);exit;

        if (isset($_SESSION['email']) && isset($_SESSION['customer_id']['id']) ) {

            $id = $_POST['id'];
            // echo '<pre>'; print_r($id);exit;
            $query = mysqli_query($this->conn, "DELETE FROM `cart` WHERE `product_id` = $id ");
            // echo '<pre>'; print_r($_SESSION);exit;
        } else {

            // echo '<pre>'; print_r($_POST);exit;
            $id = $_POST['id'];
            // session_start();
            unset($_SESSION['cart'][$id]);
        }
    }

    public function update_cart_qty()
    {


        session_start();

        if (isset($_SESSION['email']) && isset($_SESSION['customer_id']['id'])) {

            $id = $_POST['id'];
            $qty  = $_POST['quantity'];

            $query = mysqli_query($this->conn, "UPDATE `cart` SET `quantity`= '$qty' WHERE `product_id` = $id");
        } else {




            $id = $_POST['id'];
            $qty  = $_POST['quantity'];

            $_SESSION['cart'][$id]['quantity'] = $qty;
            $msg = "success";
            return json_encode($msg);
        }
    }

    public function update_cart_item()
    {
        session_start();

        if (isset($_SESSION['email']) && isset($_SESSION['customer_id']['id'])) {

            foreach ($_POST as $key => $value) {

                $query = mysqli_query($this->conn, "UPDATE `cart` SET `quantity`= '$value' WHERE `product_id` = $key");
            }
        } else {

            session_start();

            foreach ($_POST as $key => $value) {


                $_SESSION['cart'][$key]['quantity'] = $value;
                unset($_SESSION['cart']['action']);
            }
        }
    }
    //-------------------------------------------------------------------------------
    public function address($data)
    {

        //   echo "<pre>" ; print_r($_SESSION);

        session_start();
        if (isset($_SESSION['email']) && isset($_SESSION['customer_id'])) {

            $address = $data['address'];
            // $first_name = $data['first_name'];
            // $last_name = $data['last_name'];
            $phone_num = $data['phone_num'];
            $city = $data['city'];
            $state = $data['state'];
            $zipcode = $data['zipcode'];
            $customer_id = $_SESSION['customer_id']['id'];

            $query = mysqli_query($this->conn, "INSERT INTO `address`(`address`, `city`, `state`, `zipcode`, `phone_num`, `customer_id`) VALUES ('$address','$city','$state','$zipcode','$phone_num','$customer_id')");



        }
    }

    //--------------------------------------------------------------------------------------------------------------
    public function getaddressData()
    {

        session_start();
        if (isset($_SESSION['email']) && isset($_SESSION['customer_id'])) {

            $customer_id = $_SESSION['customer_id']['id'];

            // echo '<pre>'; print_r($customer_id);exit;
            $query = mysqli_query($this->conn, "SELECT address.id,address,city,state,zipcode,first_name,last_name,phone_num,customer_id FROM `address` LEFT JOIN `customer` ON address.customer_id = customer.id ");

            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {

                $data[] = $row;

                // echo '<pre>'; print_r($data);
            }
            return json_encode($data);
        }
    }

    public function placeOrder($data)
    {

        session_start();

        if (isset($_SESSION['email']) && isset($_SESSION['customer_id'])) {

            // echo "<pre>";print_r($data);exit;
            $address_id  = $data['address_id'];
            $pay_method =  $data['pay_method'];
            $shipping = $data['shipping'];
            $customer_id = $_SESSION['customer_id']['id'];


             $data = mysqli_query($this->conn,"SELECT * FROM `cart` WHERE `customer_id` = '$customer_id'");

            // echo '<pre>'; print_r($data);exit;
            $record = [];
            while($row = mysqli_fetch_assoc($data)){

                $record[] = $row;

            }

            // echo '<pre>'; print_r($record);exit;
            foreach($record as $key=> $value){


                // echo '<pre>'; print_r($address_id);exit;
                    $product_id = ($value['product_id']);
                    $product_name = ($value['product_name']);
                    $product_image = ($value['product_image']);
                    $product_price = ($value['product_price']);
                    $coupan_id = $value['coupan_id'];
                    $coupan_status = $value['coupan_status'];
                    $quantity = ($value['quantity']);
                    // echo '<pre>'; print_r($coupan_status);exit;

                    // echo "INSERT INTO `order_details`( `customer_id`, `product_id`, `address_id`, `image`, `quantity`, `product_name`, `price`, `status`, `coupan_id`, `coupan_status`, `shipping_price`, `payment_method`)
                    // VALUES ('$customer_id','$product_id ',' $address_id','$product_image','$quantity','$product_name','$product_price','Panding','$coupan_id','$coupan_status','$shipping','$pay_method')";exit;

              $sql = mysqli_query($this->conn,"INSERT INTO `order_details`( `customer_id`, `product_id`, `address_id`, `image`, `quantity`, `product_name`, `price`, `status`, `coupan_id`, `coupan_status`, `shipping_price`, `payment_method`)
               VALUES ('$customer_id','$product_id ',' $address_id','$product_image','$quantity','$product_name','$product_price','Panding','$coupan_id','$coupan_status','$shipping','$pay_method')");




                if($sql){

                    echo "112";
                    $query = mysqli_query($this->conn,"DELETE FROM `cart` WHERE `customer_id` = '$customer_id' ");

                }else{

                    echo "fails";
                }
            }


        }
    }


    //--------------------------------------------------------------------------

        public function discount($data){

            
            
            session_start();

            $customer_id = $_SESSION['customer_id']['id'];


            $CoupanQuery  = mysqli_query($this->conn,"SELECT * FROM `cart` WHERE `customer_id` = $customer_id");

            // $num_rows = mysqli_num_rows($CoupanQuery);
            // $totalData = [];

            $i = 0;

            while($row = mysqli_fetch_assoc($CoupanQuery)){

                $totalData[] = $row;
                $count_id = $totalData[$i]['coupan_id'];

                $i++;
            }

            $cup_id = '';
            if($count_id == 0){

                $coupan = $data['coupan'];    
                
                $query = mysqli_query($this->conn,"SELECT  coupan_id,`amount` FROM `coupan` WHERE `coupan_name` = '$coupan'" );
                
                $amount = $query->fetch_assoc();
               
               $cup_id =  $amount['coupan_id'];


            }else{

                $amount = "empty";
            }
            

            
            
        //================================================================================================

            $coupan_id = $cup_id;
            $coupan_status = 1;
            // echo '<pre>'; print_r($coupan_id);exit;
            
            $sql = mysqli_query($this->conn,"SELECT * FROM `cart` WHERE `customer_id` = $customer_id");

            $num_rows = mysqli_num_rows($sql);
            $total = [];
            $i = 0;
            while($row = mysqli_fetch_assoc($sql)){

                $total[] = $row;

                // echo '<pre>'; print_r($total[$i]['coupan_id']);exit;

                if($total[$i]['coupan_id'] == 0 ){

                    $demo = mysqli_query($this->conn,"UPDATE `cart` SET `coupan_id`='$coupan_id',`coupan_status`='$coupan_status' WHERE `customer_id` = $customer_id");

                }

                $i++;

            }


            return json_encode($amount);
        }

//------------------------------------------------------------------------------------------------------------------------



        public function removeDiscount(){
    
            
            session_start();

            $customer_id = $_SESSION['customer_id']['id'];



            $demo = mysqli_query($this->conn,"UPDATE `cart` SET `coupan_id`=0,`coupan_status`= 0 WHERE `customer_id` = $customer_id");


        }

        public function checkDiscount(){

            session_start();

            $customer_id = $_SESSION['customer_id']['id'];

            $demo = mysqli_query($this->conn,"SELECT * FROM `cart` WHERE `customer_id` = $customer_id ");
            
            $i = 0;

            while($row = mysqli_fetch_assoc($demo)){

                $total[] = $row;

                $coupan_id = $total[$i]['coupan_id'];
                // echo '<pre>'; print_r($total[$i]['coupan_id']);exit;

                $query = mysqli_query($this->conn,"SELECT `amount`,`coupan_name` FROM `coupan` WHERE  `coupan_id` = $coupan_id");

                $name = $query->fetch_assoc();

                $c_name = $name['coupan_name'];

                $amount = $name['amount'];

                // echo '<pre>'; print_r($amount);exit;
                $arr = [];
                if($total[$i]['coupan_id'] == 0 ){

                    $msg = 0; 
                    $arr['msg'] = $msg;

                }else{
                    $msg = $c_name;
                    $arr['msg'] = $msg;
                    $arr['amount'] = $amount ;
                }

                $i++;

            }
            return json_encode($arr);
        }

//------------------------------------------------------------------------------------


        public function OrderHistory(){


            session_start();

            $customer_id = $_SESSION['customer_id']['id'];

            $query = mysqli_query($this->conn,"SELECT `id`,`address_id`,`price`, `status`, `created_date` FROM `order_details` WHERE customer_id = $customer_id");

            $data = [];
            while($row = mysqli_fetch_assoc($query)){

                $data[] = $row;
            }

            return json_encode($data);

        }
//------------------------------------------------------------------------------------

        public function MyOrders($data){

            $address_id = $data['address_id'];
            $order_id = $data['order_id'];
            session_start();

            $customer_id = $_SESSION['customer_id']['id'];
            // echo '<pre>'; print_r($order_id);exit;
            $HistoryData = [];

            $query = mysqli_query($this->conn,"SELECT * FROM `address` WHERE id = $address_id");
            $addData = $query->fetch_assoc();

            $sql = mysqli_query($this->conn,"SELECT * FROM `order_details` WHERE id = $order_id");

            $order = [];
            while($row = mysqli_fetch_assoc($sql)){

                $name = explode(",",$row['product_name'] );
                $row['product_name'] =   $name;

                $qty = explode(",",$row['quantity'] );
                $row['quantity'] = $qty;
                
                $price = explode(",",$row['price'] );
                $row['price'] = $price;
                $order[] = $row ;
                $coupan_id = $order[0]['coupan_id'];
                                // echo '<pre>'; print_r($order[0]['status']);exit;


                if(($order[0]['coupan_id'] == 0 ) && ($order[0]['coupan_status'] == 0 )  ){

                    $order[0]['coupan_amount'] = 0;
                    $order[0]['coupan_name'] = 'Not Used';

      
                }else{
                    $amountQuery = mysqli_query($this->conn,"SELECT `amount`,`coupan_name` FROM `coupan` WHERE `coupan_id` = $coupan_id");
                    $price_amount = $amountQuery->fetch_assoc();

                    $order[0]['coupan_amount'] = ($price_amount['amount']);
                        $order[0]['coupan_name'] = ($price_amount['coupan_name']);
                }

            }
            // $OrderData = $sql->fetch_assoc();
            // echo '<pre>'; print_r($order);exit;



            $HistoryData['address'] = $addData;
            $HistoryData['order'] = $order;

            return json_encode($HistoryData);
        }

        public function category_pic(){


           $new_row=[];
           $row_cat=[];

            $sql = "SELECT id,categorie_name FROM categories ORDER BY id ASC LIMIT 4";
            // SELECT * FROM products LEFT JOIN category ON products.c_id=category.cat_id WHERE category_name='men\'s fashion'  ORDER BY product_id DESC LIMIT 4
            $qury = mysqli_query($this->conn, $sql);
    
            while ($row = mysqli_fetch_assoc($qury)) {
    

                $category_name = $row['categorie_name'];
    
                $id = $row['id'];
    
                $sql_product = "SELECT * FROM `product` WHERE categories_id=$id ORDER BY id desc LIMIT 4";
    
                $query_sql_product = mysqli_query($this->conn, $sql_product);
                // echo '<pre>';

                // print_r($row);
                while ($data = mysqli_fetch_assoc($query_sql_product)) {
                    $new_row[] = $data;
                }
    
                //    echo '<pre>'; print_r($data);
    
                $row_cat[0][] = $category_name;
                $row_cat[1][] = $id;
    
                $rows = $new_row;
    
    
                $row_cat[2] = $rows;
            }


            return json_encode($row_cat);

        }

        public function rmvAddress($data){

            $address_id = $data['address_id'];

            // echo $address_id;

            // $query = "DELETE FROM `address` WHERE `id` = $address_id";
            $sql = mysqli_query($this->conn,"DELETE FROM `address` WHERE `id` = $address_id");
            if($sql){

                $process = "success";
                return json_encode($process);
            }else{
                $process = "failed";
                return json_encode($process);

            }
        }
}

?>