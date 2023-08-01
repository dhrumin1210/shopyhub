$(document).ready(function () {
  // alert(231232);
  card_item();

  function card_item(){

    var action = "add_cart";

    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: { action: action },
      success: function (data) {
        $record = JSON.parse(data);
        console.log($record);

        $(".cart_add").html($record.cart_item);
        $(".cart-detail").html($record.view_cart);
        $(".grand_total").html("$" + $record.Grand_total);
        $(".sub-total").html("$" + $record.Grand_total);

        $("#card-item-count").html($record.count);
        $(".cart-detail_page").html($record.order_summary);
        $(".total_price").html("$" + $record.Grand_total);

        var Grd_total = $record.Grand_total;
        var check_value = $(".form-check-input:checked").val();

        var totalPrice = parseInt(Grd_total) + parseInt(check_value);

        $(".grd_price").html("$" + totalPrice);

        if($record.count == 0){

            $(".shp_price").html("$" + 0);
            $(".grd_price").html("$" + 0);

        }


      },
    });

    

  }

  var check_value = $(".form-check-input:checked").val();
  var title = $(".form-check-input:checked").attr("title");
  $(".shp_price").html("$" + check_value);
  $(".shp_title").html(title);

  $(document).on("click", ".form-check-input", function () {
    
    var abc = $(this).attr("value");
    var xyz = $(this).attr("title");
    $(".shp_price").html("$" + abc);
    $(".shp_title").html(xyz);
    var test = $(".total_price").html();
    var num = parseInt(test.replace(/\D/g, ""));

    var Grand = parseInt(num) + parseInt(abc);
    $(".grd_price").html("$" + Grand);
  });

  //------------------------------------------------------------  

  $(document).on("submit", "#cart_detail_form", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: $(this).serialize(),

      success: function (data) {
        console.log("cgfbhgfh", data);
        card_item();
      },
    });
  });

  //------------------------------------------------------------  

  $(document).on("click", ".add_cart", function () {
    var id = $(this).attr("id");
    var action = "cart";
    var qty = $(".add_cart").siblings(".qty-no").val();
    // alert(qty);

    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: {
        id: id,
        quantity: qty,
        action: action,
      },
      success: function (data) {
        // console.log("cart",data);
        card_item();
        $("#cart_alert").html("Product added to cart");
        $("#cart_alert").show();
        setTimeout(() => {
          $("#cart_alert").hide();

        }, 3000);
      },
    });

  });

//------------------------------------------------------------  

  $(document).on("click", ".delete-icon", function () {
    var id = $(this).attr("id");
    var action = "cart-delete";
    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: {
        id: id,
        action: action,
      },
      success: function (data) {
        console.log("cart", data);
        card_item();
        $("#cart_alert").html("Product is delete from cart");
        $("#cart_alert").show();
        setTimeout(() => {
          $("#cart_alert").hide();

        }, 3000);
      },
    });
  });

  //------------------------------------------------------------  

  $(document).on("click", ".edit-pen", function () {
    // var qty = $(this).val();
    // var id = $("#quantity").attr("qty_no");
    //  var qty = $(this).parent().val()
    // alert(qty);
    var id = $(this).attr("id");
    var qty = $(this).siblings(".quantity").val();
    var action = "update_qty";

    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: {
        id: id,
        quantity: qty,
        action: action,
      },
      success: function (data) {
        // console.log("cart",data);

        card_item();
      },
    });
  });

  //------------------------------------------------------------  

  $(document).on("submit", "#address_form", function (e) {
    e.preventDefault();


    var address = $("#address").val();
    var state = $("#state").val();
    var city = $("#city").val();
    var zipcode = $("#zipcode").val();
    var mno = $("#mob_num").val();
    var count = "";

    if (address == "") {
      $(".erraddress").html("*Please Enter Your Address ").css("color", "red");
    } else {
      $(".erraddress").html("");
      count++;
    }

    if (state == "") {
      $(".errstate").html("*Please Choose State ").css("color", "red");
    } else {
      $(".errstate").html("");
      count++;
    }

    if (city == "") {
      $(".errcity").html("*Please Enter City Name ").css("color", "red");
    } else {
      $(".errcity").html("");
      count++;
    }

    if (zipcode == "") {
      $(".errzip").html("*Please Enter a Zipcode").css("color", "red");
    } else {
      $(".errzip").html("");
      count++;
    }

    if (mno == "") {
      $(".errnum").html("*Please Enter a Mobile Number").css("color", "red");
    } else {
      $(".errnum").html("");
      count++;
    }

    if (count == 5) {
      $.ajax({
        type: "POST",
        url: "../controller/customer_controller.php",
        data: $("#address_form").serialize(),
        success: function (data) {
          console.log(data);
          $("#address_form")[0].reset();
          card_item();
          $(".address-info-details").empty();
          getAddreass();
        },
      });
    }
  });

//------------------------------------------------------------------------------------------------------  

  getAddreass();

  //   $(".")
  var add_id = ''

  function getAddreass() {
    var action = "getaddress";
    $.ajax({
      type: "POST",
      url: "../controller/customer_controller.php",
      data: { action: action },
      success: function (data) {
        var record = JSON.parse(data);


        $(".address-info-details").empty();
        for(var i = 0; i< record.length; i++){

          // $(".checkbox-address").append(`<input type="checkbox" class="add_check_id" id="${record[i].id}" name="address">`)
          $(".address-info-details").append(`<input type="checkbox" class="add_check_id" id="${record[i].id}" name="address">&nbsp&nbsp<i class="fa f fa-location-dot"></i>&nbsp&nbsp ${record[i].address} , ${record[i].city} , ${record[0].state}   , ${record[0].zipcode}. &nbsp&nbsp<span id="${record[i].id}" class="deleteadderss"><i id="rmvAddress"class="fa fa-trash"></i></span><br><br>`);

        }
       

        $(document).on('click','.add_check_id',function(){

          $('.add_check_id').not(this).prop('checked', false);
          var id = $(this).attr('id');
          add_id = id;
        })


        // console.log(record  );
        if (record != "") {
          $(".pay_method").html("Check / Money order<br></br>");
          // $(".chekbox").html(
          //   `<input type="checkbox" class="add_check_id" id="${record[0].id}" name="address">`
          // );
          $(".add-detail").html(`     
             <span class= "add_check_id"  id="${record[0].id}">${record[0].address},${record[0].city}</span><br>
            <span>${record[0].state}, ${record[0].zipcode},</span><br>
            <span>${record[0].first_name}  ${record[0].last_name},</span><br>
            <span>${record[0].phone_num}</span>
            `);
          $(".btn-order").html(
            '<button type="submit" id="placeOrder" class="btn btn-outline-dark mt-3">Place Order</button> '
          );
        } else {
          $(".pay_method").append("<p> Please Add Your Address </p>");
        }




      },
    });
  }
  $("#cart_alert").hide();

  $(document).on('click',"#rmvAddress",function(){

    var rmadd = $(this).parent().attr('id'); 
    var action = "remove_address";
    $.ajax({

          type : "POST",
          url : "../controller/customer_controller.php",
          data:{
            add_id : rmadd,
            action : action
          },
          success : function(data){
            console.log(data);
            getAddreass();

          }
    })
    
  })
  
//---------------------------------------------------------------------------------------------------- 

                $(document).on("click", "#placeOrder", function () {

                    // var id = $(".add_check_id").attr("id");
                    // alert(abc);


                    var check_value = $(".form-check-input:checked").val();

                    var pay_method = $(".pay_method").text();
                    action ="place_order";
                    // alert(pay_method);
                    if(add_id != ''){

                      $.ajax({
                        type: "POST",
                        url: "../controller/customer_controller.php",
                        data: { 
                            address_id:add_id,
                            pay_method:pay_method,
                            shipping_method:check_value,
                            action: action },
                        success: function (data) {
                          alert("Thank You For Parchasing")
                            // var record = JSON.parse(data);
                            $('.add_check_id').not(this).prop('checked', false);

                            card_item();

                            setTimeout(function(){

                              window.location.href = "http://localhost/shopyhub/Frontend/view/index.php"; 
                              },2000);
                        },
                        });

                    }else{

                      alert("please Add your address")
                    }
                    
                });


  //---------------------------------------------------------------------------------------

                // var gTotal = '';
                $(document).on("click",".coupan-btn",function(){

                    var coupan = $(".coupan-code").val();

                    var status = 'true';

                    if(coupan == ''){

                      $('.coperr').html(" *Please Enter Coupan Code").css("color",'red');

                    }else{

                      $('.coperr').html('');

                      status = 'false';
                    }

                    var action = "coupan_discount";



                    if(status == 'false'){

                    $.ajax({

                          type:"POST",
                          url:"../controller/customer_controller.php",
                          data: { action:action,
                                  coupan:coupan
                                 },

                          success:function(data){
                            
                            // $('.coupan-btn').removeClass('active');
                            // $('.coupan-btn').addClass('active');
                            var amountPrice =  JSON.parse(data);
                            console.log(typeof(amountPrice));

                            if((amountPrice !=  null) && (amountPrice != 'empty')){

                              alert('Discount is applied');


                              var priceTotal = $(".grd_price").html();
  
                              var pTotal = parseInt(priceTotal.replace(/\D/g, ""));
  
                              
                              var discount = amountPrice.amount;
                              
                              
                              var TotalDiscount = pTotal - discount;


  
                              $(".grd_price").html('$' + TotalDiscount);
                              $(".coupan-code").attr('disabled','disabled');
                              $(".remove-discount").show();

  
                            }else{

                              alert("Invalid Coupan Code");

                            }
                          
                          }
                    })
                  }

                })

                $(".remove-discount").hide();


              $(document).on("click",'.remove-discount' ,function(){

                
                action = 'remove_discount';

                $.ajax({
                  type: "POST",
                  url: "../controller/customer_controller.php",
                  data: { 
                     
                      action: action },
                  success: function (data) {
                    // alert("Thank You For Parchasing")
                    //   // var record = JSON.parse(data);
                    $(".coupan-code").removeAttr('disabled');

                    $(".remove-discount").hide();
                    alert("discount is removed");
                    // $(".coupan-code").reset();
                    //   $('.add_check_id').not(this).prop('checked', false);

                      card_item();
                  },
                  });
              })


});
