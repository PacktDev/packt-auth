# packt-auth

This package defines the basis of O365 login for all Packt Platforms

## Installation

You can install the package via composer:

```bash
composer require packtdev/packt-auth
```

Publish and run the required migrations using:

```bash
php artisan vendor:publish --provider="Packt\PacktAuth\PacktAuthServiceProvider" --tag="packt-auth-migrations"
php artisan migrate
```

## Usage

1. add the PacktAuthTrait to your User Model
2. Update your .env file to include:                       
   AZURE_REDIRECT_URI=  
   AZURE_CLIENT_ID=  
   AZURE_CLIENT_SECRET=
   
3. Add `@include('packt-auth::auth.azure')` to your login form
4. You can override the default redirect by defining `$authRedirect` in your User model

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
