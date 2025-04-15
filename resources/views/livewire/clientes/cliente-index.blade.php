<div class="min-vh-100 d-flex flex-column justify-content-start align-items-center" style="background-color: #f7c0d8; padding-top: 60px; padding-bottom: 40px;">

    <!-- Título -->
    <h2 class="text-white fw-bold mb-4" style="text-transform: uppercase;">
        Lista de Clientes
    </h2>

    <!-- Controles -->
    <div class="d-flex justify-content-between flex-wrap gap-3 mb-3" style="max-width: 900px; width: 100%;">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Buscar clientes...">
        
        <select wire:model="perPage" class="form-select" style="max-width: 200px;">
            <option value="10">10 por página</option>
            <option value="25">25 por página</option>
            <option value="50">50 por página</option>
            <option value="100">100 por página</option>
        </select>
        
        <a href="{{ route('clientes.create') }}" class="btn btn-outline-light fw-bold">
            <i class="bi bi-plus-circle me-2"></i>Novo Cliente
        </a>
    </div>

    <!-- Mensagem de sucesso -->
    @if (session()->has('message'))
        <div class="alert alert-success text-center fw-semibold w-100" style="max-width: 900px;">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tabela -->
    <div class="table-responsive" style="max-width: 900px; width: 100%;">
        <table class="table table-striped table-bordered align-middle text-center bg-white rounded-3 overflow-hidden">
            <thead class="table-dark">
                <tr>
                    <th class="text-white">ID</th>
                    <th class="text-white">Nome</th>
                    <th class="text-white">CPF</th>
                    <th class="text-white">Email</th>
                    <th class="text-white">Telefone</th>
                    <th class="text-white">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr>
                        <td class="fw-bold text-danger">{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button wire:click="delete({{ $cliente->id }})"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-danger fw-semibold">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="mt-3">
        {{ $clientes->links() }}
    </div>
</div>
