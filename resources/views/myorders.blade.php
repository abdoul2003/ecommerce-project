@extends('master')

@section('content')

<div class="container py-3">
    <h2 class="mb-3">Mes livraisons</h2>
    <table class="table table-bordered">
        <thead>
            <th>NOM</th>
            <th>STATUS</th>
            <th>METHODE DE PAYEMENT</th>
            <th>STATUS DE PAYEMENT</th>
            <th>ADRESSE</th>
            <th>IMAGE</th>
        </thead>
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->address }}</td>
                <td><img src="{{ $order->gallery }}" alt="{{ $order->gallery }}"></td>
            </tr>
        @empty
            <tr>
                <td colspan="6" align="center">Aucune livraison</td colspan="6" align="center">
            </tr>
        @endforelse
    </table>
</div>

@endsection