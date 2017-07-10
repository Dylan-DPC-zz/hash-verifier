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
            config('nonce.key') => $nonce,
        ]);
    }

    public function matches(Model $content, string $nonce): bool
    {
        return $nonce && data_get($content, $nonce) === $nonce;
    }
}