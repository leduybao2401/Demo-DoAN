@extends('layouts.frontend')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/', []) }}">Home</a>/
                <a href="{{ url('wishlist', []) }}">Wishlist</a>
            </h6>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="card shadow-lg product_data">
            <div class="card-body">
                <div class="card-body">
                    @if ($wishlist->count() > 0)
                        @foreach ($wishlist as $item)
                            {{-- function viewcart --}}
                            <div class="row prod_data">
                                <div class="col-md-2">
                                    <img src="{{ asset('assets/uploads/products/'.$item->product->image) }}"
                                        alt="hear" height="70px" width="70px">
                                </div>
                                <div class="col-md-2 text-center">
                                    <h4>{{ $item->product->name }}</h4>
                                    <hr>
                                    {{-- function product->model cart --}}
                                </div>
                                <div class="col-md-2 text-center ">
                                    <h4>RS {{ $item->product->selling_price }}</h4>
                                        {{-- function product->model cart --}}
                                        <hr>
                                </div>
                                <div class="col-md-2 text-center ">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    @if ($item->product->qty >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                <div class="input-group">
                                    <button class="input-group-text btn  btn-danger "
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                                    <input type="number" value="1"
                                        class="form-control qty-input text-center " min="1" max="100">
                                    <button class="input-group-text btn  btn-success"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
                                </div>
                                    @else
                                        <h6>Out of stock</h6>
                                    @endif
                                </div>
                                <div class="col-md-2 px-3 ">
                    
                              <button class="btn btn-success addToCartBtn"><i class="fa-solid fa-cart-shopping"></i>ADD</button>
                                   
                                </div>
                                <div class="col-md-2 px-3 ">
                                    <button class="btn btn-danger remove "><i
                                        class="fa-solid fa-trash-can"></i>Remove</button>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                </div>
            </div>
        @else
            <h4>There are product in you wishlist</h4>
            @endif
        </div>
    </div>

    </div>
@endsection

@section('scripts')
   
@endsection
