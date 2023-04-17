<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoCamillaToCamillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camillas', function (Blueprint $table) {
            $table->foreignId('tipo_camilla_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camillas', function (Blueprint $table) {
            $table->dropForeign(['tipo_camilla_id']);
            $table->dropColumn('tipo_camilla_id');
        });
    }
}
