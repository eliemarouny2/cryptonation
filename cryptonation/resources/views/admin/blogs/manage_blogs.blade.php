@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Blogs</h3>
        <p class="text-subtitle text-muted">manage your blogs</p>
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->blog_id }}</td>
                                        <td>{{$blog->blog_title }}</td>
                                        <td>{{$blog->blog_description }}</td>
                                         <td>
                                            <?php  if($blog->blog_status==0){
                                                    echo 'inactive';
                                                }else{
                                                    echo 'active';
                                                }
                                        ?>
                                        </td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_blog/".$blog->blog_id}}>Edit</a>
                                            <a class="badge bg-danger nodec"
                                                href={{"delete_blog/".$blog->blog_id}}>Delete</a>
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