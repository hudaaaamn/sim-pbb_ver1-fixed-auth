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
        Schema::create('lookup_item', function (Blueprint $table) {
            $table->char('KD_LOOKUP_GROUP', 2);
            $table->char('KD_LOOKUP_ITEM', 1);
            $table->string('NM_LOOKUP_ITEM', 225)->nullable();

            $table->primary(['KD_LOOKUP_GROUP', 'KD_LOOKUP_ITEM']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookup_item');
    }
};
