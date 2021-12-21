<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('_key',32);
            $table->string('type');
            $table->string('name');
            $table->string('fathers_name')->nullable();
            $table->string('address',255);
            $table->string('mobile');
            $table->string('code',32)->nullable();
            $table->integer('cost_per_bag')->nullable();
            $table->integer('cost_per_kg')->nullable();
            $table->integer('loan_per_bag')->nullable();
            $table->integer('empty_bag_charge')->nullable();
            $table->integer('fanning_charge')->nullable();
            $table->integer('agent_discount')->nullable();
            $table->integer('discount_per_bag')->nullable();
            $table->integer('rate_of_interest')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
