@extends('admin.base')
@section('admincontent')




<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Products</h3>
        <p class="text-subtitle text-muted">manage your products</p>
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
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->prod_id }}</td>
                                        <td>{{$product->prod_name }}</td>
                                        <td>{{$product->prod_description }}</td>
                                        <td>{{$product->prod_price }}</td>
                                        <td>{{$product->cat_name }}</td>
                                        <td>
                                            <?php  if($product->prod_status==0){
                                                    echo 'inactive';
                                                }else{
                                                    echo 'active';
                                                }
                                                
                                                ?>
                                        </td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_product/".$product->prod_id}}>Edit</a>
                                            <a class="badge bg-danger nodec mt-1"
                                                href={{"delete_product/".$product->prod_id}}>Delete</a>
                                        </td>
                                        @endforeach
                                    </tr>
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
<!-- dashboard end -->

@endsection