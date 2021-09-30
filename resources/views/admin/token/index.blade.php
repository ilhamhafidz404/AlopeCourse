@extends('admin.master')


@section('header-button')
<div class="btn-group">
  <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Redeem</a>
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
  <div class="row">
    @foreach($tokens as $token)
    <div class="col-md-4">
      <div class="card p-3">
        {{$token->token}}
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Redeem Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('token.store')}}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="token" class="form-label">
              Token
            </label>
            <input type="text" name="token" id="token" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="type" class="form-label">
              Type
            </label>
            <select name="type" id="type" class="form-select">
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
            </select>
          </div>
          <div class="form-group mb-3 ms-3 mt-5">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="switchGiven">
              <label class="form-check-label" for="switchGiven">Hadiahkan kepada User</label>
            </div>
          </div>
          <div class="form-group my-3" id="giveUser">
            <label for="user" class="form-label">
              Pilih User
            </label>
            <select name="user" id="type" class="form-select">
              @foreach($users as $user)
              @if($user->hasRole('active'))
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <button class="btn btn-primary">G</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  const switchGiven = document.querySelector('#switchGiven');
  const giveUser = document.querySelector('#giveUser');

  switchGiven.addEventListener('click', ()=> {
    giveUser.classList.toggle('show')
  })
</script>
@endsection