<?php  

// session_start();

// session_start();206

if(!isset($_SESSION['email'])){

  header('http://localhost/shopyhub/Frontend/view/customer_login.php');

}
if(isset($_SESSION['count_item'])){

  
  header('http://localhost/shopyhub/Frontend/view/index.php');

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
  <link rel="shortcut icon"  type="image/png" href="../logo_png/logo_1-removebg.png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .container {
    font-family: math;

  }
  i.fa.fa-magnifying-glass {
    display: none;
}
  input.form-feild {
    width: 65%;
    padding: 3px;
    margin-top: 16px;
  }

  input#flexRadioDefault2 {
    margin-left: 2px;
  }

  .col-8.form-div {

    margin-top: 84px;
  }

  label {
    margin-top: 9px;
  }

  select#state {
    margin-top: 7px;
    width: 65%;
    padding: 7px;
  }

  .line-tage {

    border: 1px solid black;
  }

  .shp-line {
    margin-top: 36px;
    font-weight: inherit;
  }

  .order-summary {

    margin-top: 138px;
  }

  .row.order-summary {
    margin-top: 39%;
    background-color: #dddddd;
  }

  button.next_btn {


    width: 120px;
  }

  h3.order_sumry {
    margin-top: 193px;
  }

  button.btn.btn-outline-dark.btn-block.btn-lg.item-list {
    width: 50%;
    padding: 3px;
    font-family: 'Ionicons';
    margin-bottom: 18px;
    margin-left: 10px;
    margin-top: 5px;
  }
  .coupan-btn{
    padding: 2px;
    width: 131px;
    margin-left: 14px;
  }
  button.btn.btn-outline-dark.coupan-btn {
    padding: 2px;
    margin-left: 17px;
}
.remove-discount{

  cursor: pointer;
}
  </style>

<body>
  <?php include 'header.php' ?>
  <div class="container checkout-container">
    <div class="row">
      <div class="col-8 form-div">
        <h2>Shipping Address</h2>
        <hr class="line-tage">
        
        <form id="address_form" class="address">
          <!-- <label for="fname">First Name</label>
          <div class="fname">
            <input type="text" id="fname" name="first_name" class="form-feild">
          </div>
          <span class="errfname"></span><br>
          <label for="lname">Last Name</label>
          <div class="lname">
            <input type="text" name="last_name"  id="lname" class="form-feild">
          </div>
          <span class="errlname"></span><br> -->
          <label for="add"> Address</label>
          <div class="address_input">
            <input type="hidden" name="action" value="address_info">
            <input type="text" id="address" name="address" class="form-feild">
          </div>
          <span class="erraddress"></span><br>
          <label for="state">State</label>
          <div class="state-dropdown">
            <select class="form-feild" name="state" id="state">
              <option value="Gujarat">Gujarat</option>
              <option value="Panjab">Panjab</option>
              <option value="Delhi">Delhi</option>
              <option value="UP">UP</option>
            </select>
          </div>
          <span class="errstate"></span><br>
          <label for="city">City</label>
          <div class="city">
            <input type="text" id="city" name="city" class="form-feild">
          </div>
          <span class="errcity"></span><br>
          <label for="zip">Zip/Postal Code</label>
          <div class="zip">
            <input type="text" name="zipcode" id="zipcode" class="form-feild">
          </div>
          <span class="errzip"></span><br>
          <label for="m_number">Phone Number</label>
          <div class="m_number">
            <input type="text" name="mob_num" id="mob_num"  class="form-feild">
          </div>
          <span class="errnum"></span><br>
          <div>
          <button type="submit" class="btn btn-outline-dark next_btn col-2">Submit</button>
    </form>
            <!-- <hr class="line-tage"> -->
            <h2 class="shp-line">Shipping Method</h2>
            <table class="table col-8">
              <thead>
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">Price</th>
                  <th scope="col">Method Title</th>
                  <th scope="col">Carrier Title</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><input class="form-check-input" value="10" type="radio" name="flexRadioDefault" title="Fixed" id="flexRadioDefault2" checked>
                  </th>
                  <td>$10</td>
                  <td>Fixed</td>
                  <td>Flate Rate</td>
                </tr>
                <tr>
                  <th scope="row"> <input class="form-check-input" type="radio" value="15" name="flexRadioDefault" title="Table Rate" id="flexRadioDefault2" checked>
                  </th>
                  <td>$15</td>
                  <td>Table Rate</td>
                  <td>Best Way</td>
                </tr>
              </tbody>
            </table>

          </div>
      </div>
      <div class="col-4">
        <div class="row">
          <h3 class="order_sumry">Order Summary : </h3>
          <!-- absjahsjkas -->
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-outline-dark btn-block btn-lg item-list" data-toggle="modal" data-target="#myModal">
            Show Cart Items
          </button>


          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Cart Items</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <table class="table col-12">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody class="cart-detail_page">
                    </tbody>
                  </table>
                  <h4>Grand Total :</h4>
                  <p class="total_price"></p>
               </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          <!-- Aas -->
          <!-- <table class="table col-12">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Sub Total</th>


              </tr>
            </thead>
            <tbody class="cart-detail_page">



            </tbody>
          </table> -->
          <h2>Total Amount Details :</h2><br><br>
          <h3 class="grand_total_price"></h3>
            <div class="col-6">
              <p class="total">Total</p>
            </div>
            <div class="col-6">
              <p class="total_price"></p>
            </div>
          <p>Shipping</p>
          <div class="col-6">
            <p class="shp_title"></p>
          </div>
          <div class="col-6">
            <p class="shp_price">dasd</p>
          </div>
          <p>Apply Discount Code :</p>
            <div class="col-6">
              <input class="coupan-code" type="text">
              <input class="coupan_id"  name="coupan-id" type="hidden">
              <a class="mt-2 text-danger remove-discount" >remove</a>

            </div>
            <div class="col-6">
              <!-- <button class="coupan-btn">Apply Discount</button> -->
              <button type="submit" class="btn btn-outline-dark  coupan-btn">Apply Discount</button>
            </div>
            <span class="coperr"></span>
          <hr>
          <div class="col-6">
            <p class="grd_total">Grand_total</p>
          </div>
          <div class="col-6">
            <p class="grd_price"></p>
          </div>
          <h3>Payment Method :</h3>
          <!-- <div class="checkboxes">
            <p class="address"><i class="fa fa-location-dot"></i></p> 
      
          </div> -->
            <!-- <div class="col-1 checkbox-address">

            </div> -->
            <span class="pay_method"></span>
            <div class="col-12 address-info-details">

            </div>

            <!-- <span class="pay_method"></span>
            <div class="col-1">
            <span class="chekbox"></span>
            </div>
            <div class="col-6 add-detail" id="add-detail">
      
            </div> -->

          <!-- <input type="checkbox" id="${record[i].id}" name="address"> -->

           
  
        </div>
        <span class="btn-order"></span>
        <!-- <button type="submit" class="btn btn-outline-dark mt-3">Place Order</button> -->

      </div>
    </div>



  </div>
  <?php include 'footer.php' ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="JS/cart.js"></script>
  <script src="JS/checkout.js"></script>
</body>

</html>