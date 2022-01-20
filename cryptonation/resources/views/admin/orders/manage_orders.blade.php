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
                                        <th>ID</th>
                                        <th class>Name</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th class="w-30">Status</th>
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

                                        <td>
                                            <div class="col-md-6 mb-2">
                                                <form action="/update_status" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$order->order_id}}" id="id" name="id">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="status" name="status">
                                                            <option value="pending">pending</option>
                                                            <option value="processing">processing</option>
                                                            <option value="shipped">shipped</option>
                                                            <option value="completed">completed</option>
                                                            <option value="cancelled">cancelled</option>
                                                        </select>
                                                    </fieldset>
                                                    <button type="submit" class="btn btn-secondary">Update</button>
                                                </form>
                                            </div>
                                        </td>
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