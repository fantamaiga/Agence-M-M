@extends('base')
@section('title')Gestion des biens @endsection
@section('content')
<div class="d-flex justify-content-between align-items-center">
    
    <a href="{{ route('admin.propriete.create') }}" class="btn btn-success">Ajouter un bien</a>
</div>

<div class="card">
    <div class="card-title">

    </div>
    <div class="card-body">
    <table class="table table-striped">
<thead>       
    <tr>
        <th>Titre</th>
        <th>Surface</th>
        <th>Prix</th>
        <th>Ville</th>
        <th class="text-end">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($proprietes as $propriete)
        <tr>
            <td>{{ $propriete->titre }}</td>
            <td>{{ $propriete->surface }} m²</td>
            <td>{{ number_format($propriete->prix, 0, ',', ' ') }} €</td> 
            <td>{{ $propriete->ville }}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route('admin.propriete.edit', $propriete->id) }}" class="btn btn-primary">Éditer</a>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('admin.propriete.destroy', $propriete->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
    </div>
</div>

<!-- Pagination -->
{{ $proprietes->links() }}

@endsection
