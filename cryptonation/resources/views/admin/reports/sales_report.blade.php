@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Reports</h3>
        <p class="text-subtitle text-muted">get sales reports</p>
    </div>
    <section class="section">
        <div class="row mb-2">
        </div>
        <div class="row mb-4">
            <div class="col-md-12">

                <form action="/report" method="POST">
                    @csrf

                    <div class="form-group col-xl-4">
                        <label class="" for="from_date">
                            start date
                        </label>
                        <input type="date" name="start" class="form-control datepicker" id="start" placeholder="start"
                            required>
                    </div>

                    <div class="form-group col-xl-4">
                        <label class="" for="to_date">
                            end date
                        </label>
                        <input type="date" name="end" class="form-control datepicker" id="end" placeholder="end date"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success mb-4">search</button>
                </form>

                <div class="card">
                    <div class="card-body px-3 pb-0">

                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



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