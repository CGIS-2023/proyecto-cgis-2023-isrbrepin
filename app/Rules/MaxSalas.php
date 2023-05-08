<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Medico;

class MaxSalas implements Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        $medico = Medico::withCount('salas')->findOrFail($value);
        return $medico->salas_count < $this->max;
    }

    public function message()
    {
        return "El medico ya tiene asignadas el máximo de {$this->max} salas permitidas.";
    }
}