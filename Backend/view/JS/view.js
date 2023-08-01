$(document).ready(function(){

   

    $(document).on("submit","#submit_btn",function(e){

        e.preventDefault();

       var email =  $("#email_id").val();
       var password = $("#password").val();
       var action = "login";
       console.log(email);

       $.ajax({

        type:"POST",
        url:"../controller/admin_controller.php",
        data: { email:email,
                password:password,  
                action:action
                },
        success: function (data) {

                if(data == "success"){

                    $(".login").attr("id","sa-success");


                    Swal.fire({
                        title: "Login Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                    setTimeout(function(){

                    window.location.href = "http://localhost/clg_project/E-commerce/Backend/view/admin_panel.php"; },2000);

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

    // $(document).on("click","#logout",function(e){
    //     e.preventDefault();

    //     alert(232);
    //     var action = "logout";

    //     $.ajax({

    //         type:"POST",
    //         url:"../controller/admin_controller.php",
    //         data:{action:action},
    //         success:function(data){
    //             console.log(data);
    //         }

    //     })
    // })
})