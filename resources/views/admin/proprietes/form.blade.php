@extends('base')

@section('title', $propriete->exists ? "Éditer un bien" : "Créer un bien")

@section('content')

<h1 class='text-center'>@yield('title')</h1>
<div class="card m-3 p-2">
    <div class="card-title"></div>

    <form class="vstack gap-2" action="{{ route($propriete->exists ? 'admin.propriete.update' : 'admin.propriete.store', $propriete) }}" method="post">
        @csrf
        @method($propriete->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'titre', 'value' => $propriete->titre])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'name' => 'surface', 'label' => 'Surface', 'value' => $propriete->surface])
                @include('shared.input', ['class' => 'col', 'name' => 'type', 'label' => 'Type', 'value' => $propriete->type])
            </div>
        </div>

        @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'label' => 'Description', 'value' => $propriete->description])

        <div class="row">
            @include('shared.input', ['class' => 'col', 'name' => 'nombre_pieces', 'label' => 'Nombre de pièces', 'value' => $propriete->nombre_pieces])
            @include('shared.input', ['class' => 'col', 'name' => 'nombre_chambres', 'label' => 'Nombre de chambres', 'value' => $propriete->nombre_chambres])
            @include('shared.input', ['class' => 'col', 'name' => 'num_etage', 'label' => 'Numéro d\'étage', 'value' => $propriete->num_etage])
        </div>

        <div class="row">
            @include('shared.input', ['class' => 'col', 'name' => 'ville', 'label' => 'Ville', 'value' => $propriete->ville])
            @include('shared.input', ['class' => 'col', 'name' => 'quartier', 'label' => 'Quartier', 'value' => $propriete->quartier])
            @include('shared.input', ['class' => 'col', 'name' => 'prix', 'label' => 'Prix', 'value' => $propriete->prix])
        </div>

        @include('shared.select', [
            'name' => 'options',
            'label' => 'Options',
            'value' => $propriete->options()->pluck('id'),
            'multiple' => true,
            'options' => $allOptions // Ajoutez toutes les options disponibles
        ])

        @include('shared.checkbox', [
            'name' => 'statut',
            'label' => 'Statut (Vendu)',
            'value' => $propriete->statut,
            'options' => [1 => 'Oui', 0 => 'Non'] // Options pour le statut
        ])

        <div>
            <button class="btn btn-primary">
                @if($propriete->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
</div>

@endsection
