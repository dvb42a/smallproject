<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TrackState extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'maprankingstate';

    protected $fillable = [
        'mrs_id',
        'mrs_name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'mrs_id';

    
}