<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeriesState extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raceseriesstate';

    protected $fillable = [
        'rss_id',
        'rss_name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rss_id';

    
}