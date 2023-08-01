$(document).ready(function(){


   var action = 'check_discount';
    $.ajax({
        type: "POST",
        url: "../controller/customer_controller.php",
        data: { 
           
            action: action },
        success: function (data) {

            var row = JSON.parse(data);

            console.log(row);
            if(row != 0){

                $(".coupan-code").val(row.msg);


                var priceTotal = $(".grd_price").html();
  
                var pTotal = parseInt(priceTotal.replace(/\D/g, ""));
    
                var discount = row.amount;
                              
                              
                var TotalDiscount = pTotal - discount;
                $(".grd_price").html('$' + TotalDiscount);


                $(".coupan-code").attr('disabled','disabled');
                $(".remove-discount").show();


            }

        }

      })


      var order_action = 'order_history';

      $.ajax({
        type: "POST",
        url: "../controller/customer_controller.php",
        data: { 
           
            action: order_action },
        success: function (data) {

            var record = JSON.parse(data);

            console.log(record);

            var table = '';
            for( var i = 0; i<record.length;i++){


                // console.log(record[i].id);
                 table += `<tr>
                  <td>${record[i].id}</td>
                  <td>${record[i].created_date}</td>
                  <td></td>
                  <td>${record[i].price} </td>
                  <td>${record[i].status}</td>
                  <td><a href =order_detail.php?id=${record[i].id}&add_id=${record[i].address_id} ><i class="fa fa-eye eye-icon "></i></a></td>
              </tr> `;

            }
            $('.order-history').html(table);
        }

    });


    var order_history = 'OrderHistory';
 
    var searchParams = new URLSearchParams(window.location.search)
    var add_id = searchParams.get('add_id');
    var id = searchParams.get('id');
    // console.log(id);
    $.ajax({
        type: "POST",
        url: "../controller/customer_controller.php",
        data: { 
            order_id:id,
            address_id : add_id,
            action: order_history },
        success: function (data) {

            var response = JSON.parse(data);
            console.log(response);

            // console.log('asdsa',response.order.shipping_price);
            var detail = `
            

            <div class="mt-5 col-3">
                <h4>Billing Address</h4>
                <p>${response.address.address} , ${response.address.city}</p>
                <p>${response.address.state} , ${response.address.zipcode}</p>
                <p>${response.address.phone_num} </p>

            </div>
            <div class=" mt-5 col-3">
                <h4>Shipping Address</h4>
                <p>${response.address.address} , ${response.address.city}</p>
                <p>${response.address.state} , ${response.address.zipcode}</p>
                <p>${response.address.phone_num} </p>
            </div>
            <div class="mt-5 col-3">
                <h4>Shipping Price</h4>
                <p>$${response.order[0].shipping_price}</p>
            </div>
            <div class="mt-5 col-3">
                <h4>Payment Method</h4>
                <p class="pay_method">${response.order[0].payment_method}</p>
                
            </div>
            <table class="table table-striped mt-3   bg-white">
             <thead>
                 <tr>
                     <th scope="col">Product Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Qty</th>
                     <th scope="col">Subtotal</th>
                 </tr>
             </thead>
             <tbody class ="table_body"> 
      
             </tbody> 

         </table>
         <div class = 'd-flex justify-content-end col-12'>
         <p class="subtotal">asad</p>
         </div>
         <div class = 'd-flex justify-content-end col-12'>
         <p class ="shippingPrice" >asad</p>
         </div>
         <div class = 'd-flex justify-content-end col-12'>
         <p id ="coupan"></p>
         </div>
         <hr class='hrline'>
         <div class = 'd-flex justify-content-end col-12'>
         <p class="allTotal"></p>
         </div>

            `;

            tbody = '';
            var G_Total = 0;

         
                for( var j= 0; j< response.order[0].product_name.length ; j++){

                    var subTotal = response.order[0].price[j] * response.order[0].quantity[j];
                    G_Total = G_Total + subTotal;

                    tbody += `  <tr>
                           <td>${response.order[0].product_name[j]}</td>
                           <td>$${response.order[0].price[j]}</td>
                           <td>Orderd : ${response.order[0].quantity[j]}</td>
                           <td>$${subTotal}</td>
                           </tr>`;
                }
         
         

            var AllTotal = parseInt(G_Total) + parseInt(response.order[0].shipping_price);

            // alert(AllTotal)
            // if(response.order[0].coupan_amount == 0){

            //     // console.log("AAAA"+response.order[0].coupan_amount);
            //     $(".coupan-discount").html('Coupan Discount:0')
            // }else{

            // console.log("AAA",response.order[0].coupan_amount);
            
            // }
            $(".address-details-data").append(detail);
            $(".table_body").append(tbody);
            $(".subtotal").html('Subtotal: $'+ G_Total);
            $(".shippingPrice").html('Shipping: $'+ response.order[0].shipping_price);
            $(".allTotal").html('Grand Total : $'+ AllTotal)
            if( response.order[0].coupan_amount !== 0){

                $("#coupan").html('Discount :$'+response.order[0].coupan_amount);
                var num = parseInt(response.order[0].coupan_amount);
                var maxTotal = AllTotal - num ;
                console.log(maxTotal);
                
                $(".allTotal").html('Grand Total : $'+ maxTotal)

            }
        }

    });

})