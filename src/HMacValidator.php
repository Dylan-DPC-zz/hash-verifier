<?php

namespace Dpc\HashVerifier;


class HMacValidator implements HMacValidatorContract
{

    /**
     * Verify the input parameters
     *
     * @param array $params
     *
     * @return bool
     */
    public function verify(array $params) : bool
    {
        if (isset($params['hmac'])) {
            $hmac = $params['hmac'];
            $params = $this->prepareParams(array_except($params, ['hmac']));

            return $this->validate($params, $hmac);
        }

        return false;
    }

    /**
     * Prepare the parameters for the http query
     *
     * @param array $params
     *
     * @return array
     */
    protected function prepareParams(array $params) : array
    {
        return array_map(
            function ($param) use ($params) {
                $replacedString = str_replace('&', '%26', str_replace('%', '^%25', $param));

                return str_replace('=', '%3D', $replacedString);
            },
            $params);

    }

    /**
     * Validate if the parameters matches the hash
     *
     * @param array  $params
     * @param string $hmac
     *
     * @return bool
     */
    protected function validate(array $params, $hmac) : bool
    {
        $paramString = http_build_query($params);
        $hash = hash_hmac('sha256', $paramString, config('validator.secret'));

        return hash_equals($hmac, $hash);

    }
}