# Acai-express

## Instruções para Rodar o Projeto

### backend

Clonar o repositório
```bash

git clone https://github.com/elxsson/acai-xpress.git
```
Navegar para o diretório backend

```bash
cd backend
```

Instalar dependências do Composer

```bash
composer install
```
Configurar banco de dados e rodar migrações
```bash
php artisan migrate --seed
```

Iniciar servidor de desenvolvimento

```bash
php artisan serve
```

### Frontend
Navegar para o diretório frontend
```bash
cd ../frontend
```
Instalar dependências do npm
```bash
npm install
```
Iniciar aplicação frontend
```bash
npm start
```

