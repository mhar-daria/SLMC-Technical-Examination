
# XYZ Enterprise

## Installation

**PHP**

-   PHP >= 7.1.3
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension

**NOTE**: In PHP `<7.4` you may encounter `caching_sha2_password` error when connecting to mysql just make sure your user is using the native mysql password. This application is also tested in PHP 7.4.

**MySQL**

Make sure you have mysql server on your machine.

>:v8.0


*Optionally Run*

```
CREATE USER IF NOT EXISTS 'lumen'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
CREATE DATABASE IF NOT EXISTS lumen;
GRANT ALL PRIVILEGES ON *.* TO 'lumen'@'%'
```

*if you already have a user and not sure if identified with `mysql_native_password` run this instead.

```
ALTER USER '`<user|lumen>`'@'`<host|%>`' IDENTIFIED WITH mysql_native_password BY 'password';
```

or used an existing user just make sure this user is using the `mysql native password`

**default credentials**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lumen
DB_USERNAME=lumen
DB_PASSWORD=password
DB_STRICT_MODE=false
```

Feel free to update the `.env` file.

**Node**

> v14.16.0

*RUN*
> npm install -g yarn

## Start

**API**

```
HOST: localhost
PORT: 7771
BASE_URL: http://localhost:7771/api/v1/
```

> Goto [basefolder]/api
> Run `php -S localhost:7771 -t public`

**APP**

```
HOST: localhost
PORT: 7770
BASE_URL: http://localhost:7770/
```

> Goto [basefolder]/app

> Run `yarn install && yarn start`

**NOTE** If you don't have `yarn` install it using.

> npm install -g yarn


## Api Commands

> base url `https://jsonplaceholder.typicode.com/`

Additional commands will fetch data from the base url and save the records to database.

> NOTE: I did not follow the example using posts:fetch. I think its good to group it by `fetch`.

| Command          | Description                            |
| ---------------- | -------------------------------------- |
| `fetch:posts`    | Fetch posts and insert to database.    |
| `fetch:users`    | Fetch users and insert to database.    |
| `fetch:comments` | Fetch comments and insert to database. |
| `fetch:albums`   | Fetch albums and insert to database.   |
| `fetch:photos`   | Fetch albums and insert to database.   |
| `fetch:todos`    | Fetch todos and insert to database.    |

## Available API Endpoints

| Path             | Description                            |
| ---------------- | -------------------------------------- |
| `/api/v1/users`    | List Users    |
| `/api/v1/posts`    | List Posts    |
| `/api/v1/coments` | List Comments |
| `/api/v1/todos`   | List Todos |
| `/api/v1/photos`   | List Photos |
| `/api/v1/albums`    | List Albums |
