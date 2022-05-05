<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price');
            $table->integer('quantity');
            $table->integer('stock');
            $table->boolean('feature_key')->default('0');
            $table->boolean('flash_key')->default('0');
            $table->boolean('status')->default('0');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
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
        Schema::dropIfExists('products');
    }
}
