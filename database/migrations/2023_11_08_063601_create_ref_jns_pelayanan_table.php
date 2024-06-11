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
        Schema::create('ref_jns_pelayanan', function (Blueprint $table) {
            $table->char('KD_JNS_PELAYANAN', 2)->nullable();
            $table->string('NM_JENIS_PELAYANAN', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_jns_pelayanan');
    }
};
