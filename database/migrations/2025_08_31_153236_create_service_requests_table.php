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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // requester
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete(); // requested service (optional)
            
            $table->string('title'); // short title/subject of request
            $table->text('details')->nullable(); // detailed description
            
            $table->enum('status', ['pending', 'in_progress', 'completed'])
                  ->default('pending'); // tracking
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
