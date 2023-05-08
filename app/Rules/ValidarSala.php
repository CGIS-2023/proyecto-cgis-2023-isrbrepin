<?php

namespace App\Rules;

use App\Models\Patologia;
use App\Models\Sala;
use Illuminate\Contracts\Validation\Rule;

class AsignarPlantaRule implements Rule
{
    protected $patologia;
    protected $sala;

    protected $patologias = [
        'cardiológico' => 1,
        'neurológico' => 2,
        'gastrointestinal' => 3,
        'respiratorio' => 4,
        'traumatológico' => 5,
    ];

    public function __construct($patologia, Sala $sala)
    {
        $this->patologia = $patologia;
        $this->sala = $sala;
    }

    public function passes($attribute, $value)
    {
        // Verificar que la patología es válida
        if (! isset($this->patologias[$value])) {
            return false;
        }

        // Asignar la planta correspondiente
        $planta = $this->patologias[$value];
        return $this->sala->planta == $planta;
    }

    public function message()
    {
        return 'La patología no coincide con la planta asignada.';
    }
}