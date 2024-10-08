@extends ('base')

@section('title', $propriete->exists ? "Editer un bien" : "Créer un bien")

@section('content')

<h1 class='text-center'>@yield('title')</h1>
<div class="card m-3 p-2">
    <div class="card-title">

    </div>

<form class="vstack gap-2" action="{{ route($propriete->exists ? 'admin.propriete.update' :  'admin.propriete.store', $propriete) }}" method="post">

    @csrf
    @method($propriete->exists ? 'put' : 'post')

    <div class="row">
       @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' =>'titre', 'value' =>  $propriete->titre])
       <div class="col row">
             @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $propriete->surface])
             @include('shared.input', ['class' => 'col', 'name' => 'type', 'label' => 'Type', 'value' => $propriete->type])

        </div>
    </div>
    @include('shared.input', ['type' => 'textarea',  'name' =>'description', 'value' => $propriete->description])
    <div class="row">
        @include('shared.input', ['class' => 'col', 'name' => 'nombre_pieces', 'label' => 'Pièces', 'value' => $propriete->nombre_pieces])
        @include('shared.input', ['class' => 'col', 'name' => 'nombre_chambres', 'label' => 'Chambres', 'value' => $propriete->nombre_chambres])
        @include('shared.input', ['class' => 'col', 'name' => 'num_etage', 'label' => 'Etage', 'value' => $propriete->num_etage])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'name' => 'ville', 'label' => 'Ville', 'value' => $propriete->ville])
        @include('shared.input', ['class' => 'col', 'name' => 'quartier', 'label' => 'Quartier', 'value' => $propriete->quartier])
        @include('shared.input', ['class' => 'col', 'name' => 'prix', 'label' => 'Prix', 'value' => $propriete->prix])

    </div>  
        @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $propriete->options()->pluck('id'), 'multiple' => true])
        @include('shared.checkbox', ['name' => 'statut', 'label' => 'Vendu', 'value' => $propriete->statut, 'options' => $options])


    <div>
        <button class="btn btn-primary">
            @if($propriete->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
    </div>
</form>

@endsection