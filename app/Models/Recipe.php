<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * Perteneces y tienes muchas
     * Esto es para trabajar con muchos a muchos
     */

     /**
      * Esta configuración es para la asignación masiva de
      * datos
      * @var array
      */
     protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'image',
     ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
