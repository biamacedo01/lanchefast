@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar Cliente</h2>

   
    @livewire('cliente-edit', ['id' => $id])
</div>
@endsection
