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
                        <form action="insert_product" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Product Price</label>
                                        <input type="number" min="1" class="form-control" id="price" name="price"
                                            placeholder="price">
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

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                            rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <li class="d-inline-block me-2 mb-1">
                                <div class='form-check'>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="form-check-input form-check-secondary" checked
                                            name="status" id="status">
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                            </li>

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