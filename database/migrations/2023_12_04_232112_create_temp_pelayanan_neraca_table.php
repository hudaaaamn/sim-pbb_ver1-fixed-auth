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
        Schema::create('temp_pelayanan_neraca', function (Blueprint $table) {
            $table->string('NOP', 18)->primary();
            $table->string('NO_PELAYANAN', 13)->nullable();
            $table->string('KD', 20)->nullable();
            $table->text('KETERANGAN')->nullable();
            $table->text('CATATAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_pelayanan_neraca');
    }
};
