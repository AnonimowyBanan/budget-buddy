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
        Schema::create('transactions_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('transaction_category_id');
            $table->foreign('transaction_category_id')
                ->references('id')
                ->on('transaction_categories');
            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')
                ->references('id')
                ->on('budgets');
            $table->decimal('limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions_limits', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['transaction_category_id']);
            $table->dropForeign(['budget_id']);
        });
        Schema::dropIfExists('transactions_limits');
    }
};
