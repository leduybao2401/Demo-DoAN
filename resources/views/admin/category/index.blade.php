@extends('layouts.admin')

@section('content')
<div class="car">
  <div class="car-header">

    <h4>CATEGORY PAGE</h4>
  </div>
    <div class="car-body">
      <table class="table table-striped" >
       
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($category as $item)
          <tr>
            <td >{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>    
            <td>hhh</td> 
            {{-- <td><img src="{{ asset('assets/uploads/category/'.$item->image) }}" alt=""></td> --}}
            <td>
              <button  class="btn btn-primary">Edit</button>
              <button  class="btn btn-danger">Update</button>
            </td>
          </tr>    
          @endforeach
        </tbody>

      </table>
    </div>
</div>

@endsection