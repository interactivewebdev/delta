<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    use HasFactory;

    protected $table = "site_images";
    protected $primaryKey = "site_images_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'type_id',
        'title',
        'image',
        'link',
        'status',
        'order_by'
    ];
}
