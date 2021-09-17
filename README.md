<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Proyecto

This project allows to interact with the Spotify API where an endpoint was created to get all the albums of an band.

## Get Starting

1. Clone or download this repository to your project folder.
1. Run `composer install` on root of this project.
1. Setup your `.env` file (the clientId and ClientSecret of the Spotify app is required).
1. Run `php artisan serve` to run the project.

## Testing the application

To correctly perform the tests we suggest using [Postman](https://identity.getpostman.com/signup?continue=https%3A%2F%2Fgo.postman.co%2Fbuild).

### Get albums by band name

1. Open Postman and create a new `GET` request pointing to the following address: `http://127.0.0.1:8000/api/v1/albums`
1. In the `Header` tab, add (if it does not exist) a new key `Content-Type` with the value `application/json`.
1. In the `Params` tab add the following `KEY` and `VALUE`:
   
    | KEY | VALUE         |
    |-----|---------------|
    | q   | {{band-name}} |

> **NOTE:** The band name must be in dash-case (separated by hyphens). For example `the-beatles`.

1. Click on the `Send` button and the request will be sent to the project, you should receive a response with the status `200 Ok` and an array with the band albums introduced.
![](.\doc\images\response_band_albums.png)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
