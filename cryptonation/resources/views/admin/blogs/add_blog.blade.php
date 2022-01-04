@extends('admin.base') @section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Blogs</h3>
        <p class="text-subtitle text-muted">Add a new blog</p>
    </div>
    <section class="section">
        <div class="row mb-2"></div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form
                                action="insert_blog"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Blog Title</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="title"
                                            name="title"
                                            placeholder="Enter title"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">Blog URL</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="url"
                                            name="url"
                                            placeholder="Enter url"
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
                                                placeholder="enter description"
                                                rows="5"
                                            ></textarea>
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
                                            <option value="1">active</option>
                                            <option value="0">inactive</option>
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
                                </div>

                                <div class="col-md-4">
                                    <button
                                        type="submit"
                                        href="#"
                                        class="btn btn-success round mt-4"
                                    >
                                        Add
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
