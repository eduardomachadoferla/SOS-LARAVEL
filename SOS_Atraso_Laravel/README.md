# SOS Atraso — Laravel

Conversão do projeto PHP original para Laravel, mantendo: registro e impressão de atraso, busca/validação de alunos, importação de planilha, login administrativo, CRUD de alunos, CRUD de usuários/permissões, relatórios filtrados e PDFs, além do total por turma.

## Instalação

```bash
composer install
copy .env.example .env     # Windows
# cp .env.example .env     # Linux/macOS
php artisan key:generate
```

Crie um banco MySQL chamado `sos_atraso`, ajuste usuário e senha no `.env`, depois rode:

```bash
php artisan migrate --seed
php artisan serve
```

Acesse `http://127.0.0.1:8000`.

**Login inicial:** `admin@gmail.com`  
**Senha inicial:** `admin`

## Dados antigos

O dump original está em `database/legacy_database.sql`. Para preservar todos os alunos e atrasos antigos, importe esse arquivo no MySQL após a migration, ou use-o como referência. O seeder cria as turmas e o administrador inicial.

## Observação

A pasta `vendor` não está incluída porque deve ser gerada por `composer install` no computador onde o sistema será executado.


## Correção de dependência (02/08/2026)

A dependência `phpoffice/phpspreadsheet` foi atualizada de `^4.0` para `^5.8.1`, pois as versões 4.x estavam sendo bloqueadas pelo Composer por avisos de segurança.
