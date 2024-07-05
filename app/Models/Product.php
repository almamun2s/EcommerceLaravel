<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImg()
    {
        if (($this->image != null) && (file_exists(public_path('uploads/products/' . $this->image)))) {
            return url('uploads/products/' . $this->image);
        }
        return url('uploads/no_image.jpg');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
