<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('produto')->nullable();
            $table->float('valor')->nullable();
            $table->tinyInteger('quantidade')->nullable();
            $table->float('valor_total')->nullable();
            $table->string('tipo_pgto')->nullable();
            $table->float('parcelas')->nullable();
            $table->float('valor_parcela')->nullable();
            $table->string('cliente')->nullable();
            $table->string('vendedor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
