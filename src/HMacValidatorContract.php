<?php

namespace Dpc\HashVerifier;

/**
 * Interface HMacValidatorContract
 * @package Dpc\HashVerifier
 */
interface HMacValidatorContract
{
    /**
     * Verify the input parameters
     *
     * @param array $params
     *
     * @return bool
     */
    public function verify(array $params) : bool;
}
