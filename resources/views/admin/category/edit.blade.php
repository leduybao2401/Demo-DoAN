@extends('layouts.admin')

@section('content')
<?php
use App\Http\Controllers\Admin\CategoryController;
 ?>
<div class="car">

    <div class="car-header">
        <h1>EDIT/UPDATE CATEGORY</h1>
    </div>
    <div class="car-body">
        <form action="{{ url('update-category/'.$category->id, []) }}" method="POST" enctype="multipart/form-data">
            {{-- tror tới web --}}
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3" >
                    <label for="">Name</label>
                    <input class="form-control" value="{{$category->name}}"  type="text" name="name" style="border-bottom: 1px solid #34495e;">

                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input class="form-control form-control-lg" value="{{$category->slug}}"   type="text" name="slug"  
                              style="border-bottom: 1px solid #34495e;">
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" {{ $category->description }} name="description" 
                             style="height: 50px; border: 1px solid #34495e;"></textarea>

                      </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$category->status =="1" ? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular" {{$category->popular  =="1" ? 'checked':''}}>
                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_title</label>
                    <input type="text" class="form-control" value="{{$category->meta_title}}" name="meta_title"  style="height: 50px; border: 1px solid #34495e;">

                </div>

                <div class="col-md-12 mb-3" >
                    <label for="">Meta Kayword	</label>
                    <input type="text" class="form-control" value="{{$category->meta_kaywords}}" name="meta_kaywords" 
                     style="height: 50px; border: 1px solid #34495e;">

                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_descrip</label>
                    <textarea class="form-control" {{ $category->meta_descrip }} name="meta_descrip" id="floatingTextarea2"
                         style="height: 50px; border:1px solid #34495e;"></textarea>
                </div>
                @if($category->image)
                {
                    <img src="{{asset('assets/uploads/category/'.$category->image)}} " alt="Category Image" style="width:100px;">
                }
                    
                @endif

                <div class="mb-3">
                    <label for="formFile" class="form-label"></label>
                    <input class="form-control" type="file" id="formFile" name="image" >
                  </div>

                <div class="col-md-12">
                   <button type="submit" class="btn btn-primary">submit</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
