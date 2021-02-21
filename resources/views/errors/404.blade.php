@extends('layouts.app')
@section('content')
<main class="container d-flex justify-content-center mx-auto h-100 align-items-center" style="padding-left: 0px;">

  <div class="mt-5 pt-5">
    <div class="row">
      <div class="col-md-12 text-center float-md-none mx-auto">
        <img src="{{ asset('404.png') }}" alt="Error 404" class="img-fluid wow fadeIn animated">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 text-center mb-5">
        <h2 class="h2-responsive wow fadeIn mb-4 animated" data-wow-delay="0.2s" style="font-weight: 500;">Oops! This obviously isn't a page you were looking for.</h2>
      </div>
    </div>
  </div>
</main>
@endsection