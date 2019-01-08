# Sanctions listing

It loads Sanctions list XML files in database and then profive REST interface to do "Google search" by names.

## Requirements

- PHP 7.x
- PostgreSQL database
- Composer

## Installation

- download and unzip this repo in folder
- run `composer update`

## Import script usage

``` bash
php -e importer.php
```

# REST interface usage

Request:
```curl
GET https://host/search?q=Ali+Muhamed+Barbados
```

Response:
```json
[
    {"name":"Ali Muhamed Barbados el Pipi", "score":95},
    {"name":"Ali Barbados Muhamed", "score":90},
    {"name":"Barbados Ali", "score":65},
]
```
