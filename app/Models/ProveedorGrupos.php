<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveedorGrupos extends Model
{
    /**
     * Proveedor Grupos Table
     *
     * @var string
     */
    protected $table = 'proveedor_grupos';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Relation: One to Many (Inverse)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
