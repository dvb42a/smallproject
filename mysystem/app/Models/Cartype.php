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
    protected $table = 'cartype';

    protected $fillable = [
        'ct_id',
        'ct_name',
        'created_at',
        'updated_at',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'ct_id';
        

    
}