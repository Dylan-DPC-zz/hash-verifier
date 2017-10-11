<?php

namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthValidator
 * @package Dpc\HashVerifier
 */
class AuthValidator implements AuthValidatorContract
{
    protected $generator;

    protected $validator;

    /**
     * AuthValidator constructor.
     *
     * @param NonceContract         $generator
     * @param HMacValidatorContract $validator
     */
    public function __construct(NonceContract $generator, HMacValidatorContract $validator)
    {
        $this->generator = $generator;
        $this->validator = $validator;
    }

    /**
     * Generate a nonce
     *
     * @param Model $content
     *
     * @return string The generated nonce
     */
    public function generateNonce(Model $content) : string
    {
        return $this->generator->generate($content);
    }

    /**
     * Check if the nonce matches the saved nonce
     *
     * @param Model  $content
     * @param string $nonce
     *
     * @return bool
     */
    public function matches(Model $content, string $nonce) : bool
    {
        return $this->generator->matches($content, $nonce);
    }

    /**
     * Validate the parameters
     *
     * @param array $params
     *
     * @return bool
     */
    public function validate(array $params) : bool
    {
        return $this->validator->verify($params);
    }

}
