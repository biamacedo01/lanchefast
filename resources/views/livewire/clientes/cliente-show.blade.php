<div class="container py-5">
    <h2 class="text-center text-danger fw-bold mb-4">Detalhes do Cliente</h2>

    @if (session()->has('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    @if ($cliente)
        <div class="card shadow-lg rounded-4 p-4" style="background-color: #f7c0d8; max-width: 800px; margin: auto;">
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
            <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
            <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
            <p><strong>Email:</strong> {{ $cliente->email }}</p>

            <a href="{{ route('clientes.index') }}" class="btn btn-light">Voltar</a>
        </div>
    @endif
</div>
