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
        Schema::create('category_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->unique('category_orders_user_id_unique_foreign');
            $table->json('category_order');
            $table->timestamps();

            $table->foreign('user_id', 'category_orders_user_id_unique_foreign')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_orders');
    }
};
