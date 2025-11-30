<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // company + number
        $table->foreignId('assigned_manager_id')->constrained('users')->onDelete('cascade');
        $table->string('company')->nullable();
        $table->text('note')->nullable();
        $table->string('mashaar')->nullable();
        $table->string('nationality')->nullable();
        $table->string('center_number')->nullable();
        $table->string('category')->nullable();
        $table->float('total_area')->default(0);
        $table->float('tent_area')->default(0);
        $table->integer('pilgrims_count')->default(0);
        $table->string('contractor')->nullable();
        $table->string('google_map_link')->nullable();
        $table->string('map_file_name')->nullable();
        $table->timestamps();
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
