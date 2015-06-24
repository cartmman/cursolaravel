@extends('store.store')

@section('content')
    <div class="col-sm9 padding-right">

        <h3>Meus pedidos</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul>
                    @foreach($order->items as $item)
                          <li>{{ $item->product->name }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>{{ $order->total }}</td>

                @if ($order->status == 0)
                    <td>Pedido realizado</td>
                @elseif ($order->status == 1)
                    <td>Pagamento confirmado</td>
                @elseif ($order->status == 2)
                    <td>Em separação</td>
                @elseif ($order->status == 3)
                    <td>Pedido enviado</td>
                @elseif ($order->status == 4)
                    <td>Finalizado</td>
                @endif

            </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@stop