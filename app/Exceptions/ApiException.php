<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/9/16
 * Time: 10:56 AM
 */

namespace App\Exceptions;


class ApiException extends \Exception
{
    protected $messages = [];

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     *
     * @return ApiException
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
        return $this;
    }
}