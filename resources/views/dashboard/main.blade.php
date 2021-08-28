@extends('dashboard.master')

@section('content')
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Total Blog Terupload</h5>
          <span class="h2 font-weight-bold mb-0">{{$blogCount}}</span>
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
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Total Blog Serie</h5>
          <span class="h2 font-weight-bold mb-0">{{$serieCount}}</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
            <i class="ni ni-folder-17"></i>
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
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Total Topic Blog</h5>
          <span class="h2 font-weight-bold mb-0">{{$serieCount}}</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
            <i class="ni ni-tag"></i>
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
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
          <span class="h2 font-weight-bold mb-0">49,65%</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
            <i class="ni ni-chart-bar-32"></i>
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
<div class="col-md-12">
  <div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0">List Blog Draff</h3>
        <div class="badge bg-gradient-danger text-white shadow">
          <span class="fs-6 fw-bold">{{$draffBlogCount}}</span>
        </div>
      </div>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="judul">Blog</th>
            <th scope="col" class="sort" data-sort="category">Category</th>
            <th scope="col" class="sort" data-sort="created_at">Dibuat Pada</th>
          </tr>
        </thead>
        <tbody class="list">
          @foreach($draffBlogList as $draffBlog)
          <tr>
            <th scope="row">
              <div class="media align-items-center">
                <img alt="{{$draffBlog->slug}} Image" src="{{asset('storage/'.$draffBlog->thumbnail)}}" width="120px" class="img-thumbnail me-3">
                <div class="media-body">
                  <span class="name mb-0 text-sm">{{$draffBlog->judul}}</span>
                </div>
              </div>
            </th>
            <td>
              {{$draffBlog->category->nama}}
            </td>
            <td>
              {{$draffBlog->created_at}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-xl-4">
  <div class="card">
    <div class="card-header bg-transparent">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
          <h5 class="h3 mb-0">Total orders</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!-- Chart -->
      <div class="chart">
        <canvas id="chart-bars" class="chart-canvas"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection