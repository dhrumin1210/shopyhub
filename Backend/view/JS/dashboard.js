$(document).ready(function(){

    var action ="dashboard";

    $.ajax({

        type:'POST',
        url:"../controller/admin_controller.php",
        data:{action:action},
        success:function(data){

            var response = JSON.parse(data);
            console.log(response);
            $("#products").html(response[0].product);
            $("#customers").html(response[0].customer);
            $("#categories").html(response[0].categories);
        }
    })
})