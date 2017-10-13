<?php

namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;

interface AuthValidatorContract
{

    /**
     * Generate a nonce
     *
     * @param Model $content
     *
     * @return string The generated nonce
     */
    public function generateNonce(Model $content) : string;

    /**
     * Check if the nonce matches the saved nonce
     *
     * @param Model  $content
     * @param string $nonce
     *
     * @return bool
     */
    public function matches(Model $content, string $nonce) : bool;

    /**
     * Validate the parameters
     *
     * @param array $params
     *
     * @return bool
     */
    public function validate(array $params) : bool;
}
