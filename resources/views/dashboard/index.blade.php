<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])  <!-- CSS global -->
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Painel Administrativo</h1>

    <div class="row">
        <!-- botao para Pessoas -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Pessoas</h5>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ route('pessoas.index') }}" class="btn btn-primary">
                            Ver Lista
                        </a>
                        <a href="{{ route('pessoas.create') }}" class="btn btn-success">
                            Cadastrar Novo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão para Imóveis -->
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Imóveis</h5>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ route('imoveis.index') }}" class="btn btn-primary">
                            Ver Lista
                        </a>
                        <a href="{{ route('imoveis.create') }}" class="btn btn-success">
                            Cadastrar Novo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])  <!-- JS global (Bootstrap) -->
</body>
</html>
