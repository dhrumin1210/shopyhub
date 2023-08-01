$(document).ready(function(){

    var action = 'products_records';
    $('#products-datatable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../controller/admin_controller.php',
            'data':{action:action}
        },
        'columns': [
           { data: 'id' },
           { data: 'product_image' ,
           "render": function ( data) {
            return `<img src="../assets/images/products/product_image width="40px">`;}
          },
           { data: 'product_name' },
           { data: 'price' },
           { data: 'status' },
        ]
     });
})