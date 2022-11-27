@extends('layouts.frontend')

@section('title')
    My Order
@endsection

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card " style="">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Order View
                        <a href="{{ url('order', []) }}" class="btn btn-outline-warning text-yl float-end "><i
                                class="fa-solid fa-backward"></i> Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-detail">
                            <h4>Shipping detail</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border ">{{ $order->fname }}</div>

                            <label for="">Last Name</label>
                            <div class="border ">{{ $order->lname }}</div>
                            <label for="">Email</label>
                            <div class="border ">{{ $order->email }}</div>
                            <label for="">Phone</label>
                            <div class="border ">{{ $order->phone }}</div>
                            <label for="">Shpping Address</label>
                            <div class="border ">
                                {{ $order->address1 }}, <br>
                                {{ $order->address2 }},<br>
                                {{ $order->city }},<br>
                                {{ $order->pincode }},<br>
                                {{ $order->state }},
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border ">{{ $order->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <h4>Order Detail</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitem as $item)
                                        {{-- orderitem.model.order.function --}}
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}"
                                                    width="50px" alt="hear">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="px-3">Grand Total:<span class="float-end"> {{ $order->total_price }} </span></h4>
                            <div class="mt-3">
                                <label for="">Order Status</label>
                                <form action="{{ url('update-order/'.$order->id, []) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status"">
                                        <option {{ $order->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                        <option {{ $order->status == '1' ? 'selected' : '' }} value="1">Complete</option>
                                    </select>
                                    <button class="btn btn-primary mt-3 float-end">Update</button>
                               </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
