<?php

namespace App\Repositories;

use App\Models\Proveedor;

class ProveedorRepository extends _Base implements _Interface
{
    /**
     * Select Proveedor
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return Module
     */
    public function select($opts = [], $one = false)
    {
        $model = new Proveedor();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create Proveedor
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

        return Proveedor::create($opts);
    }

    /**
     * Remove Proveedor
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

        return Proveedor::where($opts)->delete() ? true : false;
    }

    /**
     * Update Proveedor
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

        return Proveedor::where($opts)->update($values) ? true : false;
    }
}