@extends('admin.base')
@section('admincontent')
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #39da8a;
    color: #fff;
    text-align: center;
    border-radius: 18px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}
#snackbar2 {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #ff5b5c;
    color: #fff;
    text-align: center;
    border-radius: 18px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}
#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar2.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {
        bottom: 0;
        opacity: 0;
    }

    to {
        bottom: 30px;
        opacity: 1;
    }
}

@keyframes fadein {
    from {
        bottom: 0;
        opacity: 0;
    }

    to {
        bottom: 30px;
        opacity: 1;
    }
}

@-webkit-keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1;
    }

    to {
        bottom: 0;
        opacity: 0;
    }
}

@keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1;
    }

    to {
        bottom: 0;
        opacity: 0;
    }
}
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Language</h3>
        <p class="text-subtitle text-muted">edit your phrases</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="snackbar">Success</div>
                        <div id="snackbar2">Error</div>

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Phrase</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">{{$lang}}</label>
                                </div>
                            </div>
                        </div>
                        @foreach($phrases as $phrase)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="name" readonly
                                        value="{{$phrase->phrase}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="{{$phrase->id}}"
                                        onblur="editphrase('{{$phrase->id}}')" name="name" value="{{$phrase->$lang}}">
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<!-- dashboard end -->

<script type="text/javascript">
var token = document.getElementsByName('_token')[0];

function editphrase(id) {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token.value
        }
    });
    var value = $('#' + id).val();
    var language = '<?php echo $lang; ?>';
    $.ajax({
        type: 'POST',
        async: true,
        dataType: 'json',
        url: "/update_phrase",
        data: {
            'id': id,
            'value': value,
            'language': language
        },
        success: function(data) {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        },
        error: function(exc) {
            var x = document.getElementById("snackbar2");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    });
}
</script>
@endsection