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
        Schema::create('trendings', function (Blueprint $table) {
            $table->id();
            $table->integer('p_id');
            $table->string('p_name');
            $table->text('des');
            $table->float('actual_price');
            $table->float('dis_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trendings');
    }
};
