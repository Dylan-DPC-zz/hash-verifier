<?php

namespace Dpc\HashVerifier\Exceptions;

class HashFailedException extends \Exception
{

    /**
     * HashFailedException constructor.
     */
    public function __construct()
    {
        parent::__construct('Hash Validation Failed');
    }
}
