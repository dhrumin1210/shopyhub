$(document).ready(function(){

    customer_list();


    function printTable(response){

        var table = "";

        table += `<table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
        <thead>
            <tr>
                <th><input type="checkbox" name="select_all" value="1" id="CheckAll"></th>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>email</th>
                <th>Mobile Number</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th style="width: 75px;">Action</th>
            </tr>
        </thead>
        <tbody class="register_class">`

        console.log("response",response)
        for (var i = 0; i < response.length; i++) {

             var id = response[i].id;
             var first_name = response[i].first_name;
             var last_name = response[i].last_name;
             var email = response[i].email;
             var mobile_num = response[i].mobile_number;
             var created_date = response[i].created_date;
             var updated_date = response[i].updated_date;
                            
            
            table+= "<tr>";
            table+= `<td>
                     <input type="checkbox" name="select_all" id="${id}" class="checkBoxClass">
                    </td>
                    <td class="table-user">

                    <a href="javascript:void(0);" class="text-body font-weight-semibold">${id}</a>
                </td>
                <td>
                ${first_name}
                </td>
                <td>
                    ${last_name}
                </td>
                <td>
                    ${email}
                </td>
                <td>
                    ${mobile_num}
                </td>
                <td>
                ${created_date}
                </td>
                <td>
                ${updated_date}
                </td>
                <td>
                    <a href="customer_insert.php?id=${id}" customer_id ='${id}'  class="action-icon edit_customer" > <i class="mdi mdi-square-edit-outline"></i></a>
                    <a href="javascript:void(0);" customer_id ='${id}' class="action-icon delete_customer" > <i class="mdi mdi-delete"></i></a>
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
            //     return "display" === o && (e = '<div class="custom-control custom-checkbox"><input type="checkbox" id="test" class="custom-control-input dt-checkboxes"><label class="custom-control-label">&nbsp;</label></div>'), e
            // },
            // checkboxes: {
            //     selectRow: !0,
            //     selectAllRender: '<div class="custom-control custom-checkbox"><input type="checkbox" id="test" class="custom-control-input dt-checkboxes"><label class="custom-control-label">&nbsp;</label></div>'
            // }

        }, {
            orderable: true
        }, {
            orderable: true
        }, {
            orderable: true
        }, {
            orderable: true
        }, {
            orderable: true
        }, 
         {
            orderable: false
        }, 
         {
            orderable: false
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
            // $("input:checkbox:first").addClass("test")
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
              console.log(arr)
                arr_1 = arr;
              });
        }
    })
 }
//----------------Customer records listing--------------------------
var arr_1 = []; 
    function customer_list(){

        var action = "customer_list";
            $.ajax({

                type:"POST",
                url:"../controller/admin_controller.php",
                data:{action:action},
                success:function(data){

                    var response = JSON.parse(data)
                    // console.log(response);
                    printTable(response);
                   
                    }

            })
        }
//--------------------------------------------------------------------

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
              var type = 'customer';
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
                        customer_list();
                    }
    
                    },
                });
    
            // }           
           }
        });
    }
      


});


//----------------Delete Customer----------------------------------------

                $(document).on("click",".delete_customer",function(event){
                    event.preventDefault();

                var id =  $(this).attr("customer_id");
                var action = "customer_delete";

                // if (confirm("Are you sure you want to delete this?")) {

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
                        // window.location.href = url;
                        $.ajax({

                            type:"POST",
                            url:"../controller/admin_controller.php",
                            data:{
    
                                customer_id:id,
                                action:action
                            },
                            success:function(data){
    
                                var response = JSON.parse(data);
    
                                console.log(response);
    
                                if(response == "success"){
                                    Swal.fire("Deleted!", "Data has been deleted.", "success");
                                    customer_list();
                                }
                            }
                        })

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        event.preventDefault();
                    }
                })

         
             })

//--------------------------------------------------------------------------------------------




})