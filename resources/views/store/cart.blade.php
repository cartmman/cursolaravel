@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed" id="table">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="price">Quantidade<td>
                        <td class="price">Total<td>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr class="product">

                            <input id="id" type="hidden" value="{{ $k }}"/>

                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id'=>$k]) }}">Imagem</a>
                            </td>

                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a> </h4>
                                <p>Código: {{ $k }}</p>
                            </td>

                            <td class="cart_price" data-price="{{ $item['price'] }}">
                               R$ {{ $item['price'] }}
                            </td>

                            <td class="cart_quantity">
                                <input type="text" id="qtd" value="{{ $item['qtd'] }}" size="5" onkeyup="getPrice()" />
                            </td>

                            <td></td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                R$ {{ $item['price'] * $item['qtd'] }}
                                </p>
                            </td>

                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <p>Nenhum item no carrinho!</p>
                            </td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="7">
                            <div class="pull-right">
                                <span id="total" style="margin-right:135px">
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>
                                <a href="#" class="btn btn-success">Fechar pedido</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop

@section('personal-js')
    <script type="text/javascript">

        function getPrice(){
            updateTotal();
        }

        var updateTotal = function() {
            var sum = 0;

            $('.product').each(function() {
                var id       = $('#id', this).val();
                var price    = $('.cart_price', this).data('price');
                var qtd      = $('#qtd', this).val();
                var subtotal = price*qtd;

                subtotal = subtotal.toFixed(2);
                sum     += Number(subtotal);

                $('.cart_total_price', this).html(subtotal);
                $('#total').html(sum.toFixed(2));

                $.get( "/cart/update/"+id+"/"+qtd);
            });
        };

    </script>
@stop
