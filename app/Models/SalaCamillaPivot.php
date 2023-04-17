<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SalaCamillaPivot extends Pivot
{
    //Por limitaciones de Laravel, no se puede castear de String (como se almacenan las fechas en BBDD) a fecha
    //los datos sacados de una tabla intermedia (pivot) sin definir esta clase y usándola en el blongsToMany
}
