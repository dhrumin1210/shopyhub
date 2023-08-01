$(document).ready(function(){

    $(".dropdown").remove();


    $(document).on("submit","#cust_login",function(e){

        e.preventDefault();

       var email =  $("#email_id").val();
       var password = $("#password").val();
       var action = "login";
       console.log(email);
    //    alert(email);

       $.ajax({

        type:"POST",
        url:"../controller/customer_controller.php",
        data: { email:email,
                password:password,  
                action:action
                },
        success: function (data) {

            console.log(data);
            var response = JSON.parse(data);

                if(response == "success"){

                    // $(".login").attr("id","sa-success");


                    Swal.fire({
                        title: "Login Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                    ,setTimeout(function(){

                    window.location.href = "http://localhost/shopyhub/Frontend/view/index.php"; 
                    },2000);
                 
                }else{

                    // alert("Invalid Email or Password");
                    Swal.fire({
                        type: "error",
                        title: "Invalid Email or Password",
                        text: "Something went wrong!",
                        })
                }

             }

         })

    })
})