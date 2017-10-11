<?php

namespace Dpc\HashVerifier;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface NonceContract
 * @package Dpc\HashVerifier
 */
interface NonceContract
{
    /**
     * Generate a random nonce
     *
     * @param Model $content
     *
     * @return string
     */
    public function generate(Model $content) : string;

    /**
     * Store a nonce to the config file
     *
     * @param Model  $content
     * @param string $nonce
     *
     * @return void
     */
    public function store(Model $content, string $nonce) : void;

    /**
     * Check if the nonce matches the stored nonce
     *
     * @param Model  $content
     * @param string $nonce
     *
     * @return bool
     */
    public function matches(Model $content, string $nonce) : bool;
}
