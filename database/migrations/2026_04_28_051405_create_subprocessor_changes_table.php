<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subprocessor_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subprocessor_id')->nullable()->constrained()->nullOnDelete();
            $table->string('change_type'); // added | updated | removed | initial
            $table->string('summary');
            $table->text('details')->nullable();
            $table->date('effective_from');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('broadcast_at')->nullable();
            $table->timestamps();

            $table->index(['effective_from']);
            $table->index(['published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subprocessor_changes');
    }
};
