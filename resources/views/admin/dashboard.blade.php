@extends('admin.master')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

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
          <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>
          <span class="h2 font-weight-bold mb-0">
            {{$userCount}}
          </span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
            <i class="ni ni-single-02"></i>
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
  @if($draffBlogCount >0)
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
  @endif
</div>
<div class="col-md-12">
  <div class="card p-3">
    <canvas id="myChart" height="330"></canvas>
  </div>
</div>
<div class="col-md-12">
  <div class="card p-3">
    <iframe width="100%" height="350px" src="{{$video->link}}"></iframe>
  </div>
</div>
<script>
  var _ydata = JSON.parse('{!! json_encode($months) !!}');
  var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');
</script>
@endsection