<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VerificarCep implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cep = trim($value);

        if(!preg_match('/^[0-9]{5,5}([-][0-9]{3,3})?$/', $cep)) 
            return false;

        else
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute inválido';
    }
}
