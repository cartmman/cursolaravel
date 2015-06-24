@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Order: {{ $order->id }}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['orders.update', $order->id],'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('products', 'Products:') !!}
            <ul>
                @foreach($order->items as $item)
                    <li><h4>{{ $item->qtd }} x {{ $item->product->name }} - {{ $item->price }}</h4></li>
                @endforeach
            </ul>
        </div>

        <div class="form-group">
            {!! Form::label('total','Total:') !!}
            {!! Form::text('total', $order->total, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group">
            <label for="status"></label>
            <select class="form-control" name="status">
                <option value="0">Pedido realizado</option>
                <option value="1">Pagamento confirmado</option>
                <option value="2">Em separação</option>
                <option value="3">Pedido enviado</option>
                <option value="4">Finalizado</option>
            </select>
         </div>

        <div class="form-group">
            {!! Form::submit('Save Order', ['class'=>'btn btn-primary']) !!}
            {!! link_to(route('orders'), 'Back to orders', ['class' => 'btn btn-default']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

