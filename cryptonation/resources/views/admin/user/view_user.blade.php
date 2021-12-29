@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <!-- <a href="/adminregister" class="btn btn-success round addbtn">Add new admin</a> -->
    <div class="page-title">
        <h3>Admin</h3>
        <p class="text-subtitle text-muted">manage your account</p>
    </div>

    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card padd">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive  p-2">
                            <h5><strong>ID:</strong> {{$data->id}}</h5>
                            <h5><strong>Name:</strong> {{$data->name}}</h5>
                            <h5><strong>Email:</strong> {{$data->email}}</h5>
                            <a href="/edit_admin" class="btn btn-success round">Edit</a>
                            <a href="/edit_password" class="btn btn-danger round pad-small">Change Password</a>
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