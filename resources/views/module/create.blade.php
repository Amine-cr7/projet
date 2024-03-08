@extends('app')
@section('content')
    <form action={{ route('modules.store') }} method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de Module</label>
            <input type="text" class="form-control" name="nom" >
        </div>
        <div class="mb-3">
            <label for="abr" class="form-label">Abreviation de Module</label>
            <input type="text" class="form-control" id="abr" name="abr" >
        </div>
        <button type="submit" class="btn form-control  btn-primary">Ajouter</button>
    </form>
@endsection