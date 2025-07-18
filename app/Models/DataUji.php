<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUji extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'data_uji';
    protected $guarded = [];

    public function pulau()
    {
        return $this->belongsTo(DataPesisir::class, 'id_pulau', 'id');
    }

    public function sample()
    {
        return $this->hasMany(SampelUji::class, 'id_uji', 'id');
    }

}
