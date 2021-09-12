@extends('admin.master')

@section('title', 'List Post')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('posts.index')}}">Post</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List Post</li>
@endsection

@section('header-button')
<div class="btn-group">
  <a href="{{route('users.create')}}" class="btn btn-sm btn-neutral me-2">Tambah User</a>
  <button type="button" class="btn btn-neutral btn-sm dropdown-toggle" data-bs-toggle="dropdown">
    Filter Blog
  </button>
  <ul class="dropdown-menu">
    <form action="" method="GET">
      <li>
        <a class="btn btn-transparent w-100" href="{{route('blog.index')}}">Semua</a>
      </li>
      <li>
        <button value="upload" name="status" class="btn btn-transparent w-100">Upload</button>
      </li>
      <li>
        <button value="draff" name="status" class="btn btn-transparent w-100">Draff</button>
      </li>
      <li>
        <button value="banned" name="status" class="btn btn-transparent w-100">Banned</button>
      </li>
    </form>
  </ul>
</div>
@endsection

@section('content')
<div class="card p-3">
  <!-- Light table -->
  <div class="table-responsive">
    <table class="table align-items-center table-flush" id="myTable">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Publisher</th>
          <th>Title</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td>1</td>
          <td>{{$post->user->name}}</td>
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
            <form action="{{route('posts.update', $post->id)}}" method="POST" class="d-inline">
              @csrf
              @method('PUT')
              @if($post->status == 'pending')
              <div class="dropdown">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">

                </button>
                <ul class="dropdown-menu">
                  <li>
                    <button class="dropdown-item" value="publish" name="status">
                      Publish
                    </button>
                  </li>
                  <li>
                    <button class="dropdown-item" value="reject" name="status">
                      Banned
                    </button>
                  </li>
                </ul>
              </div>
              @elseif($post->status == 'reject')
              <button class="btn btn-success btn-sm" name="status" value="publish">
                <span class="fas fa-check"></span>
              </button>
              @elseif($post->status == 'publish')
              <button class="btn btn-danger btn-sm" name="status" value="reject">
                <span class="fas fa-ban"></span>
              </button>
              @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection