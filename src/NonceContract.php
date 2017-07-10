<?php

namespace Dpc\HashVerifier;


use Illuminate\Database\Eloquent\Model;

interface NonceContract
{
    public function generate(Model $content) : string;

    public function store(Model $content, string $nonce);

    public function matches(Model $content, string $nonce): bool;
}