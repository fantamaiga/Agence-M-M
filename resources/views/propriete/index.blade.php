@extends ('base')

@section ('title', 'Tous nos biens')

@section ('content')

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="post" class="container d-flex gap-2">
        @csrf
        <input type="number" placeholder="Surface minimale" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input type="number" placeholder="Nombre de pièces min" class="form-control" name="nombre_pieces" value="{{ $input['nombre_pieces'] ?? '' }}">
        <input type="number" class="form-control" name="prix" placeholder="Budget max" value="{{ $input['prix'] ?? '' }}">
        <input type="text" placeholder="Mot clé" class="form-control" name="titre" value="{{ $input['titre'] ?? '' }}">
        <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
    </form>
</div>

<div class="container">
    <div class="row">
        @forelse($proprietes as $propriete)
            <div class="col-3 mb-4">
                @include('propriete.card')
            </div>
        @empty
            <div class="col">
                Aucun bien ne correspond à votre recherche
            </div>
        @endforelse
    </div>
    <div class="my-4">
        {{ $proprietes->links() }}
    </div>
</div>

@endsection
