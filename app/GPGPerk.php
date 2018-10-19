<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GPGPerk extends Model
{

    protected $table = 'gpg_perk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'ordering', 'locale'
    ];
}
