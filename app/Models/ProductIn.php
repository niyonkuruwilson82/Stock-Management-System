<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductIn extends Model
{
    use HasFactory;

    protected $table = 'product_ins'; // Ensure this matches your DB table
    protected $primaryKey = 'InCode'; // Use 'InCode' if it's your actual PK
    public $incrementing = true;
    protected $keyType = 'int';

    // Correct fillable fields to match your controller's input
    protected $fillable = [
        'PCode',
        'prIn_Date',
        'prIn_Quantity',
        'prIn_Unit_Price',
        'prIn_TotalPrice'
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'PCode');
    }
}
