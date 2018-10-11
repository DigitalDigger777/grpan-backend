<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GameCategory
 * @package App
 */
class GameCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'locale'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games()
    {
        return $this->hasMany('App\Game');
    }
}
