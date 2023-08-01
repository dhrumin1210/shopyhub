
$(document).ready(function(){



    $(".edit_product").click(function(e){
         e.preventDefault();

        var edit_product =  $(this).attr("product_id");;
        var action = "edit_product";

        alert(edit_product);

        $.ajax({
            type:"POST",
            url: "../controller/admin_controller.php",
            data:{ edit_product:edit_product,
                   action:action },
            success:function(data){
                console.log(data);
            }
        })

    })

})