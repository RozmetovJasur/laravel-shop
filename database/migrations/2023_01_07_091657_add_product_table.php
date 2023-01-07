<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->jsonb('name');
            $table->jsonb('slug');
            $table->boolean('is_active');
            NestedSet::columns($table);
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->jsonb('name');
            $table->jsonb('slug');
            $table->jsonb('description');
            $table->decimal('price');
            $table->decimal('discount_price');
            $table->jsonb('photo');
            $table->string('status');
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
        Schema::dropIfExists('product');
    }
};
