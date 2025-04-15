<div class="container py-5">
    <h2 class="text-center text-danger fw-bold mb-4">Editar Cliente</h2>

    @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" wire:model.defer="nome" class="form-control">
            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" wire:model.defer="endereco" class="form-control">
            @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" wire:model.defer="telefone" class="form-control">
            @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" id="cpf" wire:model.defer="cpf" class="form-control">
            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" wire:model.defer="email" class="form-control">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
