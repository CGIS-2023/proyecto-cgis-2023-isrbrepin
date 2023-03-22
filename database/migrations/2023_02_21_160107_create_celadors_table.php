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
        Schema::create('celadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->date('fecha_contratacion');
            $table->double('sueldo');
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celadors');
    }
};
