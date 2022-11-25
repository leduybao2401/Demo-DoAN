@extends('layouts.frontend')

@section('title')
  Product index
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">Collection/{{$product->category->name}}/{{$product->name}}</h4>
    </div>
</div>
<div class="container">


<div class="card shadow product_data" style="border:2px solid black; width: 100%  ">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="">
            </div>

            <div class="col-md-8">
                <h2 class="mb-0">{{$product->name}}
                    <label style="font-size: 16px; color:black; " class="float-end badge bg-danger trending_tag">{{$product->trending== '1'? 'Treng':''}}</label>
                </h2>
                <hr>
                <label class="me-3">Original price: <s>RS {{$product->original_price}}</s></label>
                <label class="fw-bold">Selling Price: RS {{$product->selling_price}}  </label>
                <hr>
             
               
                @if($product->qty >0)
                <label class="badge bg-danger ">In stock</label>
                @else
                <label class="badge bg-success">Out of Stock</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group">
                            <button class="input-group-text btn btn-danger " onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -     </button>
                            <input type="number" value="1" class="form-control qty-input text-center " min="1" max="100">
                            <button class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +    </button>
                        </div>
                    </div>
                    <div class="col-md-9">
                      
                        <br>
                        <button type="button" class="btn btn-success me-3 addToCartBtn float-start"> ADD to WISH 
                            <i class="fa fa-heart"></i>
                        </button>
                        <button type="button" class="btn btn-info me-3 float-start"> ADD
                            <i class="fa-solid fa-cart-shopping"></i>
                            </button>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
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
                                }
                               });            
          

            });
        });
        
    </script>

@endsection