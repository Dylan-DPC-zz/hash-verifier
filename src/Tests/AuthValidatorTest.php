<?php

use Dpc\HashVerifier\AuthValidator;
use Dpc\HashVerifier\HMacValidator;
use Dpc\HashVerifier\NonceGenerator;
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
            $this->createMock(NonceGenerator::class),
            $this->createMock(HMacValidator::class)
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
