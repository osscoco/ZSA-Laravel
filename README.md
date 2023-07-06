<p align="center">
<img src="./logo.png" width="400" alt="Gueules de loup">
</p>

Zero Six API Application
========================

L'application Zero Six API a pour but de faire la gestion des bons d'achat par membre.

Pré requis
------------

  * PHP 8.1.0 or higher;
  * MySQL
  * Composer
  * Npm

Récupération (GIT)
------------

## Créez un repertoire 'zerosixapi' dans l'emplacement de votre ordinateur de votre choix, placez-vous dedans et récupérez le projet GIT à l'aide de GIT BASH :

```bash
$ git clone https://github.com/osscoco/zerosixapi.git
```

```bash
$ cd zerosixapi
```

```bash
$ cp .env.example .env
```

## Configurer la connexion à la base de données dans .env :

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=zerosixapi
- DB_USERNAME=root
- DB_PASSWORD=root

## Créer la base de données dans Mysql

## A l'aide de GIT BASH, dans le repertoire 'zerosixapi' :

```bash
$ composer install
```

```bash
$ npm install
```

```bash
$ php artisan key:generate
```

```bash
$ php artisan migrate
```

```bash
$ php artisan serve
```

## Ouvrir POSTMAN :

```bash
$ GET : http://localhost:8000/api/generateRootAccount
```

## A l'aide de GIT BASH, dans le repertoire 'zerosixapi', ouvrir un cmd supplémentaire :

```bash
$ php artisan test --testsuite=Feature
```

## Ouvrir POSTMAN :

```bash
$ POST : http://localhost:8000/api/login
	- email : admin.gueulesdeloup@gmail.com
	- password : Not24getGET : http://localhost:8000/api/generateRootAccount
```

```bash
$ Copier la valeur du token dans le JSON Response
```

```bash
$ POST : http://localhost:8000/api/register
    - name : User
    - email : user.gueulesdeloup@gmail.com
    - password : Not24get
    - Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ GET : http://localhost:8000/api/user
	- Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ GET : http://localhost:8000/api/logout
	- Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ POST : http://localhost:8000/api/cards/store
    - reference : Carte 1
    - fidelityPoints : 0
    - Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ GET : http://localhost:8000/api/cards
    - Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ PUT : http://localhost:8000/api/cards/update/1
    - reference : Carte 1 Modifié
    - fidelityPoints : 5
    - Authorization -> BearerToken -> coller le token précédement copié
```

```bash
$ DELETE : http://localhost:8000/api/cards/delete/1
	- Authorization -> BearerToken -> coller le token précédement copié
```
