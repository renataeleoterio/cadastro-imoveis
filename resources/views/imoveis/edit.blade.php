<!DOCTYPE html>
<html>
<head>
    <title>Editar Imóvel</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Editar Imóvel #{{ $imovel->id }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('imoveis.update', $imovel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="logradouro" class="form-label">Logradouro*</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro"
                               value="{{ old('logradouro', $imovel->logradouro) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="numero" class="form-label">Número*</label>
                        <input type="text" class="form-control" id="numero" name="numero"
                               value="{{ old('numero', $imovel->numero) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="bairro" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               value="{{ old('bairro', $imovel->bairro) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               value="{{ old('complemento', $imovel->complemento) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pessoa_id" class="form-label">Proprietário*</label>
                    <select class="form-select" id="pessoa_id" name="pessoa_id" required>
                        <option value="">Selecione um proprietário</option>
                        @foreach($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}"
                                {{ $imovel->pessoa_id == $pessoa->id ? 'selected' : '' }}>
                                {{ $pessoa->nome }} (CPF: {{ $pessoa->cpf }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('imoveis.index') }}" class="btn btn-secondary me-md-2">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Atualizar Imóvel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
