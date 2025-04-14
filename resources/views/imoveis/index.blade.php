<!DOCTYPE html>
<html>
<head>
    <title>Lista de Imóveis</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Imóveis</h1>
        <a href="{{ route('imoveis.create') }}" class="btn btn-primary">
            Cadastrar Novo Imóvel
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Inscrição Municipal</th>
                    <th>Endereço</th>
                    <th>Proprietário</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->id }}</td>
                        <td>
                            {{ $imovel->logradouro }}, {{ $imovel->numero }}<br>
                            {{ $imovel->bairro }}<br>
                            {{ $imovel->complemento ?? 'Sem complemento' }}
                        </td>
                        <td>{{ $imovel->pessoa->nome }}</td>
                        <td>
                            <a href="{{ route('imoveis.edit', $imovel->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('imoveis.destroy', $imovel->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
