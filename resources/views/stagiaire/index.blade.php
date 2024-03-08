@extends('app')
@section('content')
    <div class="d-flex justify-content-between">
        <h1>List Stagiaires</h1>
        <div>
        <a href="{{ route('stagiaires.create') }}" class="btn  btn-primary">Ajouter Stagiaire</a>
        </div>
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>actions</th>
            </tr>
            @foreach ($stagiaires as $stagiaire)
                <tr>
                    <td>{{ $stagiaire->id }}</td>
                    <td>{{ $stagiaire->prenom }}</td>
                    <td>{{ $stagiaire->nom }}</td>
                    <td class="d-flex" style="gap: 10px">
                        <a class="btn  btn-warning" href={{ route('stagiaires.edit',['stagiaire' => $stagiaire->id]) }}>edit</a>
                        <form action={{ route('stagiaires.destroy',['stagiaire' => $stagiaire->id]) }} method="post">
                            @method('DELETE')
                            <input type="submit" value="supprimer" class="btn btn-danger">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection