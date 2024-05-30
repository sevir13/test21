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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->date("last_change_date")->nullable();
            $table->string("supplier_article", 100)->nullable();
            $table->string("tech_size", 100)->nullable();
            $table->string("barcode", 100)->nullable();
            $table->smallInteger("quantity")->nullable();
            $table->boolean("is_supply")->nullable();
            $table->boolean("is_realization")->nullable();
            $table->smallInteger("quantity_full")->nullable();
            $table->string("warehouse_name", 100)->nullable();
            $table->tinyInteger("in_way_to_client")->nullable();
            $table->tinyInteger("in_way_from_client")->nullable();
            $table->bigInteger("nm_id")->nullable();
            $table->string("subject", 100)->nullable();
            $table->string("category", 100)->nullable();
            $table->string("brand", 100)->nullable();
            $table->string("sc_code", 100)->nullable();
            $table->float("price")->nullable();
            $table->tinyInteger("discount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
