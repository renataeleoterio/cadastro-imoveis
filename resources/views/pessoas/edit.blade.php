<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa - Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/pessoas/form.js'])
</head>
<body class="form-page">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Editar Pessoa</h1>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="pessoa-form" action="{{ route('pessoas.update', $pessoa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control"
                           value="{{ old('nome', $pessoa->nome) }}" required>
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control"
                           value="{{ old('data_nascimento', $pessoa->data_nascimento->format('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control cpf-input"
                           value="{{ old('cpf', $pessoa->cpf) }}" maxlength="14" required>
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="M" {{ (old('sexo', $pessoa->sexo) == 'M') ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ (old('sexo', $pessoa->sexo) == 'F') ? 'selected' : '' }}>Feminino</option>
                        <option value="Outro" {{ (old('sexo', $pessoa->sexo) == 'Outro') ? 'selected' : '' }}>Outro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" class="form-control phone-input"
                           value="{{ old('telefone', $pessoa->telefone) }}">
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', $pessoa->email) }}">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('pessoas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
