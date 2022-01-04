@extends('admin.base')
@section('admincontent')

    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Admin</h3>
        <p class="text-subtitle text-muted">change password</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_adminpassword" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" id="id" name="id" value="1">

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Enter your old password</label>
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" required
                                         />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Enter new password</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword" required
                                            />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Reenter new password</label>
                                        <input type="password" class="form-control" id="newpassword2" name="newpassword2" required
                                            />
                                    </div>
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
    </section>
</div>
</div>
<!-- dashboard end -->

@endsection