$(document).ready(function(){

    // alert(3443)
    var action ="nav_categories";
    $.ajax({


        type:"POST",
        url:"../controller/customer_controller.php",
        data:{action:action},
        success:function(data){

            var total =JSON.parse(data);
            console.log(total);
            for( var i = 0; i<total.length; i++){
                // console.log(total.data[0].categorie_name);   
                console.log(total[i].categorie_name)

                $(".navbar").append(`<a href="product.php?id=${total[i].id}">${total[i].categorie_name}</a>`);
               
            }
            // if(total.image.logo_png == ""){
                $(".logo_png").append(`<img src="../logo_png/logo_1-removebg.png" class="logo_png"  alt=""> `)
            // }else{
                // $(".logo_png").append(`<img src="../../Backend/logo_navbar/${total.image.logo_png}" class="logo_png"  alt="">   `)
            // }
          
         

        }
    })

    $.ajax({

        url: '../controller/customer_controller.php',
        type: 'POST',
        data: { action: 'dynamic_category_listing' },
        success: function (data) {

            var product_list = JSON.parse(data);

            console.log(product_list)
            for (var i = 0; i < product_list[1].length; i++) {

                var opt = `<div class="">
                    <div class="category_list">
                    <div class="col-md-12 text-center cats">
                    <h1 class="cat_title"><a href='product_category.php?category=${product_list[0][i]}'>${product_list[0][i]}</a></h1>
                    </div>
                    <div class="" style=" padding-top:0px; padding-bottom:25px;">
                            <div class="">
                            <div class="row category_new_products">`

                for (var j = 0; j < product_list[2].length; j++) {

                    img = product_list[2][j]['product_image'].split(",");
                    
                    image = img[0];
                    
                    cat=product_list[2][j].categories_id.split(",");
                    cats=cat[0];


                    if (product_list[1][i] === cats) {
                        //here i do misteck for finding how it do this only i need to +=
                        opt += `<div class="panel-block-row col-md-3 d-flex align-items-stretch">
                                            <div class="card product_rec" style="width: 18rem;">
                                             <a href="product_detail.php?id=${product_list[2][j].id}"><img src="../assets/images/products/${image}" class="card-img-top card_img" alt="..."><hr>
                                                <div class="card-body">
                                                <h5 class="card-title text-center">${product_list[2][j].product_name}</h5>
                                               
                                                 <span class ="productprice">Price:</span><span class='card-text prices'>$${product_list[2][j].price}.00</span>
                                                </div></a>   
                                                </div>
                                                    </div>`;

                        // $('.category_new_products').text(card);
                    }
                }
                `<div>
                        </div>
                            </div>
                                </div>
                                </div>`
                $(".category_new_pro").append(opt);
            }
        }
    });

})