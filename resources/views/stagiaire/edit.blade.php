@extends('app')
@section('content')
    <form action={{ route('stagiaires.update',['stagiaire' => $stagiaire->id]) }} method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom </label>
            <input type="text" value="{{ $stagiaire->nom }}" class="form-control" name="nom" >
        </div>
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text"  value="{{ $stagiaire->prenom }}" class="form-control" name="prenom" >
        </div>
        <button type="submit" class="btn form-control  btn-primary">Edit</button>
    </form>
@endsection