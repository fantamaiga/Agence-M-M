@php
  $class ??= null;
@endphp

<div @class(['form-check form-switch', $class])>
    <!-- Champ caché pour envoyer la valeur 0 quand la case n'est pas cochée -->
    <input type="hidden" value="0" name="{{ $name }}">

    <!-- Champ checkbox switch -->
    <input 
        type="checkbox" 
        value="1" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="form-check-input @error($name) is-invalid @enderror" 
        role="switch" 
        @checked(old($name, $value ?? false))
    >

    <!-- Label du switch -->
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>

    <!-- Message d'erreur -->
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
