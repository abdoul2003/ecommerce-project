@extends('master')

@section('content')

<div class="container">
    <a href="/" class="btn btn-success mt-3">Retour</a>
    <div class="row mt-5 mb-3">
        <div class="col-md-6">
            <img src="{{ $product->gallery }}" alt="{{ $product->gallery }}">
        </div>
        <div class="col-md-6">
            <h3 class="text-lead mb-2">Nom</h3>
            <h5>{{ $product->name }}</h5>
            <h3 class="text-lead mb-2">Prix</h3>
            <h5>{{ $product->price }} FCFA</h5>
            <h3 class="text-lead mb-2">Description</h3>
            <h5>{{ $product->description }}</h5>
            <h3 class="text-lead mb-2">Catégorie</h3>
            <h5>{{ $product->category }}</h5>
        </div>
    </div>
    <form action="/add_to_cart" method="post">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button class="btn btn-outline-primary mt-2" type="submit">Ajouter au panier</button>
        
    </form>
</div>

@endsection