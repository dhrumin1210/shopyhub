$(document).ready(function(){


    categorieslist();
    
    //------------- table print function for Categories Listing----------------------------------------

        function printTable(response){
    
            var table = "";
    
            table += `<table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
            <thead>
                <tr>
                <th><input type="checkbox" name="select_all" value="1" id="CheckAll"></th>
                    <th>id</th>
                    <th>Categories Image</th>
                    <th>Categories Name</th>
                  
                    <th style="width: 75px;">Action</th>
                </tr>
            </thead>
            <tbody class="register_class">`
    
            // console.log("responseresponseresponse",response)
            for (var i = 0; i < response.length; i++) {
                 var id = response[i].id;
                 var image = response[i].image;
                 var categorie_name = response[i].categorie_name;
                var fullimage = "../assets/images/products/"+image;
                                
                
                table+= "<tr>";
                table += `<td><input type="checkbox" name="select_all" id="${id}" class="checkBoxClass""></td>
                    <td class="table-user">
                       
                        <a href="javascript:void(0);" class="text-body font-weight-semibold">${id}</a>
                    </td>
                    <td>
                    <img src="${fullimage}" alt="table-user" width="100" height="100" class="mr-2 rounded-circle">
                    </td>
                    <td>
                        ${categorie_name}
                    </td>
                    <td>
                        <a href="add_categories.php?id=${id}" categories_id ='${id}'  class="action-icon edit_product" > <i class="mdi mdi-square-edit-outline"></i></a>
                        <a href="javascript:void(0);" categories_id ='${id}'  data-bs-toggle="modal" data-bs-target="#" data-bs-whatever="@mdo" class="action-icon delete_categorie" > <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>`
          
    
            }
            table +=  `</tbody>`;
            table += `</table>`;
            $('.table-data').html(table);
            
            
            $("#products-datatable").DataTable({
            language: {
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
            },, {
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



        // ------------- Categories Listing---------------------
        var arr_1 = [];
                function categorieslist(){


                    var action = "categories_list";

                        $.ajax({
                    
                            type:"POST",
                            url:"../controller/admin_controller.php",
                            data:{action:action},
                            success:function(data){
                                console.log(data);
                                var response = JSON.parse(data);
                                printTable(response);
                                

                            }
                            
                     })
                }


        // -------------DELETE Categories---------------------

            $(document).on("click",".delete_categorie",function(event){

            // if (confirm("Are you sure you want to delete this?")) {




                var delete_categories = $(this).attr("categories_id");
                var action = "delete_categories";

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
                        
                            type:"POST",
                            url:"../controller/admin_controller.php",
                            data:{action:action,
                                id:delete_categories  },
                            success:function(data){
                                console.log(data);
                                var response = JSON.parse(data);

                                if(response == "success"){
                                    Swal.fire("Deleted!", "Data has been deleted.", "success")
                                    console.log("successfully deleted");
                                }else{
                                    console.log("failed");
                                }
                                categorieslist();
                            }
                            
                        })
                    }else if (result.dismiss === Swal.DismissReason.cancel) {
                        event.preventDefault();
                    }
            })
        })

        //--------------categoties_insert----------------------------


        $(document).on("submit","#categoties_insert",function(e){

            e.preventDefault();

        //    var data = $("#categoties_insert").serialize();
        //    console.log(data);
            

            $.ajax({ 
                type:"POST",
                url:"../controller/admin_controller.php",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
    
                
                    var response = JSON.parse(data);

                    if(response == "success"){

                        console.log("successfully inserted");
                        categorieslist();

                    }
                    
                }
    
    
                })

        })
    
//---------------------------------------------------------------------------------

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
                  var type = "categories";
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
                            categorieslist();
                        }
        
                        },
                    });
        
                // }           
               }
            });
        }
    });

})