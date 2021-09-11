@extends("beranda.premium.master")

@section('title', 'List Post')
@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">Post</li>
<li class="breadcrumb-item active" aria-current="page">List Post</li>
@endsection
@section('header_button')
<a href="{{route('post.create')}}" class="btn btn-sm btn-neutral">Buat Post Baru</a>
<a href="#" class="btn btn-sm btn-neutral">Filters</a>
@endsection

@section("content")
<div class="col-md-12">
  <div class="card p-3">
    <!-- Light table -->
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="myTable">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td>1</td>
            <td>{{$post->title}}</td>
            <td>
              @if($post->status == 'publish')
              <span class="badge bg-success">{{$post->status}}</span>
              @elseif($post->status == 'pending')
              <span class="badge bg-warning">{{$post->status}}</span>
              @else
              <span class="badge bg-danger">{{$post->status}}</span>
              @endif
            </td>
            <td>
              <a href="" class="btn btn-sm btn-primary">
                <i class="fas fa-eye"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection