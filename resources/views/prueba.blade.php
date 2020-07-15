<p>listado de pedidos</p>
@foreach(auth()->user()->order as $order)
    <p> {{ $order->status }} </p>
@endforeach
    