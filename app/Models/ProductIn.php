<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductIn extends Model
{
    use HasFactory;

    protected $table = 'product_ins';
    protected $primaryKey = 'ProductIn_id'; // ✅ This matches your actual DB column
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'PCode',
        'prIn_Date',
        'prIn_Quantity',
        'prIn_Unit_Price',
        'prIn_TotalPrice',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'PCode', 'PCode');
    }
}
