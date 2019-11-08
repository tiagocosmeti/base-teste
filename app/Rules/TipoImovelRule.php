<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TipoImovelRule implements Rule
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
        $tipo_imovel = $value;

        if(in_array(strtolower($tipo_imovel), ['apartamento', 'casa', 'sítio', 'andar']))
            return true;

        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tipo de imóvel inválido';
    }
}
