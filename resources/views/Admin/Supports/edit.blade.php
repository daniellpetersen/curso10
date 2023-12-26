<h1>Dúvida: {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', ['support' => $support->id]) }}" method="post">
    @method('PUT')
    @include('Admin.Supports.Partials.form', [
        'support' => $support
    ])
</form>
