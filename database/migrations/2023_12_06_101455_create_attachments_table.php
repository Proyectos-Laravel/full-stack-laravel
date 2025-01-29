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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id('attachment_id');

            $table->morphs('attachable');

            $table->createdBy();
            $table->updatedBy();
            $table->deletedBy();

            $table->string('name');
            $table->string('path');
            $table->string('mime_type');
            $table->string('extension');
            $table->unsignedBigInteger('size');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
