@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Categories</h3>
        <p class="text-subtitle text-muted">manage your categories</p>
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->cat_id }}</td>
                                        <td>{{$category->cat_name }}</td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_category/".$category->cat_id}}>Edit</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_category/".$category->cat_id}}>Delete</a>
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