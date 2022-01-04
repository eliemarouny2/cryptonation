@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Settings</h3>
        <p class="text-subtitle text-muted">edit your main page video url</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="px-3">
                            <form action="/update_video_url" method="POST">
                                @csrf
                            <h2>main page video URL:</h2>
                           <input
                                            type="text"
                                            class="form-control"
                                            id="video_url"
                                            name="video_url"
                                            value="{{$video->video_url}}"
                                            placeholder="Enter url"
                                        />
                           <div class="col-md-4 mb-4">
                                    <button
                                        type="submit"
                                        href="#"
                                        class="btn btn-success round mt-4"
                                    >
                                        Save
                                    </button>
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