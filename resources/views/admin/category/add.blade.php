@extends('layouts.admin')

@section('content')
<div class="car">

    <div class="car-header">
        <h1>CATEGORY ADD</h1>
    </div>
    <div class="car-body">
        <form action="{{ url('insert-category', []) }}" method="POST" enctype="multipart/form-data"> 
            {{-- tror tới web --}}
            @csrf
           
            <div class="row">
                <div class="col-md-6 mb-3" >
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" style="border-bottom: 1px solid #34495e;">
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input class="form-control form-control-lg" type="text" name="slug"  style="border-bottom: 1px solid #34495e;">
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" style="height: 50px; border: 1px solid #34495e;"></textarea>

                      </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_title</label>
                    <textarea class="form-control" name="meta_title"  style="height: 100px; border: 1px solid #34495e;"></textarea>

                </div>
                
                <div class="col-md-12 mb-3" >
                    <label for="">Meta Kayword	</label>
                    <textarea class="form-control" name="meta_kaywords" style="height: 100px; border: 1px solid #34495e;"></textarea>

                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_descrip</label>
                    <textarea class="form-control" name="meta_descrip" id="floatingTextarea2" style="height: 100px; border:1px solid #34495e;"></textarea>
                </div>

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