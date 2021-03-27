# XYZ Enterprise

> Optionally I add Docker for easy testing and installation

## Prerequisites

### Docker

Download and install the [Docker](https://www.docker.com/get-started).

## Install

> run `bin/install`

## Install manually

### API

> PORT 7771

### APP

> PORT 7770

### Database

> DB_NAME `xyz`
> DB_USER xyz
> DB_PASSWORD password

## Starting the application

> You can run it using `bin/install`.

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

> /api/v1/users
> /api/v1/posts
> /api/v1/coments
> /api/v1/todos
> /api/v1/photos
> /api/v1/albums
