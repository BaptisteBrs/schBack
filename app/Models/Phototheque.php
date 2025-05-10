<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phototheque extends Model
{
    use HasFactory;
    protected $table = 'phototeque';

    protected $fillable = ['titre', 'sous_titre', 'date', 'image_couverture'];

    public function images()
    {
        return $this->hasMany(PhotothequeImages::class);
    }
}
