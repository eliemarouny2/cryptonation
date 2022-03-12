<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="/css/styles.css">
   <title>Sign in</title>
</head>

<body>
   <div class="row g-5 mt-3 mb-3">
      <div class="col-md-8 col-lg-8">
         <div class="container">
            <div class="row d-flex justify-content-center">

               <div class="card">
                  <div class="invoice p-5">
                     <h5 class="bluish2">Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello,
                        {{ucfirst($firstname)}}</span> <span>You order has been confirmed and will be shipped
                        in next
                        two
                        days!</span>
                     <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span class="white-color">{{$date}}</span> </div>
                                 </td>
                                 <td>
                                    <div class="py-2"> <span class="d-block text-muted">Order No</span>
                                       <span class="white-color">{{$order_id}}</span>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="py-2"> <span class="d-block text-muted">Payment</span><span class="white-color">Pallapay</span></div>
                                 </td>
                                 <td>
                                    <div class="py-2"> <span class="d-block text-muted">Address</span>
                                       <span class="white-color">{{$data->address}}, {{$data->city}},
                                          {{$data->country}}</span>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                           <table class="table table-borderless">
                              <tbody class="totals">
                                 <tr>
                                    <td>
                                       <div class="text-left"> <span class="white-color">Subtotal</span> </div>
                                    </td>
                                    <td>
                                       <div class="text-right"> <span class="white-color">$168.50</span> </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="text-left"> <span class="white-color">Shipping Fee</span> </div>
                                    </td>
                                    <td>
                                       <div class="text-right"> <span class="white-color">$22</span> </div>
                                    </td>
                                 </tr>
                                 <tr class="border-top border-bottom">
                                    <td>
                                       <div class="text-left"> <span class="font-weight-bold white-color">Total</span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="text-right"> <span class="font-weight-bold bluish2">$238.50</span>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <p>We will be sending shipping confirmation email when the items ship successfully!</p>
                     <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Cryptonations Team</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-lg-4">

         <img src="/images/icons/astro.png" class="img-astro" alt="astraunot image">
      </div>

   </div>


</body>

</html>