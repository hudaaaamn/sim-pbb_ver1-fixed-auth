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
        Schema::create('ref_dati2', function (Blueprint $table) {
            $table->string('KD_PROPINSI', 2);
            $table->string('KD_DATI2', 2);
            $table->string('NM_DATI2', 30);

            $table->primary(['KD_PROPINSI', 'KD_DATI2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_dati2');
    }
};
