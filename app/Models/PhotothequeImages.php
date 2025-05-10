<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotothequeImages extends Model
{
    use HasFactory;
    protected $table = 'phototeque_images';


    protected $fillable = ['phototheque_id', 'image_path'];

    public function phototheque()
    {
        return $this->belongsTo(Phototheque::class);
    }
}
