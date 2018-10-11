<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * @package App
 */
class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city', 'ordering', 'locale'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\JobCategory');
    }
}
