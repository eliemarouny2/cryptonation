@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Settings</h3>
        <p class="text-subtitle text-muted">manage your website settings</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="px-3">
                            <h2>main page video URL:</h2>
                            <label>{{$video->video_url}}</label>
                            <a class="badge bg-success nodec" href={{"edit_video/".$video->id}}>Edit</a>
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