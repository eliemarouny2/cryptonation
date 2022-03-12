<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/order.css">
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
</head>
<body>
<div class="main-content container-fluid">
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
                                    <div class="col-7 m-auto">
                                        <h3 class="mb-0">Order #{{$order_info->order_id}}</h3>
                                        <span>{{$order_info->date}}</span>
                                    </div>
                                    <div class="col-2 custom-01">
                                        <a href="{{ url('/orders') }}">Go back</a>
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
                                    <h3 class="text-dark mb-1">{{$order_info->firstname}} {{$order_info->lastname}}</h3>
                                    <div>{{$order_info->city}},{{$order_info->country}}</div>
                                    <div>{{$order_info->streetaddress}}</div>
                                    <div>Email: {{$order_info->email}}</div>
                                    <div>Phone: {{$order_info->phone}}</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm mt-5">
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
                                        foreach ($order_items as $order_item) { ?>
                                            <tr>
                                                <td class="center"><?php echo $count; ?></td>
                                                <td class="left strong"><?php echo $order_item->prod_name; ?></td>
                                                <td class="right"><?php echo $order_item->prod_price; ?></td>
                                                <td class="center"><?php echo $order_item->quantity; ?></td><td class="right"><?php echo $order_item->total_price; ?> USD</td>
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
                                                <td class="right">{{$order_info->total_amount}} USD</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark">{{$order_info->total_amount}} USD</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                                    </div>
                        <!-- <div class="card-footer bg-white">
                            <p class="mb-0">Invoice data to be put here</p>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<!-- dashboard end -->
</body>
</html>






