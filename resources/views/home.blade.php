@extends('layouts.masteradmin')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
                <h1>Agence Immobilière M&M</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime excepturi praesentium dolores ut sequi, unde mollitia consectetur 
                ullam accusantium, ad voluptatibus, sapiente voluptates cum facilis quasi dicta. Doloribus, quibusdam earum.</p>
            </div>
        </div>
        <div class="container">
            <h2>Nos derniers biens</h2>
            <div class="row">
                @foreach($proprietes as $propriete)
                    <div class="col">
                        @include('propriete.card')
                    </div>
                @endforeach
            </div>
        </div>
    
@endsection
