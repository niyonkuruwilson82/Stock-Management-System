<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'PCode'; // because default is 'id'
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['PName'];

    // Relationship: One product has many ProductIn records
    public function productIns()
    {
        return $this->hasMany(ProductIn::class, 'PCode');
    }

    // Relationship: One product has many ProductOut records
    public function productOuts()
    {
        return $this->hasMany(ProductOut::class, 'PCode');
    }
}
