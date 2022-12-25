<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBlog extends Model
{
    use HasFactory;

    protected $table = "news_blog";
    protected $primaryKey = "id";

    const UPDATED_AT = 'modified_at'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'metatitle',
        'metakeyword',
        'metadesc',
        'type',
        'title',
        'description',
        'short_desc',
        'image',
        'list_image',
        'status'
    ];
}
