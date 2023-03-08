<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docrequests extends Model
{
    use HasFactory;

    protected $table = "doc_request";
    protected $primaryKey = "id";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doc_user_id',
        'product_id',
        'accessin',
        'request_date',
    ];
}
