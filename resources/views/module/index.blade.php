@extends('app')
@section('content')
    <div class="d-flex justify-content-between">
        <h1>List Modules</h1>
        <div>
        <a href={{ route('modules.create') }} class="btn btn-primary">Ajouter Module</a>
        </div>
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>abreviation</th>
                <th>nom</th>
                <th>actions</th>
            </tr>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->abreviation }}</td>
                    <td>{{ $module->nom }}</td>
                    <td class="d-flex" style="gap: 10px">
                        <a class="btn btn-warning" href={{ route('modules.edit',['module' => $module->id]) }}>edit</a>
                        <form action={{ route('modules.destroy',['module' => $module->id]) }} method="post">
                            @method('DELETE')
                            <input type="submit" value="supprimer" class="btn btn-danger">
                            @csrf
                        </form>
                        <a class="btn btn-info" href="/notes/{{ $module->id }}">Afficher</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection