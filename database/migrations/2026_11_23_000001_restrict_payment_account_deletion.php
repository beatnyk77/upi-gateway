<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['payment_account_id']);
            $table->foreign('payment_account_id')->references('id')->on('payment_accounts')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['payment_account_id']);
            $table->foreign('payment_account_id')->references('id')->on('payment_accounts')->cascadeOnDelete();
        });
    }
};
