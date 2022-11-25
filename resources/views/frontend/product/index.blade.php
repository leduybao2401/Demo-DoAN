@extends('layouts.frontend')

@section('title')
  Product index
@endsection

@section('content')

<div class="py-5">
  <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">Collection {{$category->name}}</h4>
    </div>
</div>
<div class="container">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
              
                @foreach ( $product  as $prod)
               {{-- // $product->view-category --}}
                 <div class="col-md-3 mt-3">
                    <div class="card">
                        <a href="{{ url('view_category/'.$category->slug.'/'.$prod->slug, []) }}">
                          <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product card" style="height:200px ;">
                           <div class="card-body">
                              <h5>{{$prod->name}}</h5>
                               <span class="float-start">{{$prod->selling_price}}</span>
                              <span class="float-end"><s>{{$prod->original_price}}</s></span>
                          </div>
                        </a>
                    </div>
                 </div>
                @endforeach
           
        </div>
    </div>
</div>
@endsection