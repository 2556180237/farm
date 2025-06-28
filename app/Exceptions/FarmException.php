<?php

namespace App\Exceptions;

use Exception;

class FarmException extends Exception
{
    /**
     * Конструктор исключения
     *
     * @param string $message Сообщение об ошибке
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
