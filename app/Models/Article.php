<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title','slug', 'desc','img', 'views', 'status', 'publish_date'];
    

    // relasi ke category
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
