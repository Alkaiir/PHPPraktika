<?php

namespace Validators;

use Src\Validator\AbstractValidator;
use Model\Bookinstance;
class BookInStockValidator extends AbstractValidator
{

    protected string $message = 'Книга уже кому-то выдана';

    public function rule(): bool
    {
        $book_avaible = 1;

        $book_instances = Bookinstance::all();

        foreach ($book_instances as $book_instance) {
            if ($book_instance->book_name === $this->value) {
                if ($book_instance->in_stock === 0) {
                    $book_avaible = 0;
                }
            }
        }

        return $book_avaible === 1;
    }
}
