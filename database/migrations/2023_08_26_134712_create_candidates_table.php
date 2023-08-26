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
        Schema::create('t_candidates', function (Blueprint $table) {
            $table->uuid('candidate_id')->primary();
            $table->string('candidate_email')->unique();
            $table->string('candidate_phone_number')->nullable()->unique();
            $table->string('candidate_full_name');
            $table->date('candidate_dob');
            $table->string('candidate_pob');
            $table->string('candidate_gender');
            $table->string('candidate_year_exp');
            $table->string('candidate_last_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_candidates');
    }
};
