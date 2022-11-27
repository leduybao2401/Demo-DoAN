@extends('layouts.frontend')

@section('title')
  Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('plance-order', []) }}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Detail</h6>
                        <hr>
                        <div class="row checkout form">
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter first Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->email}}" name="email" placeholder="Enter email">
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->phone}}" name="phone" placeholder="Enter phone">
                            </div>
                            <div class="col-md-6">
                                <label for="address1">Address1</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Address2</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->city}}" name="city" placeholder="Enter city">
                            </div>
                            <div class="col-md-6">
                                <label for="pincode">Pin code</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter pin code">
                            </div>
                            <div class="col-md-6">
                                <label for="State">State</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">               
                <div class="card">
                    <div class="card-body">
                        <h6>Oder Detail</h6>
                        <hr>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                        <th>Selling</th>
                                    </tr>
                                    @foreach ($cartItem as $item)                            
                                    <tr>
                                        <td> {{  $item->product->name}}</td>
                                        <td>{{  $item->prod_qty}}</td>
                                        <td> {{  $item->product->selling_price}}</td>
                                    </tr>                              
                                    @endforeach
                                </tbody>
                            </table>     
                            <hr>
                            <button type="submit" class="btn btn-primary float-end" style="width: 100%;">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection