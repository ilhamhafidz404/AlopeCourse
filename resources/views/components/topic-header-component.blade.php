<div class="container">
  <div class="row">
    <div class="col-lg-7 col-md-12">
      <h2 class="display-4 fw-bold">Explore By Topic <span class="series">Laravel</span></h2>
      <hr class="my-4">
      <p>
        Ini adalah panduan yang direkomendasikan melalui Parsinta untuk keterampilan yang diberikan.
      </p>
      <p>
        Setiap bagian memberikan tips dan teknik baru yang dibangun berdasarkan apa yang telah Anda pelajari, dan jangan ragu untuk terus memperbarui kemampuan sesuai keinginan Anda.
      </p>
      <form action="" class="mt-5">
        <ul class="d-flex p-0">
          @foreach($tags as $tag)
          <li class="me-2">
            <button class="btn btn-transparent btn-lg d-flex align-items-center justify-content-center" value="{{$tag->slug}}" style="border-color: {{$tag->badge}} !important;" name="tag">
              <i class="fab fa-{{$tag->icon}}"></i>
            </button>
          </li>
          @endforeach
        </ul>
      </form>
    </div>
  </div>
</div>