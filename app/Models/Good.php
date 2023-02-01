<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'model',
        'information',
        'user_id',
        'size',
        'memory',
        'weight',
        'brand_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
