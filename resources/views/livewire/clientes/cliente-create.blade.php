<div class="container py-5">
    <!-- Título -->
    <h2 class="text-center text-danger fw-bold mb-4">Cadastro de Clientes</h2>

    <!-- Card com o Formulário -->
    <div class="card shadow-lg rounded-4 p-4" style="background-color: #f7c0d8; max-width: 800px; margin: auto;">
        
        @if (session()->has('success'))
            <div class="alert alert-success rounded-pill text-center mb-4">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="store">
            <div class="mb-4">
                <label class="form-label" for="nome">Nome:</label>
                <input type="text" id="nome" wire:model.defer="nome" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="endereco">Endereço:</label>
                <input type="text" id="endereco" wire:model.defer="endereco" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="telefone">Telefone:</label>
                <input type="text" id="telefone" wire:model.defer="telefone" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="cpf">CPF:</label>
                <input type="text" id="cpf" wire:model.defer="cpf" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="email">Email:</label>
                <input type="email" id="email" wire:model.defer="email" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label" for="email">Senha:</label>
                <input type="password" id="password" wire:model.defer="password" class="form-control form-control-lg border-0 rounded-3" style="background-color: #f5e1e7;">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Voltar
                </a>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Salvar
                </button>
            </div>

           
        </form>
    </div>
</div>
