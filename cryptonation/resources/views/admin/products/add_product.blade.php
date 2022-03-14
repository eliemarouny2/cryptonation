@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Products</h3>
        <p class="text-subtitle text-muted">Add a new product</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="insert_product" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Product Price</label>
                                        <input type="number" min="1" class="form-control" id="price" name="price" required placeholder="price">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="category">Category</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="category" name="category">
                                        @foreach($categories as $category)
                                        <option value="{{$category->cat_id}}">{{$category->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class=" col-md-6 mb-4">
                                <label for="category">Type</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="trending" name="trending">
                                        <option value="0">normal</option>
                                        <option value="1">trending</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class=" col-md-6 mb-4">
                                <label for="category">Status</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="status" name="status">
                                        <option value="1">active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="variants" class="form-label">Variants</label>
                                        <select class="choices form-select" multiple="multiple" id="variants" name="variants[]">
                                            @foreach($variants as $variant)
                                            <option value="{{$variant->variant_name}}">{{$variant->variant_name}}</option>
                                            @endforeach
                                        </select>
                                    </div iv>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="colors" class="form-label">Description</label>
                                        <select class="choices form-select" multiple="multiple" id="colors" name="colors[]">
                                            @foreach($colors as $color)
                                            <option value="{{$color->color}}">{{$color->color}}</option>
                                            @endforeach
                                        </select>
                                    </div iv>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="file" class="image" id="image" name="image">
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