@extends('store.store')

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!-- items -->
            <h2 class="title text-center">Produtos da Tag: {{ $tag->name }}</h2>

            @include('store.partial.product', ['products' => $products])

        </div><!--items-->
    </div>
@stop