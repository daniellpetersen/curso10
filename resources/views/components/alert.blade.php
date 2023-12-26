<div class="alert alert-danger">
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
    @endif<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>