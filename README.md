# CDA Prepa App
---
# Project installation

## 1. Configure your environment

- Duplicate ".env" file and rename the duplicated file ".env.local"

- Customize the DATABASE_URL variable.

(Replace user & password in the example below)

```
DATABASE_URL=mysql://<user>:<password>@127.0.0.1:3306/bewved?serverVersion=5.7
```

## 2. Install PHP dependencies

```
composer install
```

## 3. Import the datas

- Remove existing database

```
php bin/console doctrine:database:drop --force
```

- Create new database

```
php bin/console doctrine:database:create
```

- Import the database

```
php bin/console doctrine:database:import bewved.sql
```

- Migration database

```
php bin/console make:migration
```

```
php bin/console doctrine:migration:migrate
```

- Load fixtures for test situation

```
php bin/console doctrine:fixtures:load
```

- For reset id number

```
php bin/console doctrine:fixtures:load --purge-with-truncate
```

## 4. Install JS dependencies

```
yarn install
```

## 5. Build Webpack JS & CSS source files

```
yarn dev
```

## 6. Start dev server

```
symfony server:start
```
