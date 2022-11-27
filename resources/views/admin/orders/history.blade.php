@extends('layouts.admin')

@section('title')
    Order
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order History
                        <a href="{{ url('order', []) }}" class="btn btn-warning float-end">New Order </a>

                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking number</th>
                                <th>Total price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->status == '0' ? 'pending':'completed'}}</td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id, []) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection