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
        Schema::create('datatks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('longtitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('link_address')->nullable();
            $table->integer('spp');
            $table->integer('entry_fee');
            $table->integer('capacity');
            $table->integer('teachers');
            $table->string('accreditation');
            $table->string('status');
            $table->string('abk');
            $table->integer('facilities');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datatks');
    }
};
