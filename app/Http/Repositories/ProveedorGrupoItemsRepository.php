<?php

namespace App\Repositories;

use App\Models\ProveedorGrupoItems;

class ProveedorGrupoItemsRepository extends _Base implements _Interface
{
    /**
     * Select Proveedor Grupo Items
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return Module
     */
    public function select($opts = [], $one = false)
    {
        $model = new ProveedorGrupoItems();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create Proveedor Grupo Items
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

        return ProveedorGrupoItems::create($opts);
    }

    /**
     * Remove Proveedor Grupo Items
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

        return ProveedorGrupoItems::where($opts)->delete() ? true : false;
    }

    /**
     * Update Proveedor Grupo Items
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

        return ProveedorGrupoItems::where($opts)->update($values) ? true : false;
    }
}