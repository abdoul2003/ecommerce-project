@extends('master')

@section('content')

<div class="container custom-product">

    <div class="row mt-3">
        @forelse ($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <img src="{{ $product->gallery }}" alt="{{ $product->gallery }}">
                    </div>
                    <div class="card-body">
                        <p><span>{{ $product->price }}</span> FCFA</p>
                        <p class="text-lead">{{ $product->description }}</p>
                        <div class="mt-2">
                            <a href="#" class="btn btn-primary">Ajouter au panier</a>
                            &nbsp;&nbsp;
                            <a href="/detail/{{ $product->id }}" class="btn btn-info">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <h4>Ce produit n'existe pas</h4>
            </div>
        @endforelse
    </div>
   
</div>

@endsection