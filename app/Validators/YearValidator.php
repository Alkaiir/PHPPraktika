<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class YearValidator extends AbstractValidator
{

    protected string $message = 'Year :field is not in range (1901 - 2155)';

    public function rule(): bool
    {

        return $this->value > 1900 && $this->value < 2156;
    }
}
