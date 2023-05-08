<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Celador;

class MaxCamillas implements Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        $celador = Celador::withCount('camillas')->findOrFail($value);
        return $celador->camillas_count < $this->max;
    }

    public function message()
    {
        return "El celador ya tiene asignadas el máximo de {$this->max} camillas permitidas.";
    }
}
