<div class="list-group">
    <a href="{{route('profile.edit', auth()->user()->username)}}" class="list-group-item list-group-item-action text-purple">
      <i class="fas fa-cog me-3"></i>
      Edit Profile
    </a>
    <a href="{{route('invoice')}}" class="list-group-item list-group-item-action text-yellow">
      <i class="fas fa-rocket me-3"></i>
      Beli Paket
    </a>
    <a href="{{route('redeem')}}" class="list-group-item list-group-item-action text-success">
      <i class="fas fa-ticket-alt me-3"></i>
      Reedem Token
    </a>
    <a href="{{route('message')}}" class="list-group-item list-group-item-action text-primary ">
      <i class="fas fa-inbox me-3"></i>
      Message
    </a>
    <a class="list-group-item list-group-item-action text-warning" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt me-4"></i>
      {{ __('Logout') }}
    </a>
    <a href="{{route('iam_out')}}" onclick="return confirm('Yakin anda ingin menghapus akun anda?')" class="list-group-item list-group-item-action text-danger">
      <i class="fas fa-trash me-3"></i>
      Hapus Akun
    </a>
</div>