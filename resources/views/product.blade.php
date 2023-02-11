@extends('master')

@section('content')

<div class="container custom-product">

    <div class="row mt-3">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <img src="{{ $product->gallery }}" alt="{{ $product->gallery }}">
                    </div>
                    <div class="card-body">
                        <p><span>{{ $product->price }}</span> FCFA</p>
                        <p class="text-lead">{{ $product->description }}</p>
                        <div class="mt-2">
                            <form action="/add_to_cart" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-primary" type="submit">Ajouter au panier</button>
                                &nbsp;
                                <a href="/detail/{{ $product->id }}" class="btn btn-info">Voir plus</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   
</div>

@endsection