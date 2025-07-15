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
        Schema::create('admin_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users');
            $table->enum('action_type', ['kyc_validation', 'user_activation', 'withdrawal_approval']);
            $table->unsignedBigInteger('target_id'); // ID polyvalent selon action_type
            $table->json('action_details')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['admin_id', 'action_type']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_actions');
    }
};
