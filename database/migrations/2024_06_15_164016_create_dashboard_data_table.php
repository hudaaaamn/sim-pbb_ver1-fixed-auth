<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dashboard_data', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->integer('jml_objek_pajak');
            $table->integer('luas_bgn_total');
            $table->integer('total_pendapatan_pbb');
            $table->integer('jml_pbb_lunas');
            $table->integer('jml_pbb_belum_lunas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_data');
    }
};
