<?php

namespace Dpc\HashVerifier;



interface NonceContract
{
    /**
     * Generate a random nonce
     * @return string
     */
    public function generate() : string;

    /**
     * Store a nonce to the config file
     *
     * @param string $nonce
     *
     * @return void
     */
    public function store(string $nonce);

    /**
     * Check if the nonce matches the stored nonce
     *
     * @param string $nonce
     * @param string $stored
     *
     * @return bool
     */
    public function matches(string $nonce, string $stored): bool;
}
