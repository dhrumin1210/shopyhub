<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../model/admin_model.php";

if (isset($_POST["action"])) {
    $action = $_POST["action"];
}

class controller{

    public function get_action($action){

        $display = new admin();

        switch ($action) {

            case 'login':
                $display->login();
                break;
            case 'products':
                $display->product_records();
                break;
            // case 'products_records':
            //     $display->product_records_list();
            //     break;
            case 'delete_product':
                   
                $display->delete_products();
                break;
            case 'categories':
      
                $display->categories();
                break;
            case 'product_insert':
                $display->product_insert();
                break;
            case 'edit_product':
                  
                $display->edit_product();
                break;
            case 'update_product':
                
                $display->update_product();
                break;
            // case 'image_update':
                   
            //     $display->image_update();
            //     break;
            case 'categories_list':
               
                $display->categories_list();
                break;
            case 'delete_categories':
             
                $display->delete_categories();
                break;
            case 'categorie_insert':

                $display->categorie_insert();
                break;
                
            case 'edit_categorie':

                // echo '<pre>'; print_r($_POST);exit;
                $display->edit_categorie();
                break;
            case 'categorie_update':

                // echo '<pre>'; print_r($_POST);exit;
                $display->categorie_update();
                break;

            case 'customer_list':

                // echo '<pre>'; print_r($_POST);exit;
                $display->customer_list();
                break;
            case 'customer_delete':

                // echo '<pre>'; print_r($_POST);exit;
                $display->customer_delete();
                break;
            case 'customer_insert':

                // echo '<pre>'; print_r($_POST);exit;
                $display->customer_insert();
                break;
            case 'edit_customer':
                // echo '<pre>'; print_r($_POST);exit;
                $display->edit_customer();
                break;
            case 'customer_update':
                // echo '<pre>'; print_r($_POST);exit;
                $display->update_customer();
                break;
            case 'dashboard':
                $display->dashboard();
                break;
            case 'delete_all':
                // echo '<pre>'; print_r($_POST);exit;
                $display-> delete_all_product();
                break;
        }
    }

}

$record = new controller($action);
$record->get_action($action);

?>