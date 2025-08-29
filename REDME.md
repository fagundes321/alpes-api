# Alpes API - Laravel

## **Descrição**

Aplicação Laravel que importa dados de carros a partir da API da Alpes One, salva no banco de dados MySQL e fornece uma API REST para CRUD dos registros.  

---

## **Pré-requisitos**

- Git
- Docker e Docker Compose
- VSCode ou outro editor de sua preferência

---

## **1️⃣ Clonar o projeto**

```bash
git clone https://github.com/fagundes321/alpes-api.git
cd alpes-api
```

## **2️⃣ Abrir o projeto no VSCode e configurar .env**

```bash
code .

```

## **Crie ou edite o arquivo .env com o seguinte conteúdo:**

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/HnhwYu97Yiybyoy8Ag1oTmCVNpzwnYYuSpD3m1vCVI=
APP_DEBUG=true
APP_URL=http://localhost:8080

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

PHP_CLI_SERVER_WORKERS=4
BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database

REDIS_CLIENT=phpredis

MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## **3️⃣ Subir os containers Docker**

```bash
docker compose up -d

```

## **4️⃣ Entrar no container PHP**

```bash
docker compose exec -it php bash

```

## **5️⃣ Instalar dependências do Composer**

```bash
composer install


```

## **6️⃣ Ajustar permissões**

```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache


```

## **7️⃣ Criar as tabelas no banco**

```bash
php artisan migrate

```

## **8️⃣ Importar os dados da API**

```bash
php artisan import:alpes


```

## **11️⃣ Acesso ao banco via PhpMyAdmin**

```bash
URL: http://localhost:8081

Usuário: root

Senha: root


```

## **12️⃣ Scheduler (importação automática)**
O comando import:alpes está agendado para rodar a cada hora no app/Console/Kernel.php:

```bash
$schedule->command('import:alpes')->hourly();



```
