@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Customers</h3>
        <p class="text-subtitle text-muted">manage your customers</p>
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->cust_id }}</td>
                                        <td>{{$customer->firstname }} {{$customer->lastname }}</td>
                                        <td>{{$customer->email }}</td>
                                        <td>{{$customer->phone }}</td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_customer/".$customer->cust_id}}>Edit</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_customer/".$customer->cust_id}}>Delete</a>
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