@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Blogs</h3>
        <p class="text-subtitle text-muted">Add a new blog</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="insert_blog" method="POST">
                                @csrf

                                <input type="hidden" id="id" name="id" value={{$blog->blog_id}}>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Blog Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{$blog->blog_name}}" placeholder="Enter name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Blog URL</label>
                                        <input type="text" class="form-control" id="url" name="url"
                                            value="{{$blog->blog_video_url}}" placeholder="Enter name">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description"
                                                rows="5">"{{$blog->blog_description}}"</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" href="#" class="btn btn-success round mt-4">Add</button>
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