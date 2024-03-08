@extends('app')
@section('content')
    <form action="/notes/{{ $note->id }}/{{ $stagiaire->id }}"  method="POST">
        @method('PUT')
        <h1>Ajouter Notes</h1>
        <label for="">Modules</label>
            <select class="form-control w-25 mb-2" name="module_id" id="">
                @foreach ($modules as $mod)
                    <option value="{{ $mod->id }}"
                        {{ $mod->id == $note->id ? 'selected' : '' }}
                    >{{ $mod->abreviation }}</option>
                @endforeach
            </select>
        <div class="d-flex flex-column align-items-center justify-content-center ">
            <div class="w-75">
            <table class="table">
                <tr>
                    <td class="w-25" >id</td>
                    <td class="w-25">nom</td>
                    <td class="w-25">prenom</td>
                    <td class="w-25">note</td>
                </tr>
                <tr>
                    <td>{{ $stagiaire->id }}</td>
                    <td>{{ $stagiaire->nom }}</td>
                    <td>{{ $stagiaire->prenom }}</td>
                    <td><input type="text" name="note" value="{{ $note->pivot->note }}"></td>
                </tr>
            </table>
            <button type="submit" class="btn form-control btn-primary">Enregistrer</button>
        </div>
        </div>
        @csrf
    </form>
@endsection