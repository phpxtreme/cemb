<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorGruposTable extends Migration
{
    /**
     * Proveedor Grupos Table
     *
     * @var string
     */
    private $table = 'proveedor_grupos';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->integer('proveedor_id')
                ->nullable(false);

            $table->string('name')
                ->nullable(false);

            $table->integer('precio')
                ->nullable(false);

            $table->boolean('active')
                ->default(true);

            $table->timestamps();

            $table->foreign('proveedor_id')
                ->references('id')->on('proveedores')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
