@extends('admin.master')

@section('title', 'Token')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">
  Token
</li>
@endsection

@section('header-button')
<div class="btn-group">
  <button class="btn btn-sm btn-neutral me-2 changeToken">Change Look</button>
  <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Redeem</a>
</div>
@endsection

@section('content')
<div class="card p-4 tokenGrid tokenList show">
  <div class="row">
    @foreach($tokens as $token)
      <div class="col-md-4">
        <div class="card shadow">
          <div class="row">
            @if($token->type == 'platinum')
            <div class="col-4 bg-gradient-primary">
            </div>
            @elseif($token->type == 'gold')
            <div class="col-4 bg-gradient-warning">
            </div>
            @elseif($token->type == 'silver')
            <div class="col-4 bg-gradient-success">
            </div>
            @endif
            <div class="col-8 py-2 position-relative">
              <h6 class="text-uppercase mb-0">
                {{$token->token}}
              </h6>
              <small class="text-muted">
                {{$token->type}}
              </small>
              <br>
              <div class="position-absolute" style="top:-5px; right: 25px">
                <form action="{{route('token.destroy', $token->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="dropdown">
                    <button class="btn btn-neutral btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    </button>
                    <div class="dropdown-menu">
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#giveTokenBox{{$token->id}}">Give Token</button> 
                      <button class="dropdown-item" type="submit">
                        Hapus
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              @if($token->isOrder)
              <small class="text-warning mt-3">
                Sudah di order
              </small>
              @elseif($token->user_id == 0)
              <small class="text-danger mt-3">
                Belum digunakan
              </small>
              @else
              <small class="text-success">
                Digunakan oleh {{$token->user->name}}
              </small>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="giveTokenBox{{$token->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Give Token {{$token->token}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('token.message')}}">
              <div class="modal-body">
                <div class="form-group mb-3">
                  <label for="token" class="form-label">
                    Token
                  </label>
                  <input type="hidden" name="token" id="token" readonly value="{{$token->id}}">
                  <input type="text" readonly class="form-control" value="{{$token->token}}">
                </div>
                <div class="form-group my-3">
                  <label for="user" class="form-label">
                    Pilih User
                  </label>
                  <select name="user" id="type" class="form-select">
                    <option value="0" hidden selected>Pilih user</option>
                    @foreach($users as $user)
                      @if($user->hasRole('active'))
                        <option value="{{$user->username}}">{{$user->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="gift" value="1">Give Token</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<div class="card p-3 tokenTable tokenList">
  <div class="table-responsive">
    <table class="table align-items-center table-flush" id="myTable">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Token</th>
          <th>Type</th>
          <th>status</th>
          <th><i class="fas fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        @foreach($tokens as $token)
        <tr>
          <td>{{$i++}}</td>
          <td>
            {{$token->token}}
          </td>
          <td>{{$token->type}}</td>
          <td>
            @if($token->isOrder)
              <small class="text-warning fw-bold mt-3">
                Sudah di order
              </small>
            @elseif($token->user_id == 0)
              <small class="text-danger fw-bold mt-3">
                Belum digunakan
              </small>
            @else
              <small class="text-success fw-bold">
                Digunakan oleh {{$token->user->name}}
              </small>
            @endif  
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-transparent" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-ellipsis-v"></i>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#giveToken{{$token->id}}">Give Token</button> 
                </li>
                <li>
                  <form action="{{route('token.destroy', $token->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item" onclick="return confirm('Yakin mau menghapus token ini?')">Hapus</button>
                  </form>
                </li>
              </ul>
            </div>
          </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="giveToken{{$token->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Give Token {{$token->token}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{route('token.message')}}">
                <div class="modal-body">
                  <div class="form-group mb-3">
                    <label for="token" class="form-label">
                      Token
                    </label>
                    <input type="hidden" name="token" id="token" readonly value="{{$token->id}}">
                    <input type="text" readonly class="form-control" value="{{$token->token}}">
                  </div>
                  <div class="form-group my-3">
                    <label for="user" class="form-label">
                      Pilih User
                    </label>
                    <select name="user" id="type" class="form-select">
                      <option value="0" hidden selected>Pilih user</option>
                      @foreach($users as $user)
                        @if($user->hasRole('active'))
                          <option value="{{$user->username}}">{{$user->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="gift" value="1">Give Token</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('token.store')}}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Redeem Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
              <option value="0" selected>pilih user</option>
              @foreach($users as $user)
                @if($user->hasRole('active'))
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Generate</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const tokenGrid= document.querySelector('.tokenGrid');
  const tokenTable= document.querySelector('.tokenTable');
  const changeToken= document.querySelector('.changeToken');
  changeToken.addEventListener('click', ()=>{
    tokenTable.classList.toggle('show');
    tokenGrid.classList.toggle('show');
  });
  // tokenList.forEach(tokens => {
  //   tokens.addEventListener('click', ()=>{
  //     tokenTable.classList.toggle('show');
  //     tokenGrid.classList.toggle('show');
  //   });
  // });

  const switchGiven = document.querySelector('#switchGiven');
  const giveUser = document.querySelector('#giveUser');

  switchGiven.addEventListener('click', ()=> {
    giveUser.classList.toggle('show')
  })
</script>
@endsection