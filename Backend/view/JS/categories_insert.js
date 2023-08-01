$(document).ready(function(){

// alert(4324324)
    
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

                        Swal.fire({
                            title: "Inserted Successfully",
                            text: "You clicked the button!",
                            type: "success",
                          
                        })
                        setTimeout(function(){

                        window.location.href="http://10.0.101.163/Dhrumin/E-commerce/Backend/view/categories_grid.php";
                        // console.log("successfully inserted");
                    
                        },3000);
                    }

                    if(response == "success update"){

                        Swal.fire({
                            title: "Updated Successfully",
                            text: "You clicked the button!",
                            type: "success",
                          
                        })
                        setTimeout(function(){

                        window.location.href="http://10.0.101.163/Dhrumin/E-commerce/Backend/view/categories_grid.php";
                        // console.log("successfully inserted");
                    
                        },3000);
                    }
                    
                }
    
    
                })

        })


})