@extends('master')

@section('content')

<div class="container py-3">
    <div class="row d-flex align-items-center">
        <div class="col-sm-4">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
        <div class="col-sm-8">
            <h3><-- Entrez vos informations pour créer un compte</h3>
        </div>
    </div>
</div>

@endsection