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
        Schema::create('ref_kelurahan', function (Blueprint $table) {
            $table->string('KD_PROPINSI', 2);
            $table->string('KD_DATI2', 2);
            $table->string('KD_KECAMATAN', 3)->index('KD_KECAMATAN');
            $table->string('KD_KELURAHAN', 3)->index('KD_KELURAHAN');
            $table->string('KD_SEKTOR', 2);
            $table->string('NM_KELURAHAN', 30);
            $table->smallInteger('NO_KELURAHAN')->nullable();
            $table->string('KD_POS_KELURAHAN', 5)->nullable();

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_kelurahan');
    }
};
