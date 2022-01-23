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
                    <div class="card-body px-3 pb-0">
                        <div class="px-3">
                            <h2>main page video URL:</h2>
                            <label>{{$video->video_url}}</label>
                            <a class="badge bg-success nodec" href={{"edit_video/".$video->id}}>Edit</a>
                        </div>
                        <hr>
                        <div class="px-3 mt-3">
                            <h2>Social media links:</h2>
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($links as $link)


                                    <tr>
                                        <td>{{$link->id }}</td>
                                        <td>{{$link->social_name }}</td>
                                        <td>{{$link->social_url }}</td>
                                        <td>
                                            <a class="badge bg-success nodec" href={{"edit_link/".$link->id}}>Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach

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