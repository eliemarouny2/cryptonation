@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Vlog</h3>
        <p class="text-subtitle text-muted">edit your vlog</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_vlog" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" id="id" name="id" value="{{$vlog->vlog_id}}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Vlog Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="title here" value="{{$vlog->vlog_title}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" value=""
                                            rows=" 5">{{$vlog->vlog_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <li class="d-inline-block me-2 mb-1">
                                <div class='form-check'>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="form-check-input form-check-secondary" <?php
                                            if($vlog->vlog_status==1) echo 'checked'; ?>
                                        name="status" id="status">
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                            </li>

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