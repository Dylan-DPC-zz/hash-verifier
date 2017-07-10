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

    public function generateNonce(Model $content): string
    {
        return $this->generator->generate($content);
    }

    public function validate(array $params)
    {
        return $this->validator->verify($params);
    }

}