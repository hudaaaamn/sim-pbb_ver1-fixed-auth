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
        Schema::create('temp_neraca_kpp', function (Blueprint $table) {
            $table->string('NOP', 18)->default('');
            $table->string('NAMA', 30)->nullable();
            $table->decimal('KETETAPAN', 43, 0)->nullable();
            $table->decimal('POKOK_BAYAR', 42, 0)->nullable();
            $table->decimal('DENDA_BAYAR', 41, 0)->nullable();
            $table->text('TGL_BAYAR')->nullable();
            $table->decimal('SISA_PIUTANG', 44, 0)->nullable();
            $table->decimal('PENYISIHAN', 44, 0)->nullable();
            $table->decimal('NETTO', 45, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_neraca_kpp');
    }
};
