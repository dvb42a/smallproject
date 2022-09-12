<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'driverdata';

    protected $fillable = [
        'd_id',
        'd_name',
        'd_num',
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'd_id';

    public function car()
    {
        return $this->belongsTo(cardata::class,'c_id','c_id');
    }
    
}