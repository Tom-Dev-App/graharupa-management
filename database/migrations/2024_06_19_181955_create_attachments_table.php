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
        Schema::dropIfExists('attachments');
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('related_id')->index();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('attachment_for_item_id')->index();
            $table->unsignedBigInteger('attachment_type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('file_dir')->nullable();
            $table->string('filename')->nullable();
            $table->text('file_url')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('attachment_type_id')->references('id')->on('attachment_types')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('attachment_for_item_id')->references('id')->on('attachment_for_items')->onDelete('cascade')->onUpdate('cascade');
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
