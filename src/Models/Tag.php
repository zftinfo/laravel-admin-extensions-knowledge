<?php

namespace ZFTInfo\Knowledge\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 't_tag';

    protected $fillable = [
        'name',
        'desc' 
    ];

}
