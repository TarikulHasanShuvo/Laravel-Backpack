<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Category;

class Product extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'color',
        'size',
        'price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
