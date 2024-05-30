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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("income_id")->nullable();
            $table->string("number", 100)->nullable();
            $table->date("date")->nullable();
            $table->date("last_change_date")->nullable();
            $table->string("supplier_article", 100)->nullable();
            $table->string("tech_size", 100)->nullable();
            $table->string("barcode", 100)->nullable();
            $table->smallInteger("quantity")->nullable();
            $table->float("total_price")->nullable();
            $table->date("date_close")->nullable();
            $table->string("warehouse_name", 100)->nullable();
            $table->bigInteger("nm_id")->nullable();
            $table->string("status", 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
