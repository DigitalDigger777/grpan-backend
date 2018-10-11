<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobCategory
 * @package App
 */
class JobCategory extends Model
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
    public function jobs()
    {
        return $this->hasMany('App\Jobs');
    }
}
