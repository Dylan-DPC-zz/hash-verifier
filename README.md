# hash-verifier

hash verification using a nonce & verifying the hmac from the URL for a laravel application

## Installation

With composer

```bash
composer require dpc/hash-verifier
```

## Usage

Use required namespaces

```php
//...
use Dpc\HashVerifier\AuthValidatorContract;
use Dpc\HashVerifier\Exceptions\HashFailedException;
use Dpc\HashVerifier\Exceptions\NonceFailedException;
//...
```

Authorization confirm

```php
//...
public function confirmAuthorisation($user, string $url)
{
    $uriComponents = $this->getUriComponents($url);
    if(!$this->validator->matches($user, data_get($uriComponents, 'state'))) {
        throw new NonceFailedException();
    }
    if (!$this->validator->validate($uriComponents)) {
        throw new HashFailedException();
    }
    if (!$this->isValidHost($uriComponents)) {
        throw new InvalidHostException();
    }
    return $this->fetchToken($uriComponents);
}
//...
```

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
