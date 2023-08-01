
$(document).ready(function(){

// alert(123)
    productlist();
    
    
        function printTable(response){
    
            var table = "";
    
            table += `<table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
            <thead>
                <tr>
                    <th><input type="checkbox" name="select_all" value="1" id="CheckAll"></th>  
                    <th>id</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th style="width: 75px;">Action</th>
                </tr>
            </thead>
            <tbody class="register_class" font-size: 20px; >`
    
            // const arr = [];
            console.log("response",response)
            for (var i = 0; i < response.length; i++) {
                 var id = response[i].id;
                 var price = response[i].price;
                 var image = response[i].product_image;
                 var product_name = response[i].product_name;
                //  arr.push(id)
                 var status = response[i].status;
                var fullimage = "../assets/images/products/"+image;
    
    {/* <td><a href="${item['img']}" data-fancybox  ><img src='${item['img']}' height='50'></a></td>` */}
                            // + 
                    table+= "<tr>";  
                    table+=`<td><input type="checkbox" name="select_all" id="${id}" class="checkBoxClass"></td>
 
                     <td class="table-user">   
                        <a href="javascript:void(0);" class="text-body font-weight-semibold">${id}</a>
                    </td>
                    <td>
                    <a href="${fullimage}" data-fancybox >
                    <img src="${fullimage}" alt="table-user" width="70" height="70" class="mr-2 rounded-circle">
                    </a>
                    </td>
                    <td>
                        ${product_name}
                    </td>
                    <td>
                        ${price}
                    </td>
                    <td>
                    ${status}
                    </td>
                    <td>
                        <a href="product_insert.php?id=${id}" product_id ='${id}'  class="action-icon edit_product" > <i class="mdi mdi-square-edit-outline"></i></a>
                        <a href="javascript:void(0);" product_id ='${id}' class="action-icon delete_product" > <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>`
          
                // console.log(arr);
            
            }
            // console.log(arr);
    
            
            table +=  `</tbody>`;
            table += `</table>`;
            $('.table-data').html(table);
        
            
            $("#products-datatable").DataTable({
    
            language: {
                // paging: false,
    
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                },
                info: "Showing Products _START_ to _END_ of _TOTAL_",
                lengthMenu: 'Display <select class=\'custom-select custom-select-sm ml-1 mr-1\'><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> Products'
            },
            pageLength: 10,
            columns: [{
                orderable: false,
             
                // render: function(e, o, l, t) {
                //     return "display" === o && (e = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input dt-checkboxes"><label class="custom-control-label">&nbsp;</label></div>'), e
                // },
                // checkboxes: {
                //     selectRow: !0,
                //     selectAllRender: '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input dt-checkboxes"><label class="custom-control-label">&nbsp;</label></div>'
                // }
    
            }, {
                orderable: true
            }, {
                orderable: false
            }, {
                orderable: true
            }, {
                orderable: true
            }, {
                orderable: true
            }, {
                orderable: false
            }],
            select: {
                style: "multi"
    
            },
            order: [
                [1, "asc"]
            ],
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                // $("input:checkbox:first").addClass("test");
                // $("select").attr("id","select_option");
    
                // // $("#select_option").click(function(){
    
                // //     // $("#select_option").removeClass("selected");
    
                // //     $(this).addClass("selected");
                // //     var crud = $(this).val();
        
                // //     alert(crud)
                // //     // console.log(crud);
                // // })
            
                // for(var i = 1 ; i<=list;i++){
    
                //     $(".pagination-rounded").find("#products-datatable_previous").after(`<li class="paginate_button page-item "><a href="#" aria-controls="products-datatable" data-dt-idx="${i}" tabindex="0" class="page-link">${i}</a></li>`); 
    
    
                // }
    
                // $(document).on("click","#select_option",function(e){
    
                //     e.preventDefault();
                //     $("#select_option").removeClass("selected");
                //     $(this) .addClass("selected")
    
                //     var limit = ($(this).val());
                //     console.log(limit);
                //     var page_id =$("#products-datatable_paginate").find(".active").text();
                //     alert(page_id);
    
    
    
                // })
                $("#CheckAll").click(function(){
                    $(this).removeClass("select");
                    var arr = [];
                      if(this.checked){
                        $('.checkBoxClass').each(function(){
                          // alert($(this).attr("id"))
                          var self = $(this);                 
                          arr.push(self.attr("id"));                
                          $(".checkBoxClass").prop('checked', true);
                          $("#CheckAll").addClass("select","select");

                        })
                      }else{
                        $('.checkBoxClass').each(function(){
                            $(".checkBoxClass").prop('checked', false);
                        })
                      }
                      arr_1 = arr;
                
                      console.log(arr_1);
                     });


                $(".checkBoxClass").click(function(){

                    if($(".checkBoxClass").hasClass("check") == false){
                        $(".checkBoxClass").addClass("check","check");

                    }else{
                        $(".checkBoxClass").removeClass("check");

                    }

                    // alert("fdfd");
                    // $(".checkBoxClass").prop('checked', true);

                    var arr = [];
    
                    $("input[type=checkbox]").each(function () {
                      // alert($(this))
                      var self = $(this);
                      if (self.is(':checked')) {
                          arr.push(self.attr("id"));
                      }
                  });
                  arr_1 = arr;
                  console.log(arr_1)
                  });
            }
        })
    
      
        }
    
        var arr_1 = [];
    function productlist(){
        var action = "products";
            $.ajax({
        
                type:"POST",
                url:"../controller/admin_controller.php",
                data:{action:action  },
                success:function(data){
                    // console.log(data);
                    var response = JSON.parse(data);
                    printTable(response);
            
               
                  
                }
                
            })
        }
    
        
    
        $(document).on("click",".delete_product",function(event){
    
            event.preventDefault();
    
            var delete_prod = $(this).attr("product_id");
            // alert(delete_prod)
            var action = "delete_product";
    
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonText: 'Yes, delete it!'
                
            }).then((result) => {
                if (result.value) {
                    
                    $.ajax({
                        type: "POST",
                        url:  "../controller/admin_controller.php",
                        data: { student: delete_prod,
                                action:action 
                            },
                        cache: false,
                        success: function (status, result) {
                        console.log(status, result);
                        // $("#studentdata").html("");  
                        productlist();
                        },
                    });
            }else if (result.dismiss === Swal.DismissReason.cancel) {
                event.preventDefault();
            }
        })
    })
    //------------------------------------------------------------------------------------------
    $(document).on("click","#delete_all",function(e){
        e.preventDefault();

    //    if($("#CheckAll").hasClass("select") == true){
        if(arr_1 == ''){
            alert("please Select at least One record");
        }else{

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                confirmButtonText: 'Yes, delete it!'
                
            }).then((result) => {
                if (result.value) {
        
                  var action = "delete_all";
                  var type = "products";
                    $.ajax({
                        type: "POST",
                        url:  "../controller/admin_controller.php",
                        data: { id:arr_1,
                                action:action,
                                type:type
                            },
                        cache: false,
                        success: function (data) {
                        // $("#studentdata").html("");
                        var response = JSON.parse(data)

                        if(response == 'success'){

                            Swal.fire("Deleted!", "Data has been deleted.", "success");
                            productlist();
                        }
        
                        },
                    });
        
                // }           
               }
            });
        }
          
   

    });
    
         
    })