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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('subcategory');

            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('address');

            $table->string('email');
            $table->string('phone');
            $table->string('website')->nullable();

            $table->boolean('isActive')->default(true);
            $table->boolean('isVerified')->default(false);

            $table->foreignIdFor(\App\Models\Owner::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
