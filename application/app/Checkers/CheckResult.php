<?php

namespace App\Checkers;

use App\Exceptions\BaseException;

class CheckResult
{
    private $result;
    private $message;

    public function __construct($result, $message = '')
    {
        $this->result = $result;
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isOK() { return $this->result; }

    /**
     * @return bool
     */
    public function isFailed() { return !($this->result); }

    /**
     * @return string
     */
    public function getMessage() { return $this->message; }

    /**
     * @return $this
     * @throws BaseException
     */
    public function throwOnFail()
    {
        if(!$this->isOK())
        {
            throw new BaseException($this->message);
        }
        else
        {
            return $this;
        }
    }

    /**
     * @return $this
     * @throws BaseException
     */
    public function throwOnOK()
    {
        if($this->isOK())
        {
            throw new BaseException($this->message);
        }
        else
        {
            return $this;
        }
    }
}