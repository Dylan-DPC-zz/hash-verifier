<?php

namespace Dpc\HashVerifier;


use Illuminate\Database\Eloquent\Model;

interface AuthValidatorContract
{

    public function generateNonce(Model $content): string;

    public function matches(Model $content, string $nonce);

    public function validate(array $params);
}