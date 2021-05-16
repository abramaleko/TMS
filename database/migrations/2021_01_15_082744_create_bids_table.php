<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rental_id')->unsigned();
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
            $table->bigInteger('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('landlord_id');
            $table->string('price');
            $table->integer('duration')->unsigned()->default(12);
            $table->text('comments')->nullable();
            $table->string('status',15)->default('Active');
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
        Schema::dropIfExists('bids');
    }
}
