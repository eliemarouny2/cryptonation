@extends('admin.base')
@section('admincontent')
<link rel="stylesheet" href="/admin/css/quill.bubble.css">
<link rel="stylesheet" href="/admin/css/quill.snow.css">
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
<div id="snackbar">Success</div>
                        <div id="snackbar2">Error</div>
    <div class="page-title">
        <h3>Write Email</h3>
        <p class="text-subtitle text-muted">Send an email to your subscribers</p>
    </div>
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <p>Send email </p>
                            <div id="full">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button onclick="readinput()">next step</button>
                        @csrf
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
</div>
</div>

<script src="/admin/js/quill.js"></script>
<script src="/admin/js/form-editor.js"></script>
<script>
    function readinput() {
        var token = document.getElementsByName('_token')[0];
        var email = document.getElementById('full').outerHTML;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token.value
            }
        });
        $.ajax({
            type: "post",
            async: true,
            dataType: 'json',
            url: '/send_email',
            data: {
                email: email,
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