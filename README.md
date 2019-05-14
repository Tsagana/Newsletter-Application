# Newsletter-Application

This application provides API for creating, confirming, deleting subscriptions based on Laravel framework.


# Requirements
* [Composer](https://getcomposer.org/)
* [PHP 7.1.3](http://www.php.net/) or higher

DBMS used for development
* MySQL


## Application architecture
```
/                               ──> Root directory
├── app/                        ──> App models, resources
├── database/             ──> Database infrastructure (migrations etc)
└── resources/            ──> Other assets (views, emails etc.)

## Config
| Files | Description |
|-------|-------------|
| **.env.example** | is the configuration file to copy to __.env.*__. |
| **composer.json** | is the JSON file of [Composer](https://getcomposer.org/). This file is used by Composer to store metadata for projects published as PHP modules. |
| **composer.lock** | is for the project developers, so that others can get precisely the same dependencies. |

## Getting started
:warning: Before starting, new MySQL database should be created

1 – Install dependencies:

```bash
$ composer install
```

2 – Create an environment variables file based on the example:

```bash
$ cp .env.example .env
```

3 – Create database schema

```bash
$ php artisan migrate
```
