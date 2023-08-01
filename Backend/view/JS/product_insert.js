$(document).ready(function(){



  

    var action = "categories"
    $.ajax({

        type:"POST",
        url:"../controller/admin_controller.php",
        data:{action:action},
        success: function(data){
            // console.log(data);  
            var response = JSON.parse(data);

            for (var i = 0; i < response.length; i++) {
                var id = response[i].id;
                var categorie_name = response[i].categorie_name;

                $("#product-category").append( `<option class='product-option' value=${id} > ${categorie_name} </option>`)

            }

        }
    })


        $(document).on("submit","#product_form",function(e){
            
            e.preventDefault();

            var data = new FormData(document.getElementById("product_form"))
            console.log(data);
            $.ajax({ 
            type:"POST",
            url:"../controller/admin_controller.php",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){

                var response = JSON.parse(data);

                console.log(response);

                if(response == "success update"){


                    Swal.fire({
                        title: "Updated Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                    setTimeout(function(){

                    // alert("Data is updated");
                    window.location.href = "http://localhost/shopyhub/Backend/view/admin_grid.php";
                    },3000);
                }

                if(response.status == "success" && response.image == 'Image uploaded successfully!'){

                    Swal.fire({
                        title: "Inserted Successfully",
                        text: "You clicked the button!",
                        type: "success",
                      
                    })
                        setTimeout(function(){

                        // alert("Data is updated");
                        window.location.href = "http://localhost/shopyhub/Backend/view/admin_grid.php";
                        },3000);
                }

            }


            })
        })

       


})