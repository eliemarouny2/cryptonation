@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Categories</h3>
        <p class="text-subtitle text-muted">Add a new category</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="insert_category" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Category Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
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