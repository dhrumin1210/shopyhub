$(document).ready(function(){

    // alert(343);


    $(document).on("submit","#customer_insert",function(e){

        e.preventDefault();

        $.ajax({


            type:"POST",
            url:"../controller/admin_controller.php",
            data:$("#customer_insert").serialize(),
            success:function(data){
                
                var response = JSON.parse(data)
                // console.log(response);

                if(response == "success"){

                    // alert("Inserted Successfully");
                    Swal.fire({
                        title: "Inserted Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                    setTimeout(function(){

                    window.location.href = "http://localhost/shopyhub/Backend/view/customers_grid.php";
                    },2000);
                }
                if(response == "success update" ){

                    Swal.fire({
                        title: "Updated Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                    setTimeout(function(){

                    // alert("Updated Successfully");
                    window.location.href = "http://localhost/shopyhub/Backend/view/customers_grid.php";
                    },3000);
                }
            }
        })


    })

})