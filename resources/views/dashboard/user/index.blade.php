@extends('dashboard.master')

@section('title', 'List User')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page">
  <a href="{{route('users.index')}}">User</a>
</li>
<li class="breadcrumb-item active" aria-current="page">List User</li>
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
          <th>Nama</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>1</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @if($user->status == 'active')
            <span class="badge bg-success">
              {{$user->status}}
            </span>
            @else
            <span class="badge bg-danger">
              {{$user->status}}
            </span>
            @endif
          </td>
          <td>
            @if($user->status == "active")
            <form action="{{route('users.update', $user->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button class="btn btn-sm btn-danger" value="banned" name="status">
                <i class="fas fa-ban"></i>
              </button>
            </form>
            @else
            <form action="{{route('users.update', $user->id)}}" method="POST">
              @csrf
              @method('PUT')
              <button class="btn btn-sm btn-success" value="active" name="status">
                <i class="fas fa-check"></i>
              </button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection