# laravel-article-comment-track (aka lact)

# Local deployment
* required: `docker`, `docker compose`
* from project's directory:
* run `./app.sh start`
* run `./app.sh composer install`
* run `./app.sh artisan migrate`
* run `./app.sh stop` when done

# Migrations
* 2022_02_27_022538_create_articles_table.php
* 2022_02_27_042736_add_dummy_articles_to_articles_table.php

# Endpoints
* GET http://localhost:8000/api/article/1

# Usage
* go to http://localhost:8000

# Running tests
* run `./app.sh composer test`

# Comments`
