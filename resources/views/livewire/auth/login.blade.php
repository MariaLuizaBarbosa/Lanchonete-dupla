<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? 'BATATA' }}</title>
</head>


<div class="d-flex aling-items-center justify-content-center  bg-success-subtle">
    <div class="card shadow-sm p-4" style="width: 500px">
        <h2 class="text-center mb-4">Login</h2>

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" wire:model="email" class="form-control"
                        placeholder="Digite seu email">
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" wire:model="password" class="form-control"
                        placeholder="Digite sua senha">
    
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-secondary-subtle w-100">Entrar</button>
            </form>

    </div>
</div>
