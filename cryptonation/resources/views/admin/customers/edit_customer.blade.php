@extends('admin.base')
@section('admincontent')




<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Customers</h3>
        <p class="text-subtitle text-muted">Edit your customer</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="/update_customer" method="POST">
                                @csrf

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">First Name</label>
                                        <input type="hidden" id="id" name="id" value={{$customer->cust_id }}>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                            placeholder="Enter name" value={{ $customer->firstname }}>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                            placeholder="Enter name" value={{ $customer->lastname }}>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter name" value={{ $customer->email }}>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Phone</label>
                                        <input type="phone" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone number" value={{ $customer->phone }}>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" href="#" class="btn btn-success round mt-4">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</div>
<!-- dashboard end -->

@endsection