@php
$type ??= 'text'; // Type du champ (par défaut 'text')
$class ??= null;  // Classe CSS supplémentaire pour le div contenant le champ
$name ??= '';     // Nom du champ
$value ??= '';    // Valeur par défaut du champ
$label ??= ucfirst($name); // Étiquette du champ (par défaut le nom du champ avec la première lettre en majuscule)
@endphp

<div @class (["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == 'textarea')
        <!-- Si le type est textarea, on génère un champ textarea -->
        <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" rows="3">{{ old($name, $value) }}</textarea>
    @else
        <!-- Sinon, on génère un champ input standard -->
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    <!-- Affichage des messages d'erreur pour le champ si nécessaire -->
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
