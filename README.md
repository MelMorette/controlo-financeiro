# Controlo Financeiro

Aplicação web para gerir finanças pessoais, desenvolvida em Laravel. Vai permitir registar receitas e despesas por categoria e por pessoa, em euros (EUR) e em reais (BRL).

## Tecnologias

- **Laravel 13** (PHP 8.3)
- **MySQL**
- **Docker** com Laravel Sail (em WSL2)
- **Git / GitHub**

## Estado do projeto

### Feito
- Ambiente de desenvolvimento em Docker com Laravel Sail
- Modelo de dados com migrations, chaves estrangeiras e integridade referencial
- Models Eloquent com relações, casts e enums
- Factories e seeders para gerar dados de teste

### Próximos passos
- CRUD de transações com controllers, Form Requests para validação e views em Blade
- Autenticação
- Conversão de moeda EUR/BRL através de uma API externa
- Testes automatizados com PHPUnit
- Pipeline de CI com GitHub Actions

## Modelo de dados

| Tabela | Descrição |
|---|---|
| `people` | Pessoas a quem pertencem as transações |
| `categories` | Categorias, cada uma do tipo receita ou despesa (enum) |
| `transactions` | Transações com pessoa, categoria, descrição, valor, moeda e data |

## Como correr localmente

Requisitos: Docker e, no Windows, WSL2.

```bash
git clone https://github.com/MelMorette/controlo-financeiro.git
cd controlo-financeiro
cp .env.example .env

# instalar dependências com um container temporário
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html \
  laravelsail/php84-composer:latest composer install --ignore-platform-reqs

./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

A aplicação fica disponível em http://localhost (ou na porta definida em `APP_PORT` no `.env`).

Os dados do seeder são fictícios.
