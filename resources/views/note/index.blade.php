@extends('app')
@section('content') 

<h1>Gestion des notes</h1>
    <div class="d-flex justify-content-between">
       
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Modules
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              @foreach ($modules as $module)
                  <li><a class="dropdown-item" href="/notes/{{ $module->id }}">{{ $module->abreviation }}</a></li>
              @endforeach
            </ul>
          </div>
        <div>
            <a href="/create" class="btn btn-primary">Ajouter Notes</a>
        </div>
    </div> 
    @if (count($stagiaires) > 0)
    <table class="table table-striped">
        <tr>
            <th>prenom</th>
            <th>nom</th>
            <th>note</th>
            <th>actions</th>
        </tr>
            @foreach ($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->pivot->note }}</td>
                <td class="d-flex " style="gap: 10px">
                    <a class="btn btn-info" href="/notes/{{ $stagiaire->pivot->module_id}}/{{ $stagiaire->id }}">edit</a>
                    <form action="/notes/{{ $stagiaire->pivot->module_id}}/{{ $stagiaire->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        
    </table> 
    @else
       <div class="d-flex flex-column align-items-center justify-content-center" style="height: 70vh;">
            <h1>Veuillez selectionnez un module</h1>
       </div>
    @endif

@endsection