<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;


    
}
