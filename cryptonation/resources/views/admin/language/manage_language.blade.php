@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Language</h3>
        <p class="text-subtitle text-muted">manage your languages</p>
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
                                        <th>language</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    for ($i = 2; $i < count($languages); $i++) {
                                    ?>
                                    <tr>
                                        <td>{{$x }}</td>
                                        <td>{{$languages[$i]}}</td>
                                        <td>
                                            <a class="badge bg-success nodec"
                                                href={{"edit_phrases/".$languages[$i]}}>Edit</a>
                                                <?php if($i!=2){ ?>
                                            <a class="badge bg-danger nodec mt-1"
                                                href={{"delete_language/".$languages[$i]}}>Delete</a>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                     $x++;
                                    } ?>
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