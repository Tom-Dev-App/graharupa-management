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
        Schema::dropIfExists('projects');
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date');
            $table->boolean('is_hidden')->default(false);
            $table->integer('percentage')->default(0);
            $table->string('duration');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();   
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('status_id')
            ->references('id')->on('statuses')
            ->onUpdate('cascade');
            
            // $table->foreign('user_id')
            //       ->references('id')->on('users')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
