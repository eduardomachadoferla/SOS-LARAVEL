# SOS Atraso

Sistema desenvolvido em **Laravel** para registrar atrasos de alunos, gerenciar estudantes e usuários, importar alunos por planilha e gerar relatórios.

## Funcionalidades

- Registro de atrasos
- Busca de alunos
- Cadastro, edição e exclusão de alunos
- Importação de alunos por planilha
- Login administrativo
- Gerenciamento de usuários
- Relatórios com filtros
- Geração de relatórios em PDF
- Paginação de resultados

## Tecnologias utilizadas

- PHP 8.2+
- Laravel 12
- MySQL
- Composer
- PhpSpreadsheet
- DomPDF
- HTML
- CSS
- JavaScript

---

## Requisitos

Antes de instalar, tenha no computador:

- PHP 8.2 ou superior
- Composer
- XAMPP
- MySQL
- Git
- Visual Studio Code ou outro editor

As extensões `gd` e `zip` do PHP precisam estar ativadas.

No XAMPP, abra:

```text
C:\xamp\php\php.ini
```

Procure por:

```ini
;extension=gd
;extension=zip
```

Remova o ponto e vírgula:

```ini
extension=gd
extension=zip
```

Salve o arquivo e abra novamente o terminal.

Confirme se as extensões foram ativadas:

```powershell
php -m | findstr gd
php -m | findstr zip
```

---

## Instalação

### 1. Clonar o projeto

```powershell
git clone URL_DO_REPOSITORIO
```

Entre na pasta:

```powershell
cd SOS_Atraso_Laravel
```

A pasta correta é aquela que contém:

```text
artisan
composer.json
.env.example
app
routes
resources
public
```

### 2. Instalar as dependências

```powershell
composer install
```

### 3. Criar o arquivo `.env`

No Windows:

```powershell
copy .env.example .env
```

No Linux ou macOS:

```bash
cp .env.example .env
```

### 4. Gerar a chave da aplicação

```powershell
php artisan key:generate
```

---

## Configuração do banco de dados

Abra o XAMPP e inicie o serviço:

```text
MySQL
```

Depois acesse:

```text
http://localhost/phpmyadmin
```

Crie um banco de dados chamado:

```text
sos_atraso
```

Abra o arquivo `.env` e configure:

```env
APP_NAME="SOS Atraso"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sos_atraso
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
QUEUE_CONNECTION=database
```

No XAMPP, normalmente o usuário do MySQL é `root` e a senha fica vazia.

---

## Criar as tabelas

Execute:

```powershell
php artisan migrate --seed
```

Esse comando cria as tabelas e adiciona os dados iniciais do sistema.

> O comando abaixo apaga todos os dados e recria o banco:

```powershell
php artisan migrate:fresh --seed
```

Use apenas em ambiente de testes.

---

## Rodar o projeto

Limpe os caches:

```powershell
php artisan optimize:clear
```

Inicie o servidor:

```powershell
php artisan serve
```

O terminal mostrará:

```text
Server running on http://127.0.0.1:8000
```

Abra no navegador:

```text
http://127.0.0.1:8000
```

O terminal precisa permanecer aberto enquanto o sistema estiver rodando.

---

## Acesso administrativo

Tela de login:

```text
http://127.0.0.1:8000/admin/login
```

Credenciais iniciais:

```text
E-mail: admin@gmail.com
Senha: admin
```

É recomendado alterar a senha depois do primeiro acesso.

---

## Importação de alunos

Na área administrativa, entre na página de alunos e selecione a opção:

```text
Importar planilha
```

O arquivo deve estar em formato `.xlsx` e possuir as colunas nesta ordem:

| Matrícula | Nome | Turma |
|---|---|---|
| 202600001 | Ana Silva | EM1AM |
| 202600002 | João Souza | EM2BM |

Não altere a ordem das colunas.

---

## Comandos úteis

### Iniciar o sistema

```powershell
php artisan serve
```

### Limpar os caches

```powershell
php artisan optimize:clear
```

### Limpar o cache das views

```powershell
php artisan view:clear
```

### Visualizar as rotas

```powershell
php artisan route:list
```

### Atualizar o autoload

```powershell
composer dump-autoload
```

### Recriar o banco

```powershell
php artisan migrate:fresh --seed
```

---

## Problemas comuns

### Composer não encontrou o `composer.json`

O terminal está na pasta errada.

Entre na pasta que contém os arquivos `composer.json` e `artisan`:

```powershell
cd CAMINHO_DO_PROJETO\SOS_Atraso_Laravel
```

Confirme:

```powershell
dir composer.json
dir artisan
```

### Erro `Could not open input file: artisan`

Entre na pasta principal do Laravel:

```powershell
cd CAMINHO_DO_PROJETO\SOS_Atraso_Laravel
```

### Erro `Unknown database 'sos_atraso'`

Crie o banco `sos_atraso` no phpMyAdmin e confira as configurações do `.env`.

### Erro relacionado à extensão GD

No arquivo:

```text
C:\xamp\php\php.ini
```

Troque:

```ini
;extension=gd
```

por:

```ini
extension=gd
```

### Erro relacionado à extensão ZIP

No arquivo:

```text
C:\xamp\php\php.ini
```

Troque:

```ini
;extension=zip
```

por:

```ini
extension=zip
```

### A rota `/admin` não abre

Use:

```text
http://127.0.0.1:8000/admin/login
```

Não use:

```text
http://localhost/admin
```

Confirme também que o servidor está rodando:

```powershell
php artisan serve
```

---

## Estrutura do projeto

```text
app/            Controllers, Models e regras do sistema
bootstrap/      Inicialização da aplicação
config/         Configurações
database/       Migrations e seeders
public/         CSS, JavaScript e imagens
resources/      Views Blade
routes/         Rotas da aplicação
storage/        Logs e arquivos temporários
tests/          Testes automatizados
vendor/         Dependências do Composer
```

Não edite arquivos dentro da pasta `vendor`, pois eles podem ser sobrescritos pelo Composer.

---

## Encerrar o servidor

No terminal em que o Laravel está rodando, pressione:

```text
Ctrl + C
```

---

## Licença

Este projeto foi desenvolvido para fins educacionais e de gerenciamento escolar.
