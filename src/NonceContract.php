<?php

namespace Dpc\HashVerifier;


interface NonceContract
{
    public function generate() : string;

    public function store(string $nonce);

    public function matches(string $nonce, string $stored): bool;
}