    $(document).ready(function(){

        // var order = "ASC";
        // var sort = "product_name";

        var page  = 1;
        var limit = 6;
        var sort = 'product_name';
        var order = 'ASC';
        productlist(page,limit,sort,order);  

        $totalPage = [];

        function productlist(page,limit,sort,order){

        
        var searchParams = new URLSearchParams(window.location.search)
        var id = searchParams.get('id');
        var action = "product_list";

        $.ajax({
            type: "POST",
            url: "../controller/customer_controller.php",
            data: { 
                categories_id: id,
                action: action,
                page:page,
                limit:limit,
                sort:sort,
                order:order
            },
            success: function(data) {
                var response = JSON.parse(data);
                // console.log(response.current_page);

                // console.log("sdfsdfdf",response.current_page);

                // if(response.data.length == 0){

                    // response.current_page = 1;
                    // var page =  response.current_page;
                    // var limit = $('#mySelect').val();
                    // var sort = $('#myOrder').val();
                    // var order = 'ASC';
                    // productlist(page,limit,sort,order); 

                // }

                console.log("dsdadsd",response.current_page);


                $('.card_listing').empty();
                var totalpage = response.total_page;

                for (var i = 0; i < response.data.length; i++) {
                    var card = `

                        <div class="col-md-4">
                            <div class="card mt-5 shadow" id="product_cart" style="width: 18rem;">
                                <a href="product_detail.php?id=${response.data[i].id}"><img src="../assets/images/products/${response.data[i].product_image}" class="card-img-top" style = "height:368px" alt="..."></a>
                                <div class="card-body text-center">
                                    <h5 class="card-title">${response.data[i].product_name}</h5>
                                    <p class="card-text price" >Price: $${response.data[i].price}</p>
                                    <a href="#" id=${response.data[i].id}  class="btn btn-primary add_cart">Add to Cart</a>

                                </div>
                            </div>
                        </div>

                    `;
                    // $(".link_detail").attr("href",`product_detail.php?id=${response.data[i].id}`);

                    $(".card_listing").append(card);
                  
                }



                $('.pagination').empty();

                if(response.data.length !== 0){

                if (response.current_page >= 1) {
                    $('.pagination').append(`<li class="page-item previous" id=${(response.current_page)-1} page-current ><a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span></a></li>`);
        

                }

                for( var i=1;i<=response.total_page;i++){
            
                    if (i == response.current_page) {
                    
                    var list = `<li class="page-item  page-current" id='${i}'><a class="page-link active" id='${i}'>${i}<a><li>`;
                    }
                    else {
                        var list = `<li class="page-item page-current" id='${i}'><a class="page-link" id='${i}'>${i}<a><li>`;   
                    
                    }

                
                        $('.pagination').append(list);
                    
                }

                if (response.current_page < response.total_page) {
                    $('.pagination').append(`<li class="page-item  next" id=${parseInt(response.current_page)+ 1} >
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>`);
                } else {
                    $('.pagination').append(`<li class="page-item disabled next" id=${parseInt(response.current_page)} >
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>`);
                }
            }
            }
        }); 

    }


    // $(document).on("click",".add_cart",function(){
    
    //     var id = $(this).attr("id");
    //     var action = "cart";
    //     $.ajax({

    //         type:"POST",
    //         url:"../controller/customer_controller.php",
    //         data:{ id:id,
    //                action:action    
    //              },
    //         success:function(data){
    //             // console.log("cart",data);
    //         }
    //     })

    // })
    
        $(document).on("click",".page-current",function(){
             limit = $('#mySelect').val();
            $(".page-current").removeClass("active")
            $(this).addClass("active");
             page = $(this).attr("id");
            //  sort = $('#myOrder').val();
            //  order = 'ASC';
            // console.log("limit",limit,"page:",page);
            productlist(page,limit,sort,order);
            });

        $(document).on("click",".previous",function(){
             limit = $('#mySelect').val();

            page = $(this).attr("id");
            //  sort = $('#myOrder').val();
            // order = 'ASC';
            productlist(page,limit,sort,order);

        })
        $(document).on("click",".next",function(){
            //  limit = $('#mySelect').val();

             page = $(this).attr("id");
            //  sort = $('#myOrder').val();

            // console.log("limit",limit,"page:",page);
            productlist(page,limit,sort,order);
        })


        $(document).on("change",'#mySelect',function(){

             limit = $(this).val();

             var page = 1;
            //  var  page = $(".active").attr("id");
            //  sort = $('#myOrder').val();
            //  order = "ASC";
            // console.log("limit",limit,"page:",page);
            productlist(page,limit,sort,order);


        });

        $(".fa-magnifying-glass").click(function() {
            $(".search-box").toggle();
          });

        //   $(document).on("click","#search_product",function(){

        //     window.location.href("http://localhost/shopyhub/Frontend/view/search_product.php");
        //   })

        $(document).on("change",'#myOrder',function(){

            //  limit = $("#mySelect").val();

             page = $(".active").attr("id");

             sort = $(this).val();

            //  order = "ASC";
             // console.log("limit",limit,"page:",page);
             productlist(page,limit,sort,order);  


        });

        $(document).on("click","#order_icon",function(){

            //  limit = $("#mySelect").val();

             page = $(".active").attr("id");
             sort =  $("#myOrder").val();

            if($("#order_icon").hasClass("fa fa-arrow-down-wide-short") == true){
                
                $("#order_icon").attr("class","fa fa-arrow-up-wide-short");
                 order = "ASC";
                
            }else{
                $("#order_icon").attr("class","fa fa-arrow-down-wide-short");
                 order = "DESC";

            };
            // $(this).attr("class","fa fa-arrow-up-wide-short");
            productlist(page,limit,sort,order);    

        })

       

    })