@extends ('base')
@section ('title', $propriete->titre)

@section ('content')
<div class="container mt-4">
<h1>{{$propriete->title}}</h1>
<h2>{{$propriete->Nombre }}pièces - {{$propriete->surface}}m²</h2>

<div class="text-golden fw-bold" style="font-size: 4rem;">
    {{ number_format($propriete->prix, thousands_separator: '') }}fgn   
</div>

<hr>

<div class="mt-4">
    <h4>Intéréssé par ce bien? </h4>

    @include('shared.flash')

    <form action="{{ route('propriete.contact', $propriete) }}" method="post" class="vstack gap-3">
      @csrf
<div class="row">
@include('shared.input', ['class' => 'col', 'name' => 'prenom', 'label' => 'Prénom']) 

@include('shared.input', ['class' => 'col', 'name' => 'nom', 'label' => 'Nom'])
</div>

<div class="row">
@include('shared.input', ['class' => 'col', 'name' => 'telephone', 'label' => 'Téléphone']) 

@include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
</div>

@include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre message'])

      <div>
      <button class="btn btn-gold">Nous contacter</button>

      </div>
    </form>
</div> 
    <div class="mt-4">
       <p>{{nl2br($propriete->description)}}</p>
       <div class="row">
         <div class="col-8">
            <h2>Caractéristique</h2>
            <table class="teble table-striped">
                <tr>
                    <td>Surface habitable</td>
                    <td>{{$propriete->surface}} m²</td>
                </tr>
                <tr>
                    <td>Pièces</td>
                    <td>{{$propriete->nombre_pieces}}</td>
                </tr>
                <tr>
                    <td>Chambres</td>
                    <td>{{$propriete->nombre_chambres}}</td>
                </tr>
                <tr>
                    <td>Etage</td>
                    <td>{{$propriete->num_etage ?: 'Rez de chaussé'}}</td>
                </tr>
                <tr>
                    <td>Localisation</td>

                    <td>
                        {{$propriete->adresse}} <br/>
                        {{$propriete->ville}} ({{$propriete->quartier}})

                    </td>
                </tr>
            </table>
         </div>
         <div class="col-4">
            <h2>Spécificités</h2>
            <ul class="list-group">
                @foreach($propriete->options as $option)
                    <li class="list-group-item">{{$option->nom}}</li>
                @endforeach
            </ul>
        </div>
</div>  
    