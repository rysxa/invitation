![logo-nicewone-transparant](https://user-images.githubusercontent.com/61085159/136768781-70ed6680-38bb-40a0-a8cf-79722d2e6b92.png)

## Introduction

Thank you Laravel 8 for helping me finish my project quickly, thank you also for the website theme that I got for free ^-^

- [Home Page](https://nicewone.com).
- [Login User Page](https://nicewone.com/login).
- [Registration User Page](https://nicewone.com/register). first register automatically becomes admin, and then becomes user
- [Frontend Page Example](https://nicewone.com/rara). must be accompanied by parameters as URI

## Installation Local Project

```elixir 
git clone https://github.com/indrysfa/invitation.git
```

then

```elixir 
composer install
```

then 

- Create database with name *invitation*

```elixir 
php artisan migrate:fresh --seed
```

- Create account gmail as admin mail
- Setting like this

![image](https://user-images.githubusercontent.com/61085159/143204629-acc6b5aa-a326-4450-96a3-e9066ce131f5.png)
- Setting *.env* like this

```elixir
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=email-kamu@gmail.com
MAIL_PASSWORD=password-kamu
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=no-reply@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

```elixir
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=invitation
DB_USERNAME=root
DB_PASSWORD=
```

## Aplication Wedding Invitation
![image](https://user-images.githubusercontent.com/61085159/116580830-f2690480-a93d-11eb-97f0-1e425e00f001.png)
![image](https://user-images.githubusercontent.com/61085159/116580892-ff85f380-a93d-11eb-90d7-7f2c20229f27.png)

Message sayings be happy
![image](https://user-images.githubusercontent.com/61085159/116580942-0d3b7900-a93e-11eb-8178-36010b367c24.png)
![image](https://user-images.githubusercontent.com/61085159/116581287-5ee40380-a93e-11eb-82e8-2b45f9a6a3af.png)

RSVP Attendance
![image](https://user-images.githubusercontent.com/61085159/116581231-5095e780-a93e-11eb-9472-95e7b1a14b40.png)

# Donate
Support author https://saweria.co/donate/sailingxlt
