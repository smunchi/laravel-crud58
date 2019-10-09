<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BookTypeNotIn implements Rule
{
    private $request;
    private $type;

    public function __construct($type)
    {
        $this->request = request()->all();
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, $this->type) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Type is not correct";
    }
}
