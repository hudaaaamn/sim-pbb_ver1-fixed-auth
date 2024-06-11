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
        Schema::create('kelas_bangunan', function (Blueprint $table) {
            $table->string('KELAS_BANGUNAN', 5)->primary();
            $table->decimal('NILAI_MINIMUM');
            $table->decimal('NILAI_MAKSIMUM');
            $table->decimal('NJOP_BANGUNAN');

            $table->index(['NILAI_MINIMUM', 'NILAI_MAKSIMUM'], 'NILAI_MINIMUM_NILAI_MAKSIMUM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_bangunan');
    }
};
