@extends('layouts.frontend')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6>
                <a href="{{ url('/', []) }}">Home</a>/
                <a href="{{ url('cart', []) }}">Cart</a>
            </h6>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="card shadow-lg product_data">
            @if($cartItiem->count() > 0)        
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartItiem as $item)
                    {{-- function viewcart --}}
                    <div class="row prod_data">
                        <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}" alt="hear"
                                    height="70px" width="70px">
                            </div>
                            <div class="col-md-3 text-center">
                                <h1>{{ $item->product->name }}</h1>
                                {{-- function product->model cart --}}
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <h6>RS {{ $item->product->selling_price }}</h1>
                                    {{-- function product->model cart --}}
                            </div>
                            <div class="col-md-2 text-center ">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->product->qty >= $item->prod_qty)              
                                <label for="Quantity">Quantity</label>
                                <div class="input-group">
                                    <button class="input-group-text btn changeQuantity btn-danger "
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                                    <input type="number" value="{{ $item->prod_qty }}"
                                        class="form-control qty-input text-center " min="1" max="100">
                                    <button class="input-group-text btn changeQuantity btn-success"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
                                </div>
                                @php $total +=$item->product->selling_price * $item->prod_qty ; @endphp
                                @else 
                                
                                <h6>Out of stock</h6>
                                @endif
                            </div>
                            <div class="col-md-3 px-3 mt-4">
                                <button class="btn btn-danger delete-cart-item"><i
                                        class="fa-solid fa-trash-can"></i>Remove</button>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-footer">

                        <h6>Total price: RS {{ $total }}</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('checkout', []) }}" class="btn btn-outline-success float-end">
                        Product to check
                    </a>
                </div>
            </div>
            @else
            <div class="cart-body text-center">
                <h2>You <i class="fa-solid fa-cart-shopping"></i> Cart is empty</h2>
                <a href="{{ url('category', []) }}" class="btn btn-outline-success float-end">Continue Shopping</a>
            </div>
            
            @endif
        </div>
    </div>
@endsection


@section('scripts')
    <script>
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
    </script>
@endsection
