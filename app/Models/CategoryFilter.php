<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFilter extends Model
{
    use HasFactory;

    protected $table = "category_filter";
    protected $primaryKey = "category_filterid";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'catregory_id',
        'filter_id',
        'value',
        'status'
    ];
}
