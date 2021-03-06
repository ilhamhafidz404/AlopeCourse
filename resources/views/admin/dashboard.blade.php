@extends('admin.master')

@section('title', 'Dashboard')

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
          <h5 class="card-title text-uppercase text-muted mb-0">Total Tutorial</h5>
          <span class="h2 font-weight-bold mb-0">{{$tutorCount}}</span>
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
          <h5 class="card-title text-uppercase text-muted mb-0">Total Serie</h5>
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
          <h5 class="card-title text-uppercase text-muted mb-0">Total Topic</h5>
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
            <th scope="col" class="sort" data-sort="category">Serie</th>
            <th scope="col" class="sort" data-sort="created_at">Dibuat Pada</th>
          </tr>
        </thead>
        <tbody class="list">
          @foreach($draffBlogList as $draffBlog)
          <tr>
            <th scope="row">
              <div class="media align-items-center">
                <img alt="{{$draffBlog->slug}} Image" src="{{asset('storage/thumbnail/blog/'.$draffBlog->thumbnail)}}" width="120px" class="img-thumbnail me-3">
                <div class="media-body">
                  <a href="{{route('blog.show', $draffBlog->slug)}}" class="name mb-0 text-sm">{{$draffBlog->judul}}</a>
                </div>
              </div>
            </th>
            <td>
              {{$draffBlog->category->nama}}
            </td>
            <td>
              {{$draffBlog->created_at->diffForHumans()}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
<div class="col-md-12 col-lg-6">
  <div class="card p-3">
    <canvas id="blogChart" height="330"></canvas>
  </div>
</div>
<div class="col-md-12 col-lg-6">
  <div class="card p-3">
    <canvas id="videoChart" height="330"></canvas>
  </div>
</div>


@php
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCR0Gz3-3zuqQuuePqNq9-JA&key=AIzaSyBSLmlOfBhdZXTucXCXx17WmcaQWRkX0Tc');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result= curl_exec($curl);
    // curl_close($curl);

    $result= json_decode($result, true);
    $ytChannelName= $result['items'][0]['snippet']['title'];
    $ytProfile= $result['items'][0]['snippet']['thumbnails']['medium']['url'];
    $subscriberCount= $result['items'][0]['statistics']['subscriberCount'];


    curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBSLmlOfBhdZXTucXCXx17WmcaQWRkX0Tc&channelId=UCR0Gz3-3zuqQuuePqNq9-JA&part=snippet&order=date&maxResults=1');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $searchResult= curl_exec($curl);
    curl_close($curl);

    $searchResult= json_decode($searchResult, true);
    $searchResult= $searchResult['items'][0]['id']['videoId'];
@endphp


<div class="col-md-12">
  <div class="row align-items-center">
    <div class="col-md-8">
      <div class="card p-3">
        {{-- <iframe width="100%" height="350px" src={{ "https://www.youtube.com/embed/".$searchResult }}></iframe> --}}
        <iframe width="100%" height="315"
        src="https://www.youtube.com/embed/{{$searchResult}}">
        </iframe> 
      </div>
    </div>
    <div class="col-md-4">
      <div class="card youtubeCard overflow-hidden px-3 py-4 text-center position-relative">
        <h3 class="mb-3 ">{{$ytChannelName}}</h3>
        <img src="{{$ytProfile}}" alt="" class="rounded-circle mx-auto" width="100px">
        <div class="mx-auto mt-4">
          <div class="g-ytsubscribe" data-channelid="UCR0Gz3-3zuqQuuePqNq9-JA" data-layout="default" data-count="default"></div>
        </div>
        <h2>
          {{$subscriberCount}}
          <small class="fs-6 text-muted">total subscriber</small>
        </h2>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>

<script>
  var _ydataBlog = JSON.parse('{!! json_encode($blogMonths) !!}');
  var _xdataBlog = JSON.parse('{!! json_encode($blogMonthCount) !!}');
  var _ydataSerie = JSON.parse('{!! json_encode($videoMonths) !!}');
  var _xdataSerie = JSON.parse('{!! json_encode($videoMonthCount) !!}');


  var blogChart = document.getElementById('blogChart');
  var blogChart = new Chart(blogChart, {
    type: 'bar',
    data: {
      labels: _ydataBlog,
      datasets: [{
        label: 'Grafik Blog',
        data: _xdataBlog,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  var serieChart = document.getElementById('videoChart');
  var serieChart = new Chart(serieChart, {
    type: 'bar',
    data: {
      labels: _ydataSerie,
      datasets: [{
        label: 'Grafik Video',
        data: _xdataSerie,
        backgroundColor: [
          'rgba(255, 159, 64, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(255, 159, 64, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 1
      }]
    },
  });
</script>
@endsection