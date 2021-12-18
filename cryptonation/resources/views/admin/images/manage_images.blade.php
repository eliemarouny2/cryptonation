@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Customers</h3>
        <p class="text-subtitle text-muted">manage your customers</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>image ID</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($images as $image)
                                    <tr>
                                        <td>{{$image->image_id }}</td>
                                        <td>{{$image->prod_id }}</td>
                                        <td>{{$image->prod_name }}</td>
                                        <td><img src="" alt=""></td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_image/".$image->image_id}}>Edit</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_image/".$image->image_id}}>Delete</a>
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
</div>
<!-- dashboard end -->

@endsection