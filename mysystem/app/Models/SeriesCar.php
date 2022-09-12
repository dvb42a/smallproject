<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeriesCar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carinraceseries';

    protected $fillable = [
        'crs_id',
        'rs_id',
        'c_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'rsm_id';

    public function driver()
    {
        return $this->belongsTo(Driver::class,'d_id','d_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class,'c_id','c_id');
    }
    
}