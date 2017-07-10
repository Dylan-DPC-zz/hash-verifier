<?php

namespace Dpc\HashVerifier;


interface HMacValidatorContract
{
    public function verify(array $params);
}