# 🏠 Sistema de Cadastro de Imóveis

Sistema para gerenciamento de cadastro de imóveis e proprietários desenvolvido em Laravel.

## 🚀 Tecnologias Utilizadas
- PHP 8.1+
- Laravel 10
- MySQL
- Bootstrap 5
- Vite

## ⚙️ Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/cadastro-imoveis.git
```

2. Instale as dependências:
```bash
composer install
npm install
```

3. Configure o arquivo `.env`:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

4. Execute as migrations:
```bash
php artisan migrate
```

5. Inicie o servidor:
```bash
php artisan serve
```

## 🗃️ Estrutura do Banco de Dados
- Tabela `pessoas`: Cadastro de proprietários
- Tabela `imoveis`: Cadastro de imóveis com relacionamento


## 📄 Licença
MIT
