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
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->order_id }}</td>
                                        <td>{{$order->firstname }} {{$order->lastname}}</td>
                                        <td>{{$order->date }}</td>
                                        <td>USD {{$order->total_amount }}</td>
                                        <td>{{$order->details }}</td>

                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"view_order/".$order->order_id}}>view</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_order/".$order->order_id}}>Delete</a>
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
    </section>
</div>
</div>
</div>
<!-- dashboard end -->

@endsection