<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Category;
use App\Models\Mutators\ImageMutator;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use ImageMutator;

    protected $fillable = [
        'category_id',
        'name',
        'color',
        'size',
        'image',
        'price',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            $data = Product::find($obj->id);
            if (!empty(public_path($data->image))) File::delete(public_path($data->image));
        });
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value): void
    {
        static::saveImage($value, 'image');
    }
}
