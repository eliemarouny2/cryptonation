@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Mission</h3>
        <p class="text-subtitle text-muted">manage your mission</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card padd">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <h1>Our Mission</h1>
                            <p class="pd-2">{{$mission[0]['mission']}}</p>
                            <a href="/edit_mission" class="btn btn-success round">Edit</a>

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