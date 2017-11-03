<?php

namespace Dpc\HashVerifier;


use Illuminate\Database\Eloquent\Model;

interface AuthValidatorContract
{

    public function generateNonce(): string;

    public function matches(string $nonce, string $stored);

    public function validate(array $params);
}