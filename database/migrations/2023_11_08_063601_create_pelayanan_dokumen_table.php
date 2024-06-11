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
        Schema::create('pelayanan_dokumen', function (Blueprint $table) {
            $table->bigInteger('pelayanan_id');
            $table->smallInteger('dokumen_id');

            $table->primary(['pelayanan_id', 'dokumen_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan_dokumen');
    }
};
