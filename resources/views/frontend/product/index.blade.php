@extends('layouts.frontend')

@section('title')
  Product index
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
              
                @foreach ( $product  as $prod)
               {{-- // $product->view-category --}}
                 <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product card" style="height:200px ;">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start">{{$prod->selling_price}}</span>
                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                        </div>
                    </div>
                 </div>
                @endforeach
           
        </div>
    </div>
</div>
@endsection