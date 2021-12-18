@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Vlogs</h3>
        <p class="text-subtitle text-muted">manage your vlogs</p>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($vlogs as $vlog)
                                    <tr>
                                        <td>{{$vlog->vlog_id }}</td>
                                        <td>{{$vlog->vlog_title }}</td>
                                        <td>{{$vlog->vlog_description }}</td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_vlog/".$vlog->vlog_id}}>Edit</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_vlog/".$vlog->vlog_id}}>Delete</a>
                                        </td>
                                        @endforeach
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