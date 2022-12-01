@extends('layouts.admin')

@section('content')
<div class="car">
  <div class="car-header">

    <h4>Register User </h4>
  </div>
    <div class="car-body">
      <table class="table table-striped" >
       
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($user as $item)
          {{-- user->dashboardController --}}
          <tr>
            <td >{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td> 
            <td>{{$item->phone}}</td>      
           <td>
              <a href="{{ url('view-user/'.$item->id, []) }}" class="btn btn-primary">View</a>
            </td>
          </tr>    
          @endforeach
        </tbody>

      </table>
    </div>
</div>

@endsection