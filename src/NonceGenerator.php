<?php
namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;
use function Sodium\randombytes_buf;

class NonceGenerator implements NonceContract
{
    public function generate(Model $content): string
    {
        $nonce = base64_encode(randombytes_buf(\Sodium\CRYPTO_SECRETBOX_NONCEBYTES));
        $this->store($content, $nonce);
        return $nonce;
    }

    public function store(Model $content, string $nonce): void
    {
        $content->update([
            config('validator.key') => $nonce,
        ]);
    }

    public function matches(Model $content, string $nonce): bool
    {
        $stored = data_get($content, config('validator.key'));
        if(!$stored) {
            throw new KeyNotFoundException();
        }
        return $nonce && $stored === $nonce;
    }
}