<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class YearValidator extends AbstractValidator
{

    protected string $message = 'Значение :field не 4-х значное или больше текущего года';

    public function rule(): bool
    {

        $time_now = time();
        $year_now = date('Y',$time_now);

        return $this->value > 999 && $this->value < $year_now;
    }
}
