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
Inject the nonce generator contract and/or HMAC validator contract in your class:
```php
  public function __construct(NonceContract $generator)
    {
        $this->generator = $generator;
    }
```
To generate a nonce: 
```php
$nonce = $this->generator->generateNonce($user)
```
The nonce will be automatically stored in the session with key as `nonce'. To retrieve it call:
```php
$nonce = $this->generator->getStoredNonce();
```

Ensure that you do not mutate the nonce.


To verify whether the nonce matches

```php
$nonceMatches = $this->generator->matches($user, $nonce);
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

## Author

[Dylan DPC](https://github.com/Dylan-DPC)

## Versioning

This package follows semver. Features introduced & any breaking changes created in major releases are mentioned in releases.

## Support

If you need help or have any questions you can:

* Create an issue here
* Send a tweet to @DPC_22
* Email me at dylan.dpc@gmail.com
* DM me on the [larachat](https://larachat.co) slack team (@Dylan DPC)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
