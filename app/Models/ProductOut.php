<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductOut extends Model
{
    use HasFactory;

    protected $primaryKey = 'OutCode'; // or 'id' if default
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['PCode', 'Qty', 'DateOut'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'PCode');
    }
}
