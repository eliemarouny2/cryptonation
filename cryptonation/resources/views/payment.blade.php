<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pallapay</title>
</head>

<body>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .mariner {
                background-color: #010124;
            }

            .mariner2 {
                color: #010124;
            }

            .white {
                color: #fff;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>

    <body class="bg-light">
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="/images/icons/logo.png" alt="cryptonations logo">
                    <h2 class="mariner2">Cryptonations</h2>
                    <p class="lead mariner2">Pay with pallapay</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="mariner2">Your cart</span>
                            <span class="badge rounded-pill mariner">{{$total_qnty}}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($cartitems as $cartitem)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{$cartitem->name}}</h6>
                                    <small class="text-muted">Quantity: {{$cartitem->qty}}</small>
                                </div>
                                <span class="text-muted">${{$cartitem->qty*$cartitem->price}}</span>
                            </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Shipping fees</h6>
                                </div>
                                <span class="text-muted">$0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>${{$total_amount}}</strong>
                            </li>
                        </ul>



                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Your Info</h4>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" disabled value="{{$checkout_data->firstname}}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" disabled value="{{$checkout_data->lastname}}" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" class="form-control" disabled value="{{$checkout_data->email}}">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" disabled value="{{$checkout_data->address}}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" disabled value="{{$checkout_data->zipcode}}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">City</label>
                                <input type="text" class="form-control" id="zip" disabled value="{{$checkout_data->city}}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Country</label>
                                <input type="text" class="form-control" id="zip" disabled value="{{$checkout_data->country}}" required>
                            </div>
                        </div>
                        <hr class="my-4">
                        <form method="POST" action="https://www.pallapay.com/sci/form" target="_blank">
                            <input type="hidden" name="merchant" value="FQ892791">
                            <input type="hidden" name="order" value="{{$order_id}}">
                            <input type="hidden" name="item_name" value="pallapay-payment">
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="amount" value="{{$total_amount}}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="currency" value="USD">
                            <input type="hidden" name="first_name" value="{{$checkout_data->firstname}}">
                            <input type="hidden" name="last_name" value="{{$checkout_data->lastname}}">
                            <input type="hidden" name="email" value="{{$checkout_data->email}}">
                            <input type="hidden" name="phone" value="{{$checkout_data->phone}}">
                            <input type="hidden" name="address" value="{{$checkout_data->address}}">
                            <input type="hidden" name="city" value="{{$checkout_data->city}}">
                            <input type="hidden" name="state" value="{{$checkout_data->city}}">
                            <input type="hidden" name="country" value="{{$checkout_data->country}}">
                            <input type="hidden" name="postalcode" value="{{$checkout_data->zipcode}}">
                            <input type="hidden" name="custom" value="{{$order_id}}">
                            <div class="text-center">
                                <button class="btn mariner btn-lg white" type="submit">Pay now!</button>
                            </div>
                        </form>
                    </div>

                </div>
            </main>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2021 Cryptonations</p>
            </footer>
        </div>

    </body>

    </html>

</body>

</html>