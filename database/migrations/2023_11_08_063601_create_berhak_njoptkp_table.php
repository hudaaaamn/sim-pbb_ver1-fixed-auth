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
        Schema::create('berhak_njoptkp', function (Blueprint $table) {
            $table->string('SUBJEK_PAJAK_ID', 30);
            $table->string('NOP', 341)->nullable();
            $table->bigInteger('JML')->default(0);
            $table->string('KD_PROPINSI', 2);
            $table->string('KD_DATI2', 2);
            $table->string('KD_KECAMATAN', 3);
            $table->string('KD_KELURAHAN', 3);
            $table->string('KD_BLOK', 3);
            $table->string('NO_URUT', 4);
            $table->string('KD_JNS_OP', 1);

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berhak_njoptkp');
    }
};
