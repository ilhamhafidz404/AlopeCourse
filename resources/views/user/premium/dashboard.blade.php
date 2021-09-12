@extends('user.premium.master')

@section('title', 'Dashboard')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Total Post Anda</h5>
          <span class="h2 font-weight-bold mb-0">8</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
            <i class="ni ni-book-bookmark"></i>
          </div>
        </div>
      </div>
      <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
      </p>
    </div>
  </div>
</div>
@endsection