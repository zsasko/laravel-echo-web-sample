# Laravel Echo Web Sample

This project is sample application displaying how user can create and broadcast Laravel Echo message to clients (web and android applications). 

![](https://cdn-images-1.medium.com/max/800/1*m8hG2m8mmC3gXULQ_HZawA.gif)

It's a source code for the following article on the medium:

- www.mediumg.com

**As an initial setup of project, make sure that you have executed the following commands:**
```
    npm install
    composer install
    php artisan key:generate
    php artisan config:clear
    php artisan serve
```
**And you need to start Laravel Echo Server by executing the following command (in separate console):**
```
laravel-echo-server start
```

After you have configured all dependencies, you can access messages web page from where you can send Echo messages:
- http://localhost:8000/messages

