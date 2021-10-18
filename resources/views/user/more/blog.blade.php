@extends('user.more.master-serie')

@section('title', 'Alope - Blog')

@section('header')
<a class="py-1 px-3 mt-5 header-hot d-flex justify-content-between align-items-center text-white">
  <div>
    <span class="badge bg-danger me-2">
      <i class="fas fa-fire me-1"></i> HOT
    </span>
    <small>
      Berbagi Cerita di Alope Journey
    </small>
  </div>
  <i class="fas fa-chevron-right"></i>
</a>

<h1 class="fw-light text-uppercase mt-3">
  <span class="fw-bold serie-name position-relative">Blog Tutorial</span>
</h1>

<small class="lead text-white mt-5">
  Tutorial dalam bentuk Blog untuk kalian yang suka membaca bisa didapatkan. Artikel tersedia dengan Source Code dan Highlighting Syntax yang membuat anda nyaman melihat potongan baris code di setiap bahasa pemrogrammanya.
</small>
@endsection

@section('card-content')
<div class="container-fluid series-content">
  <div class="card p-4 shadow position-relative">
    {{-- <div class="header-card position-absolute rounded shadow-sm">
      <h4 class="text-uppercase text-white mb-0">List Blog</h4>
    </div> --}}
    <div class="row mt-4">
      @foreach($blogs as $blog)
      <div class="col-md-4 mb-4">
        <a href="{{route('blog.read', $blog->slug)}}">
          <div class="card shadow-sm">
            <div class="blog-serie w-100" style="background-image: url({{asset('storage/thumbnail/blog/'.$blog->thumbnail)}})"></div>
            <div class="card-body pt-1">
              <small class="text-muted">
                {{$blog->category->nama}}
              </small>
              <h5 class="card-title mb-4 text-dark mt-0">
                {{$blog->judul}}
              </h5>
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <img src="{{asset('storage/profile/'.$blog->user->profile)}}" alt="{{$blog->user->name}}" class="rounded-circle writer-img">
                  <small class="text-muted ms-2">
                    {{$blog->user->name}}
                  </small>
                </div>
                <small class="text-muted">
                  <?php $tgl = ($blog->created_at->diff()->days < 1) ? $blog->created_at->diffForHumans() : $blog->created_at->format('M, Y') ?>
                  {{$tgl}}
                </small>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
      {{$blogs->links()}}
    </div>
  </div>
</div>
@endsection