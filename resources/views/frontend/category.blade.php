@extends('layouts.frontend')

@section('title')
  Category
@endsection

@section('content')
   <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

               <h1>ALL CATEGORY</h1>
                @foreach ($category as $cate)
                <div class="col-md-3 mb-3" style="width: 175px">
                    <a href="{{ url('view_category/'.$cate->slug, []) }}">              
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category card" style="height:150px; width:100%">
                            <div class="card-body">
                                <h5>{{$cate->name}}</h5>
                            <p>
                                {{$cate->description}}
                            </p>
                            </div>
                        </div>
                  </a>
                </div>
                    
                @endforeach
            </div>
            </div>
        </div>
    </div>
   </div>
   
@endsection