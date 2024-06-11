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
        Schema::create('pelayanan_lampiran_kolektif', function (Blueprint $table) {
            $table->bigInteger('ID', true);
            $table->string('NO_PELAYANAN', 30);
            $table->string('NOP', 40)->nullable();
            $table->string('NAMA', 100)->nullable();
            $table->text('ALAMAT')->nullable();
            $table->double('LT')->nullable();
            $table->double('LB')->nullable();
            $table->text('KETERANGAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan_lampiran_kolektif');
    }
};
