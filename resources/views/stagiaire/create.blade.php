@extends('app')
@section('content')
    <form action={{ route('stagiaires.store') }} method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" >
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" >
        </div>
        <button type="submit" class="btn form-control  btn-primary">Ajouter</button>
    </form>
@endsection