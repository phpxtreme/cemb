<?php

namespace App\Repositories;

use App\Models\ProveedorGrupos;

class ProveedorGruposRepository extends _Base implements _Interface
{
    /**
     * Select Proveedor Grupos
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return Module
     */
    public function select($opts = [], $one = false)
    {
        $model = new ProveedorGrupos();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create Proveedor Grupos
     *
     * @param array $opts
     * @param bool  $check
     *
     * @return bool
     */
    public function create($opts = [], $check = false)
    {
        if ($check) {
            if ($this->select($opts, true)) {
                return false;
            }
        }

        return ProveedorGrupos::create($opts);
    }

    /**
     * Remove Proveedor Grupos
     *
     * @param array $opts
     *
     * @return bool
     */
    public function remove($opts = [])
    {
        if (!$this->select($opts, true)) {
            return false;
        }

        return ProveedorGrupos::where($opts)->delete() ? true : false;
    }

    /**
     * Update Proveedor Grupos
     *
     * @param array $opts
     * @param array $values
     *
     * @return bool
     */
    public function update($opts = [], $values = [])
    {
        if (!$this->select($opts)) {
            return false;
        }

        return ProveedorGrupos::where($opts)->update($values) ? true : false;
    }
}