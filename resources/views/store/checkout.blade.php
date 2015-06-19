@extends('store.store')

@section('content')
    <div class="col-sm9 padding-right">

        @if($cart == 'empty')
        <h3>:( carrinho vazio!</h3>
        @else
        <h3>Pedido realizado com sucesso!</h3>

        <p>O Pedido #{{ $order->id }} foi recebido com sucesso!</p>
        @endif
    </div>
@stop