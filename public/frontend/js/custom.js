$('.delete-cart-item').click(function(e) {
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    //  alert(product_id)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: "delete-cart-item",
        data: {
            'prod_id': prod_id,
        },
        success: function(response) {
            window.location.reload();
            alert(response.status);
        }
    });
});
$('.changeQuantity').click(function(e) {
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    var qty = $(this).closest('.product_data').find('.qty-input').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "update-cart",
        data: {
            'prod_id': prod_id,
            'pro_qty': qty,
        },
        success: function(response) {
            window.location.reload();
            alert(response.status);
        }
    });
});

$(document).ready(function(){
    loadcart();
    wishlistcount();
     //  alert(product_id)
     $.ajaxSetup({
        headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      function loadcart(){
        $.ajax({
            method: "GET",
            url: "/loadcart",
          
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
               // console.log(response.count);
            }
       });      
      }

      function wishlistcount(){
        $.ajax({
            method: "GET",
            url: "/loadwishlist",
          
            success: function (response) {
                $('.wishlist-cart-count').html('');
                $('.wishlist-cart-count').html(response.count);
               // console.log(response.count);
            }
       });      
      }


    $('.addToCartBtn').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val(); 

                        //  alert(product_id)
                        $.ajaxSetup({
                     headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                        $.ajax({
                            method: "POST",
                            url: "/add-to-cart",
                            data: {
                                'product_id': product_id,
                                'product_qty': product_qty,
                            },
                            success: function (response) {
                                alert(response.status);
                                loadcart();
                            }
                       });            
  

    });

    $('.addtoWish').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
                        //  alert(product_id)
                        $.ajaxSetup({
                     headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                        $.ajax({
                            method: "POST",
                            url: "/add-to-wishlist",
                            data: {
                                'product_id': product_id,
                               
                            },
                            success: function (response) {
                                alert(response.status);
                            }
                       });            
  

    });
    $('.remove').click(function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        //  alert(product_id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                window.location.reload();
                alert(response.status);
            }
        });
    });
});
