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
            $table->boolean('is_active')->default(true);
            $table->jsonb('top_text')->nullable()->default(null);
            $table->jsonb('bottom_text')->nullable()->default(null);
            NestedSet::columns($table);
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->jsonb('name');
            $table->jsonb('slug');
            $table->jsonb('description');
            $table->decimal('price');
            $table->decimal('discount_price')->default(0);
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->bigInteger('object_id');
            $table->string('name');
            $table->string('dirname');
            $table->string('filename');
            $table->string('extension')->nullable()->default(null);
            $table->integer('filesize');
            $table->string('mimetype');
            $table->integer('order')->default(0);
            $table->string('status')->nullable()->default(null);
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
        Schema::dropIfExists('category');
        Schema::dropIfExists('files');
    }
};
