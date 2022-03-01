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
* 2022_02_27_082413_create_article_comments_table.php

# Endpoints
* GET http://localhost:8000/api/article/1
* POST http://localhost:8000/api/article/1/comment
  * {"article_comment": "string""}
* POST http://localhost:8000/api/article/1/comment/intent
    * {"article_comment_size": "integer""}
* GET http://localhost:8000/api/article/comment/track
* GET http://localhost:8000/api/article/comment/track/session

# Usage
* go to http://localhost:8000

# Running tests
* run `./app.sh composer test`

# Comments`
* The User Interface part of this application is not at full potential as not being in the specific specs,
but some tweaks for triggering the `api/article/1/comment/intent` endpoint can be further applied by:
  * using the `beforeUnload` event
  * using the Beacon API
