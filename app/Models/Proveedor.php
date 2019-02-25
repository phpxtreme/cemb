<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class Proveedor extends Authenticatable
{
    use Notifiable;

    /**
     * Proveedores Table
     *
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'active' => 'bool'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
