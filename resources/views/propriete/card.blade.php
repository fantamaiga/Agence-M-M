<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('propriete.show', ['slug' => $propriete->getSlug(), 'propriete' => $propriete]) }}">{{ $propriete->titre }}</a>
        </h5>
        <p class="card-text">{{ $propriete->surfacer }}m² - {{ $propriete->ville }} ({{ $propriete->quartier }})</p>
        <div class="text-golden fw-bold" style="font-size: 1.4rem;">
            {{ number_format($propriete->prix, 0, '', '') }} fgn
        </div>
    </div>
</div>

