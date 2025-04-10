<div class="container">
    <h2>Cadastrar Cliente</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" wire:model.defer="nome" class="form-control">
            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Endereço:</label>
            <input type="text" wire:model.defer="endereco" class="form-control">
            @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" wire:model.defer="telefone" class="form-control">
            @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>CPF:</label>
            <input type="text" wire:model.defer="cpf" class="form-control">
            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" wire:model.defer="email" class="form-control">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Senha:</label>
            <input type="password" wire:model.defer="senha" class="form-control">
            @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
