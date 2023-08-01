<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../model/customer_model.php";
$action = '';
if (isset($_POST["action"])) {
    $action = $_POST["action"];
}

class controller
{
    function __construct($action)
    {

        switch ($action) {
            case 'nav_categories':
                $this->nav_categorie();
                break;
            case 'create_customer':
                // echo '<pre>'; print_r($_POST);exit;
                $this->create_customer();
                break;

            case 'login':
                // echo '<pre>'; print_r($_POST);exit;
                $this->login_customer();
                break;
            case 'product_list':
                $this->product_list();
                break;
            case 'cart':
                $this->cart();
                break;
            case 'add_cart':
                $this->add_cart();
                break;
            case 'cart-delete':
                $this->cart_delete();
                break;
            case 'update_qty':
                $this->update_qty();
                break;
            case 'view_cart':
                
                $this->view_cart();
                break;
            case 'getaddress':
                
                $this->getaddress();
                break;
            case 'address_info':
                $this->address_info();
                break;
            case 'place_order':
                $this->place_order();
                break;
            case 'coupan_discount':
                $this->coupan_discount();
                break;
            case 'remove_discount':
                $this->remove_discount();
                break;
            case 'check_discount':
                $this->check_discount();
                break;
            case 'order_history':
                $this->order_history();
                break;
            case 'OrderHistory':
                $this->OrderHistory();
                break;
            case "dynamic_category_listing":
                $this->dynamic_listing();
                break;
            case "remove_address":
                $this->remove_address();
                break;

        }
    }

    public function remove_address(){

        // echo "<pre>"; print_r($_POST);exit;
        $address_id = $_POST['add_id'];
        $data = [
            
            'address_id' => $address_id,
        
        ];
        $model = new customer();
        echo $model->rmvAddress($data);   
        // echo $model->rmvAddress();
        
    }


    public function order_history(){

        $model = new customer();
        echo $model->OrderHistory();
        
    }


    public function OrderHistory(){

        $model = new customer();
        $address_id = $_POST['address_id'];
        $order_id = $_POST['order_id'];
        
        $data = [
            
            'address_id' => $address_id,
            'order_id' => $order_id
        ];
        echo $model->MyOrders($data);       
        
    }
    public function check_discount(){

        $model = new customer();
        echo $model->checkDiscount();

    }
    public function remove_discount(){

        $model = new customer();
        echo $model->removeDiscount();

    }

    public function coupan_discount(){

        $coupan = $_POST['coupan'];

        $data = [

            'coupan' => $coupan
        ];

        $model = new customer();
        echo $model->discount($data);


    }

    public function place_order(){

        // echo "<pre>";print_r($_POST);exit;
        $address_id = $_POST['address_id'];
        $pay_method = $_POST['pay_method'];
        $shipping = $_POST['shipping_method'];
        $data = [

            'address_id' => $address_id,
            'pay_method' => $pay_method,
            'shipping' => $shipping
        ];
        $model = new customer();
        echo $model->placeOrder($data);
    }


    public function getaddress(){

        $model = new customer();
        echo $model->getaddressData();

    }

    public function address_info(){

        // echo '<pre>'; print_r($_POST);exit;
        $model = new customer();

        $address = $_POST['address'];
        // $first_name = $_POST['first_name'];
        // $last_name = $_POST['last_name'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $phone_num = $_POST['mob_num'];

        $data = [
             
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            // 'first_name'=>$first_name,
            // 'last_name'=>$last_name,
            'phone_num' => $phone_num,
        ];
        $model->address($data);
    }
    public function view_cart(){

        // echo '<pre>'; print_r($_POST);exit;
        $model = new customer();
        $model->update_cart_item();


    }
  
    public function getProductData($table, $id)
    {

        $model = new customer();
        $data = [

            'table' => $table,
            'id' => $id
        ];

        return $model->getProductData($data);
    }

    function nav_categorie()
    {
        $model = new customer();
        $model->categories_data();
    }

    function create_customer()
    {

        $customer_data = [

            'email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'password' => $_POST['password'],
            'confirm_password' => $_POST['confirm_password'],
            'mobile_number' => $_POST['mobile_number']
        ];

        $model = new customer();
        $model->customer_insert($customer_data);
    }
    function login_customer()
    {


        $login_data = array(
            "usernames" => $_POST['email'],
            "pass" => $_POST['password']
        );

        $model = new customer();
        $model->customer_login($login_data);
    }


    function product_list()
    {

        $limit = isset($_POST['limit']) ? $_POST['limit'] : 6;
        // $limit = isset($_POST[])
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $order = isset($_POST['order']) ? $_POST['order'] : 'ASC';

        // echo "<pre>";print_r($limit);exit;
        if(!isset($_POST['sort'])){

            $sort = "product_name";
        }else{

            $sort = $_POST['sort'];
        }

        
        // echo "<pre>";print_r($_POST['sort']);
       
        $id = [

            'id' => $_POST['categories_id'],
            'limit' => $limit,
            'page' => $page,
            'sort' => $sort,
            'order' => $order
        ];
        $model = new customer();
        $model->product_listing($id);
    }

    function cart(){

        $id = $_POST['id'];
        
        if(isset($_POST['quantity'])){

            // echo "<pre>";print_r($_POST);exit;
            $quantity = $_POST['quantity'];
            $data = [

                'id' => $id,
                'quantity' => $quantity
            ];
        }else{

            $data = [

                'id' => $id,
            ];
        }

        
        

        $model = new customer();
        echo $model->cart_data($data);

    }

    function add_cart(){

        $model = new customer();
       echo $model->add_cart_data();
    }
    function cart_delete(){

        $model = new customer();
       echo $model->cart_delete_item();
    }
    function update_qty(){
        $model = new customer();

        echo $model->update_cart_qty();

    }
    function dynamic_listing(){
        $model = new customer();
        echo $model->category_pic();
    }
}

$record = new controller($action);
