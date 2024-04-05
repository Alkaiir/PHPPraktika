<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class SizeValidator extends AbstractValidator
{

    protected string $message = 'Image :field is too large';

    public function rule(): bool
    {

        return !$this->value['size'] < 200001;
    }
}
