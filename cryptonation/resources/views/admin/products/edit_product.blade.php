@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Products</h3>
        <p class="text-subtitle text-muted">edit your product</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_product" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" class="form-control" id="id" name="id" value="{{$product->prod_id}}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$product->prod_name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input type="number" min="1" class="form-control" id="price" name="price" placeholder="price" value="{{$product->prod_price}}">
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-6 mb-4">
                                <label for="category">Category</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="category" name="category">
                                        @foreach($categories as $category)
                                        <option value="{{$category->cat_id}}" <?php if ($category->cat_id == $product->fk_cat_id
                                                                                ) echo "selected";
                                                                                ?>>{{$category->cat_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class=" col-md-6 mb-4">
                                <label for="category">Type</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="trending" name="trending">
                                        <option value="0">normal</option>
                                        <option value="1" <?php if ($product->trending == 1) echo 'selected'; ?>>trending</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class=" col-md-6 mb-4">
                                <label for="category">Status</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="status" name="status">
                                        <option value="1">active</option>
                                        <option value="0" <?php if ($product->prod_status == 0) echo 'selected'; ?>>inactive</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" value="" rows=" 5">{{$product->prod_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $pvariants = explode(',', $product->variants);
                            $pcolors = explode(',', $product->colors);
                            ?>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="variants">Variants</label>
                                        <select class="choices form-select" multiple="multiple" id="variants" name="variants[]">
                                            @foreach($variants as $variant)
                                            <option <?php foreach ($pvariants as $pvariant) {
                                                        if ($variant->variant_name == $pvariant) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="{{$variant->variant_name}}">{{$variant->variant_name}}</option>
                                            @endforeach
                                        </select>
                                    </div iv>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="colors">Colors</label>
                                        <select class="choices form-select" multiple="multiple" id="colors" name="colors[]">
                                            @foreach($colors as $color)
                                            <option <?php foreach ($pcolors as $pcolor) {
                                                        if ($color->color == $pcolor) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="{{$color->color}}">{{$color->color}}</option>
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
                                    @if($product->prod_img_url)
                                    @endif
                                </div>
                                <div class="col-md-4"><img width="200" src="/images/products/{{$product->prod_img_url }}" alt="image product"></div>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" href="#" class="btn btn-success round mt-4">Save</button>
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