<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

abstract class Request extends FormRequest
{
    public function __construct(){
        Validator::extendImplicit('checkbox', function($attribute, $value, $parameters, $validator) {
            if(!$this->has($attribute) || $this->input($attribute) == '0'){
                $this->getInputSource()->set($attribute, '0');
            }
            else {
                $this->getInputSource()->set($attribute, '1');
            }

            return true;
        });

        Validator::extend('urlschemes',  function($attribute, $value, $parameters, $validator) {
            /*
             * This pattern is derived from Symfony\Component\Validator\Constraints\UrlValidator (2.7.4).
             *
             * (c) Fabien Potencier <fabien@symfony.com> http://symfony.com
             */
            $schemes = '';
            foreach($parameters as $paramater){
                $schemes .= preg_quote($paramater, '~').'|';
            }

            $pattern = '~^
                (('.$schemes.'))://                                 # protocol
                (([\pL\pN-]+:)?([\pL\pN-]+)@)?          # basic auth
                (
                    ([\pL\pN\pS-\.])+(\.?([\pL]|xn\-\-[\pL\pN-]+)+\.?) # a domain name
                        |                                              # or
                    \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}                 # a IP address
                        |                                              # or
                    \[
                        (?:(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){6})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:::(?:(?:(?:[0-9a-f]{1,4})):){5})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){4})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,1}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){3})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,2}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){2})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,3}(?:(?:[0-9a-f]{1,4})))?::(?:(?:[0-9a-f]{1,4})):)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,4}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,5}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,6}(?:(?:[0-9a-f]{1,4})))?::))))
                    \]  # a IPv6 address
                )
                (:[0-9]+)?                              # a port (optional)
                (/?|/\S+|\?\S*|\#\S*)                   # a /, nothing, a / with something, a query or a fragment
            $~ixu';

            return preg_match($pattern, $value) > 0;
        });

        Validator::replacer('urlschemes', function($message, $attribute, $rule, $parameters){
            $schemes = implode(', ', $parameters);

            return str_replace(':urlschemes', $schemes, $message);
        });

        Validator::extend('float', function($attribute, $value, $parameters, $validator){
            $decimalSize = (int)$parameters[0];
            $fractionSize = (int)$parameters[1];
            $decimalSize -= $fractionSize;

            $pattern = '/^(?:-|\+)?\d{1,'.$decimalSize.'}(?:\.\d{1,'.$fractionSize.'})?$/';

            return preg_match($pattern, $value) > 0;
        });

        Validator::replacer('float', function($message, $attribute, $rule, $parameters){
            $decimalSize = (int)$parameters[0];
            $fractionSize = (int)$parameters[1];
            $decimalSize -= $fractionSize;

            return str_replace([':decimalsize', ':fractionsize'], [$decimalSize, $fractionSize], $message);
        });
    }

    public function onlyRules($except = null, $additional = null){
        return formRequestTrimKeys($this, $except, $additional);
    }

    public function validate()
    {
        $instance = $this->getValidatorInstance();

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        } elseif (! $instance->passes()) {
            $this->failedValidation($instance);
        }

        if (method_exists($this, 'afterValidation')) {
            if(!$this->container->call([$this, 'afterValidation'], [$instance])){
                $this->failedValidation($instance);
            }
        }
    }
}
