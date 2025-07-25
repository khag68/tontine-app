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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 15, 2);
        $table->text('reason')->nullable();
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->foreignId('admin_id')->nullable()->constrained('users');
        $table->text('admin_notes')->nullable();
        $table->timestamp('processed_at')->nullable();
        $table->timestamps();

        $table->index(['user_id', 'status']);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
