<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'name',
        'year_founded',
        'city'
    ];


    /**
     * An school belongs to a teacher
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }
}
