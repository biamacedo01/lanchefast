<div>
    <div class="container">
        <h2 class="mb-4">Cadastrar Produto</h2>
    
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <form wire:submit.prevent="salvar" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" wire:model.defer="nome" class="form-control">
                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label>Descrição:</label>
                <textarea wire:model.defer="descricao" class="form-control"></textarea>
                @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label>Preço:</label>
                <input type="number" wire:model.defer="preco" step="0.01" class="form-control">
                @error('preco') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label>Categoria:</label>
                <input type="text" wire:model.defer="categoria" class="form-control">
                @error('categoria') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label>Imagem:</label>
                <input type="file" wire:model="imagem" class="form-control">
                @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror
    
                @if ($imagem)
                    <img src="{{ $imagem->temporaryUrl() }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
    
            <button type="submit" class="btn btn-primary">Salvar Produto</button>
        </form>
    </div>
    
</div>
