<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $primaryKey = "product_id";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'image',
        'status',
        'order_by',
        'metatitle',
        'metakeyword',
        'metadesc',
        'short_desc',
        'description1',
        'adv_heading',
        'certification',
        'adv_title1',
        'adv_desc1',
        'adv_title2',
        'adv_desc2',
        'adv_title3',
        'adv_desc3',
        'adv_title4',
        'adv_desc4',
        'banner_image',
        'adv_img1',
        'adv_img2',
        'adv_img3',
        'list_image',
        'adv_img4',
        'manufacture_id'
    ];
}
