<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description', 'image_path', 'user_id'];

    public function carModels()
    {
       return $this->hasMany(CarModel::class);
    }

    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class,
            'Car_id', // Foreign key of CarModel teble
            'model_id' // Foreign key of Engine table 
        );
    }

    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'Car_id', // Foreign key of CarModel teble
            'model_id' // Foreign key of Engine table
        );
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
