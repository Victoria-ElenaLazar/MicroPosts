
# MicroPosts

## Overview
Welcome to Symfony-Micro Posts documentation. This project was created to improve my skills and knowledge about 
Symfony Framework, using Symfony Console, Bundles and Migrations.

## Table of Contents

-[Features](#features)

-[Requirements](#requirements)

-[Getting Started](#getting-started)

-[Authentication](#authentication)

-[Project Demo](#project-demo)



## Features

- **User Authentication:** Users can register and log in to the application to write posts, add comments, like posts, and follow other users.

- **Profile:** Users have their own custom profile where they can specify their personal information along with a profile picture.

- **Post Management:** Users can create, edit their own posts.

- **Comment System:** Users can add comments to posts.

- **Like System:** Users can like posts.

- **Follow System:** Users can follow other users to see their posts.

- **Email Verification:** Implemented Email verification to ensure the validity of user email addresses before taking any actions.

- **Docker Development Environment:** Utilizes Docker for a consistent and portable development environment.

- **Doctrine ORM:** Uses Doctrine ORM for database abstraction and management.


## [Requirements](#requirements)

- PHP 8.1/8.2
- [Symfony](https://symfony.com/)
- [Docker](https://www.docker.com/products/docker-desktop/)

## Getting Started

To get started with this application, follow these steps:

1. **Clone the repository**: Clone this repository to your local development environment.
```bash
git clone https://github.com/Victoria-ElenaLazar/MicroPosts.git
```
2. **Install dependencies**: navigate to your project root directory and install
the required dependencies using Composer.
```bash
composer install
```
3. **Configure Environment**: Create a '.env' file and configure your database settings and environment.

4. **Configuration**: Modify your docker-compose.yml file as needed and start the docker containers:
```angular2html
docker-compose up -d
```

5. **Database Setup**: The "Entity" folder contains necessary ORM Mapping. Run the following command:

```bash
symfony console doctrine:database:create
```
Now the database is created and you need to create some table inside. Run the following command in terminal inside your application:

```bash
symfony console make:migration
```
followed by:

```bash
php bin/console doctrine:migrations:migrate
```

6. **Start working with some data using fixtures:**
````angular2html
symfony console doctrine:fixtures:load
````

Now you have the database with specific tables and some data inside if you chose so.

7. **Start development server**:
```angular2html
php -S localhost:8000 -t public
```


## Authentication

You will have limited access on the Home Page. In order to have full access you have to register and to log in.

**'Authorization':** Create an account by clicking the 'Register' button, top-right corner.

**Sign-in:** Sign-in with your credentials. You'll be redirected to Home Page.

**Mail catcher:** Open the Mail Catcher in port 1080 to confirm the email address and login again. 

## Project Demo


[Watch the video](public/Micro-Posts.mov)

Or [download the video](public/Micro-Posts.mov) to watch it.
