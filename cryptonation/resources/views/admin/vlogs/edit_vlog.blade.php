@extends('admin.base') @section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Vlogs</h3>
        <p class="text-subtitle text-muted">edit vlog</p>
    </div>
    <section class="section">
        <div class="row mb-2"></div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form
                                action="/update_vlog"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    id="id"
                                    name="id"
                                    value="{{$vlog->vlog_id}}"
                                />

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput"
                                            >vlog Title</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="title"
                                            name="title"
                                            value="{{$vlog->vlog_title}}"
                                            placeholder="Enter title"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Vlog URL</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="url"
                                            name="url"
                                            value="{{$vlog->vlog_video_url}}"
                                            placeholder="Enter URL"
                                        />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label
                                                for="description"
                                                class="form-label"
                                                >Description</label
                                            >
                                            <textarea
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                rows="5"
                                                >{{$vlog->vlog_description}}
                                                </textarea
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="status">Status</label>
                                    <fieldset class="form-group">
                                        <select
                                            class="form-select"
                                            id="status"
                                            name="status"
                                        >
                                            <option value="0">inactive</option>
                                            <option value="1" <?php if($vlog->vlog_status==1){ echo 'selected';  } ?> >active</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="image" class="form-label"
                                            >Image</label
                                        >
                                        <div class="form-group mb-3">
                                            <input
                                                type="file"
                                                class="image"
                                                id="image"
                                                name="image"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img
                                            src="/images/vlogs/{{$vlog->vlog_image_url}}"
                                            height="200"
                                            alt="vlog image"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-4">
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

<!-- dashboard end -->

@endsection
