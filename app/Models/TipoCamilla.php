<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCamilla extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function camilla(){
        return $this->hasOne(Camilla::class);
    }
}
