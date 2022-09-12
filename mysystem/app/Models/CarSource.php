<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartype extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raceseriescarsource';

    protected $fillable = [
        'rscs_id',
        'rs_id',
        'c_id',
        'rsds_source',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rscs_id';
        

    
}