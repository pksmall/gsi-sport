# GSI Sport

## Install

#### git clone
```
$ git clone https://github.com/pksmall/gsi-sport
```
#### create dirs
```
$ mkdir -p storage bootstrap/cache storage/app storage/framework storage/logs
$ mkdir -p storage/app/public storage/framework/cache storage/framework/sessoins 
$ mkdir -p storage/framework/cache/data storage/framework/views storage/framework/testing
```
#### copy and edit .env file
```
$ cp .env.example .env
$ vi .env
```

#### install vendors
```
$ php composer.phar install
```

#### create database
```
$ php artisan migrate
```

