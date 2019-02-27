<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorGrupoItemsTable extends Migration
{
    /**
     * Proveedor Grupo Items Table
     *
     * @var string
     */
    private $table = 'proveedor_grupo_items';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->integer('grupo_id')
                ->nullable(false);

            $table->integer('cantidad')
                ->nullable(false);

            $table->string('unidad')
                ->nullable(false);

            $table->string('moneda')
                ->nullable(false);

            $table->text('descripcion')
                ->nullable(false);

            $table->string('modelo')
                ->nullable(false);

            $table->integer('precio')
                ->nullable(false);

            $table->boolean('active')
                ->default(true);

            $table->timestamps();

            $table->foreign('grupo_id')
                ->references('id')->on('proveedor_grupos')
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
