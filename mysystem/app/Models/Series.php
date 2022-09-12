<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Series extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'raceseries';

    protected $fillable = [
        'rs_id',
        'rs_name',
        'ct_id',
        'rem_id',
        'drs_id',
        'rs_photopath',
        'rs_photoname',
        'created_at',
        'updated_at',
        'rss_id',
        'rs_mstate',
        'rs_cstate',
        'rs_order',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'd_id';

    public function SeriesState()
    {
        return $this->belongsTo(SeriesState::class,'rss_id','rss_id');
    }

    public function Cartype()
    {
        return $this->belongsTo(Cartype::class,'ct_id','ct_id');
    }
    
}