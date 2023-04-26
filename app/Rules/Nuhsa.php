<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Nuhsa implements Rule
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
        if(strlen($value) != 12 || substr($value, 0, 2) != 'AN' || !is_numeric(substr($value, 2))){
            return false;
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('Nusha no válido');
    }
}
