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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("g_number", 100)->nullable();
            $table->dateTime("date")->nullable();
            $table->dateTime("last_change_date")->nullable();
            $table->string("supplier_article", 100)->nullable();
            $table->string("tech_size", 100)->nullable();
            $table->string("barcode", 100)->nullable();
            $table->float("total_price")->nullable();
            $table->tinyInteger("discount_percent")->nullable();
            $table->string("warehouse_name", 100)->nullable();
            $table->string("oblast", 100)->nullable();
            $table->bigInteger("income_id")->nullable();
            $table->bigInteger("odid")->nullable();
            $table->bigInteger("nm_id")->nullable();
            $table->string("subject", 100)->nullable();
            $table->string("category", 100)->nullable();
            $table->string("brand", 100)->nullable();
            $table->boolean("is_cancel")->nullable();
            $table->date("cancel_dt")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
