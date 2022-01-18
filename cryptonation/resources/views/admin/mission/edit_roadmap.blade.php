@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Roadmap</h3>
        <p class="text-subtitle text-muted">edit your roadmap</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/update_roadmap" method="POST">
                            @csrf

                            @foreach($roadmap as $roadmap)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Roadmap {{$roadmap->id}}</label>
                                    <input type="hidden" id="id" name="id" value={{$roadmap->id }}>
                                    <input type="text" class="form-control" id="roadmap{{$roadmap->id}}"
                                        name="roadmap{{$roadmap->id}}" placeholder="road 1"
                                        value="{{ $roadmap->roadtext }}">
                                </div>
                            </div>
                            @endforeach

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