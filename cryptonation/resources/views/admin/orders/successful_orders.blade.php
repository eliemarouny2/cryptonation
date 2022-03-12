@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Orders</h3>
        <p class="text-subtitle text-muted">manage your orders</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table table-bordered table-striped table-hover' id="table1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th class>Name</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Payment method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->order_id }}</td>
                                        <td>{{$order->firstname }} {{$order->lastname}}</td>
                                        <td>{{$order->date }}</td>
                                        <td>{{$order->total_amount }}$</td>
                                        <td>{{$order->paymethod}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>
                                            <a class="badge bg-success nodec" href={{"view_order/".$order->order_id}}>view</a>
                                            <a class="badge bg-danger nodec" href={{"delete_successful_order/".$order->order_id}}>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination mt-4 ms-4">
                            {{ $orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<!-- dashboard end -->

@endsection