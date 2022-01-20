@extends('layouts.base')
@section('content')
<div class="container-fluid">
  <main>


    <div class="row g-5 mt-3 mb-3">
      <div class="col-md-5 col-lg-4">

        <img src="/images/icons/astro.png" class="img-astro" alt="astraunot image">

      </div>
      <div class="col-md-5 col-lg-6">
        <h4 class="mb-3 bluish2">Personal Details</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <input type="text" class="form-control" id="firstName" placeholder="First Name" value="" required>
            </div>

            <div class="col-sm-6">
              <input type="text" class="form-control" id="lastName" placeholder="Last Name" value="" required>
            </div>

            <div class="col-sm-6">
              <input type="text" class="form-control" id="firstName" placeholder="Email Address" value="" required>
              <!-- <div class="invalid-feedback">
                Valid first name is required.
              </div> -->
            </div>

            <div class="col-sm-6">
              <input type="text" class="form-control" id="lastName" placeholder="Phone" value="" required>
            </div>

            <h4 class="mb-3 greenish">Shipping Address</h4>


            <div class="col-12">
              <input type="text" class="form-control" id="address" placeholder="Street Address" required>
            </div>

            <div class="col-sm-6">
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-sm-6">
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-sm-6">
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <h4 class="mb-3 bluish2">Payment Method</h4>


          </div>

          <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
          </div> -->

          <!-- <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div> -->

          <!-- <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div> -->
          <div class="centered2">
            <button class="w-40 btn btn-lg light-blue" type="submit">checkout</button>
          </div>
        </form>
      </div>
      <div class="col-md-2 col-lg-2">
        &nbsp;
      </div>
    </div>
  </main>
</div>
@endsection