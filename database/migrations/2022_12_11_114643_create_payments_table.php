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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('sub_status')->default('0');
            $table->tinyInteger('due_status')->default('0');
            $table->string('method');
            $table->string('plan');
            $table->string('price');
            $table->string('tprice');
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('billing_add');
            $table->string('b_number')->nullable();
            $table->string('b_trans')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('sub_end');
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
        Schema::dropIfExists('payments');
    }
};