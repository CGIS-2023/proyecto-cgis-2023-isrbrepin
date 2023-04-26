<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camillas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('precio');
            $table->date('fecha_adquisicion');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreignId('celador_id')->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camillas');
    }
};
