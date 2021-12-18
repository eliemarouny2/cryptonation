@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Mission</h3>
        <p class="text-subtitle text-muted">edit our mission</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_mission" method="POST">
                            @csrf

                            <input type="hidden" class="form-control" id="id" name="id" value="1">

                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Mission</label>
                                        <textarea class="form-control" id="mission" name="mission" value=""
                                            rows=" 8">{{$mission[0]['mission']}}</textarea>
                                    </div>
                                </div>
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