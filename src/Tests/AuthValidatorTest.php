<?php

use Dpc\HashVerifier\AuthValidator;
use PHPUnit\Framework\TestCase;

/**
 * @covers AuthValidator
 */
class AuthValidatorTest extends TestCase
{
    /**
     * @var AuthValidator
     */
    private $validator;

    public function setup(): void
    {
        $this->validator = new AuthValidator(
            $this->createMock(NonceContract::class),
            $this->createMock(HMacValidatorContract::class)
        );
    }

    public function testGenerateNonce(): void
    {
    }

    public function testMatches(): void
    {
    }

    public function testValidate(): void
    {
    }
}
