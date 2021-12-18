@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Images</h3>
        <p class="text-subtitle text-muted">Add images to your product</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="insert_image" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Choose your product</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name">
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
    </section>
</div>
</div>
<!-- dashboard end -->

@endsection