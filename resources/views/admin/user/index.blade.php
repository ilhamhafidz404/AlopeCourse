@extends('admin.master')

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
  <div class="table-responsive">
    <table class="table align-items-center table-flush" id="myTable">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        @foreach($users as $user)
          @if (!$user->hasRole('admin'))
          <tr>
            <td>{{$i++}}</td>
            <td>
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                  <img alt="Image placeholder" src="{{asset('storage/profile/'.$user->profile)}}">
                </a>
                <div class="media-body">
                  <span class="name mb-0 text-sm">
                    {{$user->username}}
                  </span>
                </div>
              </div>
            </td>
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
              <form class="d-inline" action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-danger" value="banned" name="status">
                  <i class="fas fa-ban"></i>
                </button>
              </form>
              @else
              <form class="d-inline" action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-success" value="active" name="status">
                  <i class="fas fa-check"></i>
                </button>
              </form>
              @endif
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{$user->username}}">
                <span class="fas fa-gift"></span>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="{{$user->username}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Kirim Token ke {{$user->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('token.message')}}">
                      <div class="modal-body">
                        <div class="form-group mb-3">
                          <label for="user" class="form-label">
                            User tujuan
                          </label>
                          <input type="text" class="form-control" readonly value="{{$user->username}}" name="user" id="user">
                        </div>

                        @if (!$tokens->count() == 0)
                          <div class="form-group">
                            <label for="tokeb" class="form-label">
                              Pilih Kode Token
                            </label>
                            <select name="token" id="token" class="form-select">
                                @foreach($tokens as $token)
                                <option value="{{$token->id}}">
                                  {{$token->token}}
                                  ({{$token->type}})
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        @else
                          <div class="form-group">
                            <label for="tokeb" class="form-label">
                              Token tidak tersedia, <a href="{{route('token.index')}}">Generate token baru</a>
                            </label>
                          </div>
                        @endif
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="gift" value="1" >Give</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection