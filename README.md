# hash-verifier

hash verification using a nonce & verifying the hmac from the URL for a laravel application

## Installation

```bash
composer require dpc/hash-verifier
```

The service provider will be automatically discovered in Laravel 5.5. Publish the config file by running:
```bash
php artisan vendor:publish --provider="Dpc\HashVerifier\AuthValidatorServiceProvider"
```

This will create a `validator.php` in your config folder. The key indicates the attribute in your `User` table where you are storing the nonce. 

> Do not use your secret directly in config file. Instead fetch it from the `.env` or server environment variables.

## Usage
Inject the validator contract in your class:
```php
  public function __construct(AuthValidatorContract $validator)
    {
        $this->validator = $validator;
    }
```
To generate a nonce: 
```php
$nonce = $this->validator->generateNonce($user)
```
Ensure that you do not mutate the nonce.


To verify whether the nonce matches, 

```php
$nonceMatches = $this->validator->matches($user, $nonce);
```

To validate if the hmac matches the components of the URL: 

```php
$result = $this->validator->validate($uriComponents));
```      

You can check this [repo](https://github.com/themeanorak/laravel-shopify/blob/master/src/Modules/Auth.php) for further details on how to use this package

### Versioning
This package follows [semver](http://semver.org/). Features introduced & any breaking changes created in major releases are mentioned in [releases](https://github.com/Dylan-DPC/hash-verifier/releases). 

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## Credits

[Dylan DPC](https://github.com/Dylan-DPC)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
