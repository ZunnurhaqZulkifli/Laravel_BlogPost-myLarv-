<p class="mt-2 mb-0">
    @foreach ($categories as $category)
        <a href="{{ route('products.categories') }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">{{ $category->name }}</a>
    @endforeach
</p>