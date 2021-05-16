<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rental_id')->unsigned()->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->bigInteger('landlord_id');
            $table->string('tenant_name');
            $table->string('tenant_phone_number');
            $table->string('tenant_email');
            $table->date('move_in');
            $table->date('move_out');
            $table->string('deposited');
            $table->string('balance');
            $table->string('attach_1')->nullable();
            $table->string('attach_2')->nullable();
            $table->string('attach_3')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
