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
        Schema::create('sisa_piutang', function (Blueprint $table) {
            $table->year('THN_NERACA');
            $table->year('THN_PIUTANG');
            $table->bigInteger('TOTAL')->nullable();
            $table->bigInteger('PENYISIHAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sisa_piutang');
    }
};
