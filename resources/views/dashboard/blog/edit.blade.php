@extends('dashboard.master')
@section('content')
<div class="card p-3">
  <form action="{{route('blog.update', $blog->id)}}" method="POST">
    @csrf
    @method("PUT")
    {{$blog->judul}}
    <input type="text" class="form-control" value="{{$blog->judul}}" name="judul">
    <input type="text" class="form-control" value="{{$blog->slug}}" name="slug" readonly>
    <input type="text" name="thumbnail" value="{{$blog->thumbnail}}">
    <select name="category" id="">
      <option value="{{$blog->category->id}}" hidden selected>
        {{$blog->category->nama}}
      </option>
      @foreach($categories as $category)
      <option value="{{$category->id}}">
        {{$category->nama}}
      </option>
      @endforeach
    </select>
    <textarea class="form-control" id="editodr" rows="4" name="content">
      {{$blog->content}}
    </textarea>
    <button class="btn btn-primary" name="status" value="upload">
      Upload
    </button>
    <button class="btn btn-primary" value="draff">Simpan sebagai Draff</button>
  </form>
</div>

@endsection