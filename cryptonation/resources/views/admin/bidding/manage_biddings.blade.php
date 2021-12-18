@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Biddings</h3>
        <p class="text-subtitle text-muted">manage your biddings</p>
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
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>lorem</td>
                                        <td>lorem</td>
                                        <td>lorem</td>
                                        <td>
                                            <a class="badge bg-success nodec" href="">Edit</a>
                                            <a class="badge bg-danger nodec" href="">Delete</a>
                                        </td>
                                    </tr>
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
<!-- dashboard end -->

@endsection