@extends('admin.base')
@section('admincontent')
<style>
    .print-btn{
        background-color: #010124;
        color:#fff;
        width: 10rem;
        padding:1.5rem 3rem;
        border-radius: 5px;
        margin: auto;
    }
    a:hover{
        color:#fff;
    }
</style>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Orders</h3>
        <p class="text-subtitle text-muted">manage your orders</p>
    </div>
    <section class="section">

        <div class="row mb-4">
            <div class="col-md-12">
                <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                    <div class="card" id="printableArea">
                        <div class="card-header p-4">
                            <div class="float-right">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/images/icons/logo2.png" class="admin-logo" alt="" srcset="">
                                    </div>
                                    <div class="col-9 m-auto">
                                        <h3 class="mb-0">Order #{{$orderinfo->order_id}}</h3>
                                        <span>{{$orderinfo->date}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <h5 class="mb-3">From:</h5>
                                    <h3 class="text-dark mb-1">Cryptonations</h3>
                                    <div>Omar Daouk Street</div>
                                    <div>Beirut Lebanon</div>
                                    <div>Email: elie.marouny@hotmail.com</div>
                                    <div>Phone: +961 70 545 675</div>
                                </div>
                                <div class="col-6 ">
                                    <h5 class="mb-3">To:</h5>
                                    <h3 class="text-dark mb-1">{{$orderinfo->firstname}} {{$orderinfo->lastname}}</h3>
                                    <div>{{$orderinfo->city}},{{$orderinfo->country}}</div>
                                    <div>{{$orderinfo->streetaddress}}</div>
                                    <div>Email: {{$orderinfo->email}}</div>
                                    <div>Phone: {{$orderinfo->phone}}</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Item</th>
                                            <th class="right">Price</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach ($orderdata as $data) { ?>
                                            <tr>
                                                <td class="center">
                                                    <?php echo $count; ?>
                                                </td>
                                                <td class="left strong">
                                                    <?php echo $data->prod_name; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo $data->prod_price; ?> USD
                                                </td>
                                                <td class="center">
                                                    <?php echo $data->quantity; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo $data->total_price; ?> USD
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }  ?>


                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Subtotal</strong>
                                                </td>
                                                <td class="right">{{$orderinfo->total_amount}} USD</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark">{{$orderinfo->total_amount}} USD</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                                    </div>
                        <div class="card-footer bg-white">
                            <p class="mb-0">Invoice data to be put here</p>
                        </div>
                    </div>
                    <div class="buttons text-center">
                    <a class="print-btn" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span>Print</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<!-- dashboard end -->
<script type="text/javascript">
    function printDiv(divName) {
        console.log('jee');
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection