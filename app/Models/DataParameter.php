<?php

namespace App\Models;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataParameter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'data_parameter';
    protected $guarded = [];

    public function get_data()
    {
        return $this->belongsTo(Parameter::class, 'id_parameter', 'id');
    }
}
