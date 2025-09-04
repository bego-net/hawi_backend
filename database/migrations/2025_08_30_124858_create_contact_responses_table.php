<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->text('response');
            $table->timestamps();
        });
    }
    


    public function down(): void
    {
        Schema::dropIfExists('contact_responses');
    }
};
