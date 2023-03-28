<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];    

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);   
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
