<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros - Sistema de Imóveis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <h1 class="page-title">Cadastros do Sistema</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="cadastrosTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pessoas-tab" data-bs-toggle="tab" data-bs-target="#pessoas" type="button">
                Pessoas
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="imoveis-tab" data-bs-toggle="tab" data-bs-target="#imoveis" type="button">
                Imóveis
            </button>
        </li>
    </ul>

    <!-- Conteúdo das Tabs -->
    <div class="tab-content p-3 border border-top-0 rounded-bottom shadow-sm">
        <!-- Tab Pessoas -->
        <div class="tab-pane fade show active" id="pessoas" role="tabpanel">
            <a href="{{ route('pessoas.create') }}" class="btn btn-new">Cadastrar Nova Pessoa</a>

            <div class="table-container mt-3">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->id }}</td>
                            <td>{{ $pessoa->nome }}</td>
                            <td>{{ date('d/m/Y', strtotime($pessoa->data_nascimento)) }}</td>
                            <td class="cpf">{{ $pessoa->cpf }}</td>
                            <td>{{ ucfirst($pessoa->sexo) }}</td>
                            <td>{{ $pessoa->telefone ?? '-' }}</td>
                            <td>{{ $pessoa->email ?? '-' }}</td>
                            <td class="actions">
                                <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Imóveis -->
        <div class="tab-pane fade" id="imoveis" role="tabpanel">
            <a href="{{ route('imoveis.create') }}" class="btn btn-new">Cadastrar Novo Imóvel</a>

            <div class="table-container mt-3">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logradouro</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Proprietário</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($imoveis as $imovel)
                        <tr>
                            <td>{{ $imovel->id }}</td>
                            <td>{{ $imovel->logradouro }}</td>
                            <td>{{ $imovel->numero }}</td>
                            <td>{{ $imovel->bairro }}</td>
                            <td>{{ $imovel->pessoa->nome ?? '-' }}</td>
                            <td class="actions">
                                <a href="{{ route('imoveis.edit', $imovel->id) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('imoveis.destroy', $imovel->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // persistência da tab ativa
        const tabElms = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabElms.forEach(tab => {
            tab.addEventListener('click', function() {
                localStorage.setItem('ultimaTabAtiva', this.id);
            });
        });

        // restaura a última tab ativa
        const ultimaTab = localStorage.getItem('ultimaTabAtiva');
        if (ultimaTab) {
            const tab = bootstrap.Tab.getOrCreateInstance(document.querySelector(`#${ultimaTab}`));
            tab.show();
        }
    });
</script>
</body>
</html>
