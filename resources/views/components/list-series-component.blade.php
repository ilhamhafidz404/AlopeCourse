<div class="p-4">
    <h4 class="fst-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        @foreach ($categories as $category)
            <li>
                <a href="#">{{$category->nama}}</a>
            </li>
        @endforeach
    </ol>
</div>