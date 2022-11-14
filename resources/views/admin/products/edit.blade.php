@extends('layouts.admin')

@section('content')
<div class="car">

    <div class="car-header">
        <h1>PRODUCT ADD</h1>
    </div>
    <div class="car-body">
        <form action="{{ url('update-product/'.$products->id, []) }}" method="POST" enctype="multipart/form-data"> 
            {{-- tror tới web --}}
            @csrf
           @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" >
                        <option value="">{{$products->category->name}}</option>
                        {{-- //$products->category->name productController --}}
                      </select>
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">Name</label>
                    <input class="form-control" type="text" value="{{$products->name}}" name="name" >
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input class="form-control form-control-lg" type="text" value="{{$products->slug}}"  name="slug"  >
                </div>

                
                <div class="col-md-12">
                    <label for="">Small_Description</label>
                    <div class="form-floating">
                        <textarea 
                        class="form-control" name="small_description" >{{$products->small_description}}</textarea>
                      </div>
                </div>

                <div class="col-md-12">
                    <label for="">Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" >{{$products->description}}</textarea>
                      </div>
                </div>


                <div class="col-md-6 mb-3" >
                    <label for="">Original_price</label>
                    <input class="form-control" type="number" value="{{$products->original_price}}" name="original_price" >
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling_price</label>
                    <input class="form-control form-control-lg" type="number" value="{{$products->selling_price}}" name="selling_price"  >
                </div>

                <div class="col-md-6 mb-3" >
                    <label for="">Tax</label>
                    <input class="form-control" type="number" value="{{$products->tax}}"  name="tax" >
                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quatyti</label>
                    <input class="form-control form-control-lg" type="number" value="{{$products->qty}}" name="qty"  >
                </div>

                
                
                <div class="col-md-6 mb-3" >
                    <label for="">Status</label>
                    <input type="checkbox" {{$products->status=='1' ?  'checked' : ''}} name="status">
                </div>
                <div class="col-md-6 mb-3" >
                    <label for="">trending</label>
                    <input type="checkbox" {{$products->trending=='1' ?  'checked' : ''}} name="trengding">
                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_title</label>
                    <textarea class="form-control" name="mate_title">{{$products->mate_title}}</textarea>
                </div>
                
                <div class="col-md-12 mb-3" >
                    <label for="">Meta Kayword	</label>
                    <textarea class="form-control" name="meta_keywords" >{{$products->meta_keywords}}</textarea>

                </div>
                <div class="col-md-12 mb-3" >
                    <label for="">Meta_descrip</label>
                    <textarea class="form-control" name="mate_description" id="floatingTextarea2" >{{$products->mate_description}}</textarea>
                </div>
                @if ($products->image)
                <img src="{{asset('assets/uploads/products/'.$products->image)}} " alt="Product Image" style="width:100px;">
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