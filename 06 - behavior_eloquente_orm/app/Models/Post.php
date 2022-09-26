<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = array('title', 'subtitle', 'description');
    protected $guarded = array();

    public $timestamps = true;
//    public const CREATED_AT = 'creation_date';
//    public const UPDATED_AT = 'last_update';
}
