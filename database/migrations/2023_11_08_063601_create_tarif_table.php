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
        Schema::create('tarif', function (Blueprint $table) {
            $table->char('KD_PROPINSI', 2);
            $table->char('KD_DATI2', 2);
            $table->char('THN_AWAL', 4);
            $table->char('THN_AKHIR', 4);
            $table->decimal('NJOP_MIN', 15, 0);
            $table->decimal('NJOP_MAX', 15, 0)->nullable();
            $table->decimal('NILAI_TARIF', 3, 3)->nullable();

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'THN_AWAL', 'THN_AKHIR', 'NJOP_MIN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif');
    }
};
