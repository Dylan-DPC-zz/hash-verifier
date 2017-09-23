<?php

namespace Dpc\HashVerifier;


class HMacValidator implements HMacValidatorContract
{
    public function verify(array $params)
    {
        if (isset($params['hmac'])) {
            $hmac = $params['hmac'];
            $params = $this->prepareParams(array_except($params, ['hmac']));
            return $this->validate($params, $hmac);
        }
        return false;
    }

    protected function prepareParams(array $params)
    {
        return array_map(function ($param) use ($params) {
            $replacedString = str_replace('&', '%26', str_replace('%', '^%25', $param));
            return str_replace('=', '%3D', $replacedString);
        }, $params);

    }

    protected function validate(array $params, $hmac): bool
    {
        $paramString = http_build_query($params);
        $hash = hash_hmac('sha256', $paramString, config('validator.secret'));
        return hash_equals($hmac, $hash);

    }
}