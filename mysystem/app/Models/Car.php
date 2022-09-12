<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cardata';

    protected $fillable = [
        'c_id',
        'c_name',
        'c_sname',
        'ct_id',
        'd_id',
        'c_photopath',
        'c_photoname',
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'c_id';

    public function cartype()
    {
        return $this->belongsTo(cartype::class,'ct_id','ct_id');
    }
        
    public function driver()
    {
        return $this->belongsTo(Driver::class,'d_id','d_id');
    }

    
}