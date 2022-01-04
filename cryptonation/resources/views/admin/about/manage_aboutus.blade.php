@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>About</h3>
        <p class="text-subtitle text-muted">manage your about page</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">

            <div class="col-md-12">
                <div class="card padd">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <h1>About</h1>
                            <p class="">
                                <?php echo $about->about; ?>}
                                <a href="/edit_aboutus" style="float:right" class="btn btn-success round">Edit</a>

                            </p>
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