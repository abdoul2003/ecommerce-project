@extends('master')

@section('content')

<div class="container py-3">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Total</th>
                <td>{{ $total }} FCFA</td>
            </tr>
            <tr>
                <th>Frais de livraison</th>
                <td>1000 FCFA</td>
            </tr>
            <tr>
                <th>Total à payer</th>
                <td>{{$total+1000}} FCFA</td>
            </tr>
        </tbody>
    </table>
    <div>
        <form action="/orderplace" method="post">
            @csrf
            <div class="form-group">
                <textarea name="address" class="form-control" id="" placeholder="Entrez votre adresse" cols="6" rows="2" required></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="" class="form-label mb-2">Méthodes de payements:</label><br>
                <input type="radio" value="espèce" name="payment" id=""> <span>TMooney</span><br>
                <input type="radio" value="espèce" name="payment" id=""> <span>Flooz</span><br>
                <input type="radio" value="espèce" name="payment" id=""> <span>Carte bancaire</span>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-danger">Régler</button>
            </div>
        </form>
    </div>
</div>

@endsection