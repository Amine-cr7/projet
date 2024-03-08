@extends('app')
@section('content')
    <form action="/notes"  method="POST">
        <h1>Ajouter Notes</h1>
        <label for="">Modules</label>
            <select class="form-control w-25 mb-2" name="module_id" id="">
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}" >{{ $module->abreviation }}</option>         
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
                @foreach ($stagiaires as $stagiaire)
                <tr>
                    <td><input type="text" name="stagiaire_id[]" readonly class="form-control" value="{{ $stagiaire->id }}"></td>
                    <td>{{ $stagiaire->nom }}</td>
                    <td>{{ $stagiaire->prenom }}</td>
                    <td><input type="text" class="form-control" name="note[]"></td>
                </tr>
                @endforeach
            </table>
            <button type="submit" class="btn form-control btn-primary">Enregistrer</button>
        </div>
        </div>
        @csrf
    </form>
@endsection