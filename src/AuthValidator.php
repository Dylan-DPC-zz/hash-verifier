<?php

namespace Dpc\HashVerifier;


use Illuminate\Database\Eloquent\Model;

class AuthValidator implements AuthValidatorContract
{
    protected $generator;

    protected $validator;

    /**
     * AuthValidator constructor.
     * @param $generator
     * @param $validator
     */
    public function __construct(NonceContract $generator, HMacValidatorContract $validator)
    {
        $this->generator = $generator;
        $this->validator = $validator;
    }

    public function generateNonce(): string
    {
        return $this->generator->generate();
    }

    public function matches(string $nonce, string $stored)
    {
        return $this->generator->matches($nonce, $nonce);
    }

    public function validate(array $params)
    {
        return $this->validator->verify($params);
    }

}