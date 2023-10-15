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
        Schema::create('Company_history_data', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('name', 50);
            $table->string('old_value',255);
            $table->string('new_value',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_history_data');
    }
};
