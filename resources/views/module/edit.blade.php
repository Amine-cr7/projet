@extends('app')
@section('content')
    <form action={{ route('modules.update',['module' => $module->id]) }} method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de Module</label>
            <input type="text" value="{{ $module->nom }}" class="form-control" name="nom" >
        </div>
        <div class="mb-3">
            <label for="abr" class="form-label">Abreviation de Module</label>
            <input type="text" value="{{ $module->abreviation }}" class="form-control" id="abr" name="abr" >
        </div>
        <button type="submit" class="btn form-control  btn-primary">Edit</button>
    </form>
@endsection