@extends('master')

@section('content')

<div class="container py-3">
    <a href="/" class="btn btn-primary mb-2">Retour</a>
    <h2 class="mb-3">Panier
        @if (count($products) > 0)
        <a href="ordernow" class="btn btn-success float-end">Régler la facture</a>
        @endif
    </h2>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4">
                <a href="/detail/{{ $product->id }}"></a><img src="{{ $product->gallery }}" alt="{{ $product->gallery }}">
            </div>
            <div class="col-md-8">
                <p>{{ $product->name }}</p>
                <p>{{ $product->description }}</p>
                <a href="/removecart/{{ $product->cart_id }}" class="btn btn-warning mb-3">Retirer du panier</a>
            </div>
            <hr>
        @empty
            <div class="col-md-12">
                <h3>Panier vide</h3>
            </div>
        @endforelse
    </div>
</div>

@endsection