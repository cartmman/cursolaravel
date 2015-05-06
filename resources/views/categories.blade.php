<h1>Categories</h1>

<ul>
    @foreach($c as $category)
        <li>{{ $category->name }} - {{ $category->description }}</li>
    @endforeach
</ul>