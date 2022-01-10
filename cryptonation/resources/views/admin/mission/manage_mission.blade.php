@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Mission</h3>
        <p class="text-subtitle text-muted">manage your mission</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                    <div class="card padd">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <h1>Our Mission</h1>
                            <p class="pd-2">{{$mission[0]['mission']}}</p>
                            <a href="/edit_mission" class="btn btn-success round rightfloater">Edit</a>

                        </div>

                    </div>
                    <h3>Roadmaps</h3>

                    <div class="table-responsive px-2 pb-3">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>text</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $i=1;
                                    foreach($roadmaps as $roadmap){ ?>
                                <tr>
                                    <td>Road map <?php echo $i; ?></td>
                                    <td><?php echo $roadmap->roadtext; ?></td>

                                </tr>
                                <?php
                                    $i++;
                                     } ?>

                            </tbody>
                        </table>
                        <a href="/edit_roadmap" class="btn btn-success round mt-4 rightfloater">Edit</a>
                    </div>
                </div>


    </section>
</div>
<!-- dashboard end -->

@endsection