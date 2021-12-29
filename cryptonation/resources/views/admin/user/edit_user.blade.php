@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Admin</h3>
        <p class="text-subtitle text-muted">edit account data</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_admin" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}">

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Name</label>
                                        <input class="form-control" id="name" name="name" value="{{$name}}"
                                             />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                        <input class="form-control" disabled id="email" name="email" value="{{$email}}"
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