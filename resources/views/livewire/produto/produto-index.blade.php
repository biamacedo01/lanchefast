<div class="container py-4">
    <h2 class="mb-4">Lista de Produtos</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Buscar produto..." class="form-control" />
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>
                        @if ($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" width="50">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <button wire:click="delete({{ $produto->id }})" class="btn btn-sm btn-danger"
                            onclick="confirm('Tem certeza que deseja excluir?') || event.stopImmediatePropagation()">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $produtos->links() }}
    </div>
</div>
