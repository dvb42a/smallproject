<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mapdata';

    protected $fillable = [
        'm_name',
        'm_safe',
        'm_smooth',
        'm_cont',
        'm_design',
        'm_pro',
        'm_rate',
        'm_photopath',
        'm_photoname',
        'm_final',
        'm_finalrate',
        'created_at',
        'created_at',
        'updated_at',
        'mrs_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'm_id';
        
    public function trackstate()
    {
        return $this->belongsTo(Trackstate::class,'mrs_id','mrs_id');
    }
        
    
}