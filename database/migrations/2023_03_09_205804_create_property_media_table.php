<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('property_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->foreign('properties.id');
            $table->enum('type', ['image', 'video', 'blueprint', 'other']);
            $table->text('url');
            $table->index(['property_id', 'type']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_media');
    }
}
