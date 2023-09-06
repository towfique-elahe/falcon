<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
        DB::table('plans')->insert([
            'id' => '1',
            'name' => 'Basic',
            'price' => '800',
        ]);
        DB::table('plans')->insert([
            'id' => '2',
            'name' => 'Standard',
            'price' => '1000',
        ]);
        DB::table('plans')->insert([
            'id' => '3',
            'name' => 'Premium',
            'price' => '1500',
        ]);
    }

    /**
     * Reverse the migrations.
     *ph
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};