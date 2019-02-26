<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoItems extends Model
{
    /**
     * Grupo Items Table
     *
     * @var string
     */
    protected $table = 'grupo_items';

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
    public function grupo()
    {
        return $this->belongsTo(ProveedorGrupos::class);
    }
}
