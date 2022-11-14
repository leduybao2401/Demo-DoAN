@extends('layouts.admin')

@section('content')
<div class="car">
  <div class="car-header">

    <h4>PRODUCT PAGE</h4>
  </div>
    <div class="car-body">
      <table class="table table-striped" >
       
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">Selling</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($product as $item)
          <tr>
            <td >{{$item->id}}</td>
            <td >{{$item->category->name}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->selling_price}}</td>     
            <td><img style="width:25px " src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="" style="width: 100px;"></td>
            <td>
              <a href="{{ url('edit-prod/'.$item->id, []) }}" class="btn btn-primary">Edit</a>
              <a href="{{ url('delete-prod/'.$item->id, []) }}"   class="btn btn-danger">Delete</a>
            </td>
          </tr>    
          @endforeach
        </tbody>

      </table>
    </div>
</div>

@endsection