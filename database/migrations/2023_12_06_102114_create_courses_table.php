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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories');

            $table->owner();
            $table->createdBy();
            $table->updatedBy();
            $table->deletedBy();

            $table->string('name')->unique();
            $table->slug();
            $table->string('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
