@extends('base')
@section('title', 'Toutes les options')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{ $option->nom }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.option.edit', $option->id) }}" class="btn btn-primary">Éditer</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('admin.option.destroy', $option->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette option ?');">
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

<!-- Pagination -->
{{ $options->links() }}
@endsection
