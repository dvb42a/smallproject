<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MapState extends Model
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
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'mrs_id';


    
}