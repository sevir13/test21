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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string("g_number", 100)->nullable();
            $table->date("date")->nullable();
            $table->date("last_change_date")->nullable();
            $table->string("supplier_article", 100)->nullable();
            $table->string("tech_size", 100)->nullable();
            $table->string("barcode", 100)->nullable();
            $table->float("total_price")->nullable();
            $table->tinyInteger("discount_percent")->nullable();
            $table->boolean("is_supply")->nullable()->nullable();
            $table->boolean("is_realization")->nullable();
            $table->integer("promo_code_discount")->nullable();
            $table->string("warehouse_name", 100)->nullable();
            $table->string("country_name", 100)->nullable();
            $table->string("oblast_okrug_name", 100)->nullable();
            $table->string("region_name", 100)->nullable();
            $table->bigInteger("income_id")->nullable();
            $table->string("sale_id", 100)->nullable();
            $table->bigInteger("odid")->nullable();
            $table->integer("spp")->nullable();
            $table->float("for_pay")->nullable();
            $table->float("finished_price")->nullable();
            $table->float("price_with_disc")->nullable();
            $table->bigInteger("nm_id")->nullable();
            $table->string("subject", 100)->nullable();
            $table->string("category", 100)->nullable();
            $table->string("brand", 100)->nullable();
            $table->boolean("is_storno")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
