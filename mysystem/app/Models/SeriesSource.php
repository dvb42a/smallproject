<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeriesSource extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raceseriesgetsource';

    protected $fillable = [
        'rssgs_id',
        'rssgs_s',
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rssgs_id';

    
}