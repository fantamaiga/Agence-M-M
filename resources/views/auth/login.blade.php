@extends('base')

@section('title', 'Se connecter')

@section('content')
<div class="mt-4 container">
    <h1 class="text-center">@yield('title')</h1>

    @include('shared.flash')

    <form method="post" action="{{ route('login') }}" class="mt-4">
        @csrf 

        <div class="row mb-3">
            @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
        </div>

        <div class="row mb-3">
            @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>
@endsection
