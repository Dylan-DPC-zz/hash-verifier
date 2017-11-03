<?php
namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;
use function Sodium\randombytes_buf;

class NonceGenerator implements NonceContract
{
    public function generate(): string
    {
        $nonce = base64_encode(randombytes_buf(\Sodium\CRYPTO_SECRETBOX_NONCEBYTES));
        $this->store($nonce);
        return $nonce;
    }

    public function store(string $nonce): void
    {
        session('nonce', $nonce);
    }

    public function matches(string $nonce, string $stored): bool
    {
        return $nonce && $stored === $nonce;
    }
}