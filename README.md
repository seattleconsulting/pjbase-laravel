# pjbase-laravel

## Installation

- git clone https://github.com/seattleconsulting/pjbase-laravel.git
- cd project_folder
- composer install

# Docker

## Installation

#### 以下の構成で各ファイルをアプリのルートディレクトリに作成します。

```
├── docker
│   └── php
│       └── Dockerfile
| 	└── web
│       └── default.conf
├── docker-compose.yml
```

#### Dockerfileに追加
```
FROM php:7.2-fpm
# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql
WORKDIR /var/www
```

##### docker-compose.ymlに追加
```
version: '3'
services:
  web:
    image: nginx:1.15.6
    ports:
      - '8000:80'
    depends_on:
      - app
    volumes:
      - ./docker/web/default.conf:/etc/nginx/conf.d/default.conf
      - .:/var/www
  app:
    build: ./docker/php
    volumes:
      - .:/var/www
    depends_on:
      - mysql
  mysql:
    image: mysql:5.7
    environment:
      MYSQL_DATABASE: testing
      MYSQL_USER: root
      MYSQL_PASSWORD: root
      MYSQL_ROOT_PASSWORD: root
    ports:
      - "3301:3306"
    volumes:
      - mysql-data:/var/lib/mysql
volumes:
  mysql-data:
```

#### default.confに追加
```
server {
    listen 80;
    root /var/www/public;
    index index.php index.html index.htm;
    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;
    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}
```

#### Run docker build and up

- docker-compose up -d

※ mysqlが5.7.33以降の場合docker containerが以下のエラーで起動できなかったので、その場合はdocker-compose.ymlの `MYSQL_USER` と `MYSQL_PASSWORD`を指定しなくて大丈夫です。指定したい場合はrootではなく別のUSER名で指定してください！
```
2021-03-27 13:16:08+00:00 [ERROR] [Entrypoint]: MYSQL_USER="root", MYSQL_USER and MYSQL_PASSWORD are for configuring a regular user and cannot be used for the root user
Remove MYSQL_USER="root" and use one of the following to control the root user password:
省略...
```

#### Run the migration files

- docker-compose exec app bash
- php artisan migrate 

#### Run on browser
 
- http://localhost:8000/

##### Reference Link
[Dockerize Laravel](https://www.membersedge.co.jp/blog/laravel-development-environment-with-docker-compose/)

### 開発環境で確認する場合
#### 1. 本リポジトリで実装されているAPI一覧を画面で確認する方法
プロジェクトディレクトリ直下に以下のコマンドを実行してSwaggerAPIドキュメントを作成する
 - php artisan l5-swagger:generate
 
Browserで画面を叩いて確認する
 - http://localhost:8000/api/swagger

#### 2. 本リポジトリで実装されているAPIを使っているFront画面で確認する方法
本リポジトリはAPIだけを作っていて、以下のリポジトリで呼び出し側の画面を作っているので、そのリポジトリの構築が必要です。

[VueCRUD](https://github.com/seattleconsulting/pjbase-vue)

#### DBの確認をしたい場合は以下のアクセス情報で sequelProやworkbenchなどでもみれます。
```
host : 127.0.0.1
user: root
password: root
database: testing
port: 3301
```

#### MacOSを使用する方で構築が進まなかった場合はこちらをご参考に！

[MacOSで構築](https://github.com/ayemohmohthu/stocks/blob/master/AboutPhp/installation.md)