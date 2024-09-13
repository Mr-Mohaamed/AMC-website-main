<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
    public function details()
    {
        return $this->hasMany(About::class);
    }
    
    public function technologies()
    {
        return $this->belongsToMany(Tech::class ,'item_teches');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
