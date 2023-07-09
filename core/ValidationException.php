<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $old;
    protected $errors = [];
    public static function throw($errors, $old)
    {
        $instance = new static('the form failed');

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

    public function errors()
    {
        return $this->errors;
    }
}