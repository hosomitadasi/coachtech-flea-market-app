<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{

    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('brand_name')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->unsignedBigInteger('condition_id');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
