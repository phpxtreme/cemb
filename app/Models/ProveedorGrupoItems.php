<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveedorGrupoItems extends Model
{
    /**
     * Grupo Items Table
     *
     * @var string
     */
    protected $table = 'proveedor_grupo_items';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relation: One to Many (Inverse)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(ProveedorGrupos::class, 'grupo_id', 'id');
    }
}
