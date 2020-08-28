@extends('layouts.app')

@section('banner')
    @include('nav.banner')
@endsection

@section('content')
<section class="w3l-index-block2 py-5">
    <div class="container py-md-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">How Smart Wallet Works </h3>
        <p class="my-3 head"> Just follow the few steps below to understand how smart wallet technology works.</p>
      </div>
      <div class="row bottom_grids pt-md-3">
        <div class="col-lg-4 col-md-6 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
              <img src="assets/images/images.png" alt="" class="img-fluid" width="80px" />
              <h3 class="my-3">Create Account</h3>
              <p class="">Get start by creating a free account. Click on the sign-up button to start</p>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
              <img src="assets/images/s2.png" alt="" class="img-fluid" />
              <h3 class="my-3">Get Bouns</h3>
              <p class="">On creating a free account you get a free bonus of 10% from us.</p>
            </a>
          </div>
        </div>
        <div class="col-lg-4 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
              <img src="assets/images/s3.png" alt="" class="img-fluid" />
              <h3 class="my-3">Start Tranaction</h3>
              <p class="">Now you can start making transaction from your dashboard by dialing the USSD code.</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
