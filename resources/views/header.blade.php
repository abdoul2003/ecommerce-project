<?php
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="/">E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="menu"></span>
      <span class="menu"></span>
      <span class="menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/myorders">Livraisons</a>
        </li>
        <form class="d-flex" action="/search" method="POST" role="search">
            @csrf

            <input class="form-control me-2" name="query" type="search" placeholder="Rechercher" aria-label="Search" required>
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Session::has('user'))
          <li class="dropdown">
            <a href="#" data-bs-toggle="dropdown" class="panier text-light dropdown-toggle">{{ Session::get('user')->name }}
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu w-20">
              <li><a href="/logout" class="panier" style="color: black;">Déconnecter</a></li>
            </ul>
          </li>
        @else
          <li><a href="/login" class="btn btn-outline-info">Se connecter</a></li>
          &nbsp;&nbsp;
          <li><a href="/register" class="btn btn-outline-primary">S'inscrire</a></li>
        @endif
        &nbsp;&nbsp;
        <li><a href="/cartlist" class="text-light panier">Panier({{ $total }})</a></li>
      </ul>
    </div>
  </div>
</nav>