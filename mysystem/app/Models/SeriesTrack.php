<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeriesTrack extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raceseriesmap';

    protected $fillable = [
        'rsm_id',
        'rs_id',
        'm_id',
        'rsm_mo',
        'created_at',
        'updated_at',
        'rsm_extra',
        'rsm_state',
        'rsm_mcount'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rsm_id';

            
    public function track()
    {
        return $this->belongsTo(Track::class,'m_id','m_id');
    }
    
}