
# Neon Login Authenticator

simple package for authentication using neon project

## installation & usag
install : composer require tirtoid/neon
publish component: php artisan vendor:publish --provider="Tirtoid\Neon\NeonServiceProvider"

usage : 

buat login controller dengan name "callback",
di login controller pakai neon login
use Tirtoid\Neon\Controllers\NeonController as Neon;
$neon = new Neon;
$data = $neon->login($request); // isinya respon dari neon

## URL Reference

#### Login PATH

```http 
  GET /neon/login
```
#### Logout PATH

```http
  GET /neon/logout
```

#### Check Session PATH

```http
  GET /neon/check-session
```
#### Check Email PATH

```http
  GET /neon/check-email/{email}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string email` | **Required**. Registered Email |



