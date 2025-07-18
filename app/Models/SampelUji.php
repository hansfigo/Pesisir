<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampelUji extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'sampel_uji';
    protected $guarded = [];

    public function param()
    {
        return $this->hasOne(Parameter::class, 'id', 'id_parameter');
    }

    public function get_data()
    {
        return $this->hasOne(DataParameter::class, 'id_parameter', 'id_parameter');
    }

    public function get_year()
    {
        return $this->belongsTo(DataUji::class, 'id_uji', 'id');
    }
}
