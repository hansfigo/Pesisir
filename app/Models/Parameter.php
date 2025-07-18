<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'parameter';
    protected $guarded = [];

    public function gol_parameter()
    {
        return $this->belongsTo(GolonganParameter::class, 'id_gol', 'id');
    }

    public function sampel()
    {
        return $this->hasMany(SampelUji::class, 'id_parameter', 'id');
    }
}
