@extends('admin.master')

@section('title', 'Invoice')

@section('breadcrumb')
<li class="breadcrumb-item active">
  Invoice
</li>
@endsection

@section('header-button')
<div class="btn-group">
  <button type="button" class="btn btn-neutral btn-sm" onclick="changeLook()">
    Change Look
  </button>
  {{-- <form action="{{ route('invoice.format') }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger btn-sm text-white ms-1">
      <i class="fas fa-trash-alt me-1"></i>
      Format invoice
    </button>
  </form> --}}
</div>
@endsection

@section('content')
<div class="card p-3">
    <div class="table-responsive d-none" id="table">
      <table class="table align-items-center table-flush" id="myTable">
        <thead class="thead-light">
          <tr>
            <th>Invoice</th>
            <th>Username</th>
            <th>To</th>
            <th>Dikirim Pada</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($invoices as $invoice)
              <tr>
                  <td>
                    <a href="{{asset('storage/proof/'.$invoice->proof)}}" data-lightbox="image-1" data-title="{{$invoice->invoice ." : ". $invoice->user->username}}">
                        <img src="{{asset('storage/proof/'.$invoice->proof)}}" class="img-thumbnail me-2" width="50px">
                    </a>
                    <span class="fw-bold">
                        {{ $invoice->invoice }}
                    </span>
                  </td>
                  <td>{{ $invoice->user->username }}</td>
                  <td>{{ $invoice->to }}</td>
                  <td>{{ $invoice->sent_at }}</td>
                  <td>
                    <div class="dropdown">
                        <button class="btn btn-neutral" data-bs-toggle="dropdown">
                          <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="grid text-center" id="masonry">
      @foreach ($invoices as $invoice)
        <div class="grid-item">
          <figure class="mc-item mc-item--slideInUp">
            <a href="{{asset('storage/proof/'.$invoice->proof)}}" data-lightbox="image-1" data-title="{{$invoice->invoice ." : ". $invoice->sent_at}}" class="mc-item__image">
              <img src="{{asset('storage/proof/'.$invoice->proof)}}" class="img-thumbnail" width="200px">
            </a>
            <figcaption class="mc-item__caption bg-gradient-purple p-2">
              <small class="text-white">
                Ke {{ $invoice->to }}, pada {{ $invoice->sent_at }} dari {{ $invoice->bank_name }}
              </small>
            </figcaption>
          </figure>
        </div>              
      @endforeach
    </div>    
</div>
@endsection

@section('script')
  <script src="{{asset('js/mocassin.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script>
    function changeLook() {
      document.getElementById("masonry").classList.toggle('d-none')
      document.getElementById("table").classList.toggle('d-none')
    }

    var elem = document.querySelector('.grid');
    var msnry = new Masonry( elem, {
      itemSelector: '.grid-item',
      columnWidth: 200
    });
  </script>
@endsection

@section('style')
  <link rel="stylesheet" href="{{asset('css/mocassin.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection