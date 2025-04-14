<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Imóvel</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="imovel-create-container">
    <div class="imovel-create-header">
        <h1>Cadastrar Novo Imóvel</h1>
    </div>

    <form action="{{ route('imoveis.store') }}" method="POST">
        @csrf

        <div class="address-row">
            <div class="form-group-imovel">
                <label for="logradouro">Logradouro*</label>
                <input type="text" id="logradouro" name="logradouro" required>
                @error('logradouro')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-imovel">
                <label for="numero">Número*</label>
                <input type="text" id="numero" name="numero" required>
                @error('numero')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="address-row">
            <div class="form-group-imovel">
                <label for="bairro">Bairro*</label>
                <input type="text" id="bairro" name="bairro" required>
                @error('bairro')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group-imovel">
                <label for="complemento">Complemento</label>
                <input type="text" id="complemento" name="complemento">
            </div>
        </div>

        <div class="form-group-imovel proprietario-select">
            <label for="pessoa_id">Proprietário*</label>
            <select id="pessoa_id" name="pessoa_id" required>
                <option value="">Selecione um proprietário</option>
                @foreach($pessoas as $pessoa)
                    <option value="{{ $pessoa->id }}">
                        {{ $pessoa->nome }} (CPF: {{ $pessoa->cpf }})
                    </option>
                @endforeach
            </select>
            <small class="text-muted">O proprietário deve estar previamente cadastrado</small>
            @error('pessoa_id')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('imoveis.index') }}" class="btn-cancel">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Cadastrar Imóvel
            </button>
        </div>
    </form>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
