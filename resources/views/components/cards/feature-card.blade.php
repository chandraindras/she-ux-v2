<div class="card">
    <img class="img-fluid" src="{{ $attributes->get('thumbnail') }}" alt="alternative">
    <div class="card-body">
        <h5 class="card-title">{{ $attributes->get('title') }}</h5>
        <p class="card-text">
            {{ $slot }}
        </p>
    </div>
</div>

