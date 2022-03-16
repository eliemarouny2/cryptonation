@extends('layouts.base')
@section('content')

<style>
  input[type="radio"] {
    display: none;
  }
</style>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container-fluid">
  <div class="row g-5 mt-3 mb-3">
    <div class="col-md-5 col-lg-4 col-12">
      <img src="/images/icons/astro.png" class="img-astro" alt="astraunot image">
    </div>

    <div class="col-md-5 col-lg-6">
      <form method="POST" action="/submit_checkout">
        @csrf
        <div class="row">
          <div class="col-1">
            <h2 class="mb-3 bluish2">01</h1>
          </div>
          <div class="col-11 mt-2">
            <div class="row">
              <div class="col-12">
                <h4 class="mb-3 bluish2">Personal Details</h4>
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="" required>
                </div>
                <div class="col-6 mb-3">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <span class="text-danger mb-4">@error('email'){{ $message }} @enderror</span>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="" required>
                </div>

                <div class="col-6 mb-3">
                  <div class="input-group">
                    <select class="form-select" name="country" id="country" required>
                      @foreach($countries as $country)
                      <option value="{{$country->name}}" <?php if ($country->phonecode == '971') {
                                                            echo 'selected';
                                                          } ?>>+{{$country->phonecode}}</option>
                      @endforeach
                    </select>
                    <input type="number" name="phone" id="phone" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-1">
            <h2 class="mb-3 greenish">02</h2>
          </div>
          <div class="col-11 mt-2">
            <div class="row">
              <div class="col-12">
                <h4 class="mb-3 greenish">Shipping Address</h4>
              </div>
              <div class="row">
                <div class="col-12 mb-3">
                  <span class="text-danger mb-4">@error('address'){{ $message }} @enderror</span>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" required>

                </div>
                <div class="col-6 mb-3">
                  <span class="text-danger mb-4">@error('zip'){{ $message }} @enderror</span>
                  <input type="text" class="form-control" id="zipcode" name="zipcode" required placeholder="ZIP code">

                </div>


                <div class="col-6 mb-3">
                  <input class="form-control" id="city" name="city" required placeholder="City" />
                </div>

                <div class="col-6 mb-3">
                  <select class="form-select" name="country" id="country" required>
                    @foreach($countries as $country)
                    <option value="{{$country->name}}" <?php if ($country->name == 'United Arab Emirates') {
                                                          echo 'selected';
                                                        } ?>>{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-1">
              <h2 class="mb-3 bluish2">03</h4>
            </div>
            <div class="col-11 mt-2">
              <div class="row">
                <div class="col-12">
                  <h4 class="mb-3 bluish2">Payment Method</h4>
                </div>
                <div class=" col-12 col-lg-8 wrapper2">
                  <input type="radio" name="paymethod" id="option-1" value="pallapay" checked>
                  <input type="radio" name="paymethod" id="option-2" value="cash">
                  <label for="option-1" class="option option-1">
                    <div class="dot"></div>
                    <span><img src="/images/icons/pallapay.svg" class="custom-check" alt=""></span>
                  </label>
                  <label for="option-2" class="option option-2">
                    <div class="dot"></div>
                    <span>Cash on delivery</span>
                  </label>
                </div>
              </div>
              <div class="col-12 mb-3 mt-4">
                <img src="/images/icons/ssl.png" alt="ssl image">
                <span class="ssl">Your transaction is secured with SSL encryption</span>
              </div>
            </div>
          </div>
          <div class="centered2">
            <button class="w-40 btn btn-lg checkout-btn" type="submit">checkout</button>
          </div>
      </form>
    </div>
    <div class="col-md-2 col-lg-2">
      &nbsp;
    </div>

  </div>
</div>
@endsection