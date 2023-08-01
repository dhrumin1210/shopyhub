$(document).ready(function(){


    $(".dropdown").remove();

    $(document).on("submit","#create_customer",function(event){

        event.preventDefault();

        $.ajax({


            type:"POST",
            url:"../controller/customer_controller.php",
            data:$("#create_customer").serialize(),
            success:function(data){
                
                var response = JSON.parse(data)
                console.log(response);

                if(response =="true"){

                    $("#email_err").html("*Email is already exist").css("color","red");
                }

                if(response == "success"){

                    // alert("Inserted Successfully");
                    Swal.fire({
                        title: "Inserted Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })  
                    
                }
             
            }
        })


    })

})