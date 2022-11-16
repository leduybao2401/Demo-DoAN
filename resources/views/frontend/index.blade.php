@extends('layouts.frontend')

 @section('title')
    
 @endsection

 @section('content')
    @include('layouts.inc.slide');

 <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Feature Product</h2>
            <div class="owl-carousel featured-carousel owl-theme">
              
                @foreach ($featured_products as $prod)
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
   </div>
   <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trengding Category</h2>
            <div class="owl-carousel featured-carousel owl-theme">
              
                @foreach ($trending_category as $category)
                 <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Product card" style="height:200px ;">
                        <div class="card-body">
                            <h5>{{$category->name}}</h5>
                            <span class="float-start">{{$category->selling_price}}</span>
                            <span class="float-end"><s>{{$category->original_price}}</s></span>
                        </div>
                    </div>
                 </div>
                @endforeach
            </div>
           
        </div>
    </div>
   </div>

 @endsection

 @section('scripts')
{{-- layooutr.frontend --}}
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
    // part 16 minute 12
})
</script>
    
@endsection
