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
 
    Schema::create('course_efforts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cid'); // This line adds the 'cid' column
        $table->year('year');
        $table->string('semester');
        $table->timestamps();

        // Define the foreign key constraint
        $table->foreign('cid')->references('id')->on('courses')->onDelete('cascade');
    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_efforts');
    }
};
