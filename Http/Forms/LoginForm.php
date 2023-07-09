<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    public $attributes =[];
    protected $errors = [];

    public function __construct($attributes)
    {
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'provide a valid email';
        }

        if (! Validator::string($attributes['password'])) {
            $this->errors['password'] = 'provide a valid pass';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;

        return $this;
    }
}