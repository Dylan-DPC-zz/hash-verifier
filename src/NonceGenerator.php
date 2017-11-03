<?php

namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;
use function Sodium\randombytes_buf;

class NonceGenerator implements NonceContract
{
    /**
     * Generate a random nonce
     *
     * @return string
     */
    public function generate(): string
    {
        $nonce = base64_encode(randombytes_buf(\Sodium\CRYPTO_SECRETBOX_NONCEBYTES));
        $this->store($nonce);
        return $nonce;
    }

    /**
     * Store a nonce to the config file
     *
     * @param string $nonce
     *
     * @return void
     */
    public function store(string $nonce): void
    {
        session('nonce', $nonce);
    }

    /**
     * Check if the nonce matches the stored nonce
     *
     * @param string $stored
     * @param string $nonce
     *
     * @return bool
     */
    public function matches(string $nonce, string $stored): bool
    {
        return $nonce && $stored === $nonce;
    }

    /**
     * Returns the nonce stored in the session by calling store()
     *
     * @return string
     */
    public function getStoredNonce(): string
    {
        return session('nonce');
    }
}
