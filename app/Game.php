<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 * @package App
 */
class Game extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'image', 'locale',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\GameCategory');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonials()
    {
        return $this->hasMany('App\Testimonial');
    }
}
