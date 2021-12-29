@extends('admin.base')
@section('admincontent')


<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Images</h3>
        <p class="text-subtitle text-muted">edit image</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/update_image" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" id="id" name="id" value="{{$data->image_gallery_id}}">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6>Select product</h6>
                                    <div class="form-group">
                                        <select class="choices form-select" id="product" name="product">
                                            @foreach($products as $product)
                                            <option value="{{$product->prod_id}}" <?php if($product->
                                                prod_id==$data->product_id){ echo 'selected'; }
                                                ?>>{{$product->prod_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <p>Default image</p>
                                    <img width="200" src="/image_gallery/{{$data->img_url}}" alt="product image">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <p>Select new image</p>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input" id="image" name="image">
                                        <label class="form-file-label" for="customFile">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
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