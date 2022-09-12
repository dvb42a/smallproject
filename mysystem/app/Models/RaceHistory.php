<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RaceHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'racehistory';

    protected $fillable = [
        'rh_id',
        'rh_time',
        'c_id',
        'rs_id',
        'm_id',
        'rs_source',
        'created_at',
        'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rh_id';

    
}