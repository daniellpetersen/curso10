<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('supports.store') }}" method="POST">
    @include('Admin.Supports.Partials.form')
</form>    