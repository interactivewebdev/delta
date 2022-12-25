<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "content";
    protected $primaryKey = "id";

    const UPDATED_AT = "modified_at";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'short_desc',
        'description',
        'image',
        'list_image',
        'order_by',
        'status'
    ];
}
