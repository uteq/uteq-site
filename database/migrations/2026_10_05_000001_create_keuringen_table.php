<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keuringen', function (Blueprint $table) {
            $table->id();
            $table->string('token', 64)->unique();
            $table->string('status')->default('aangevraagd')->index();
            $table->string('bron')->default('direct');
            $table->string('email');
            $table->string('naam')->nullable();
            $table->string('bedrijf')->nullable();
            $table->json('aanvraag')->nullable();
            $table->json('dossier')->nullable();
            $table->unsignedTinyInteger('personen')->nullable();
            $table->timestamp('dossier_op')->nullable();
            $table->timestamps();
        });

        Schema::create('instellingen', function (Blueprint $table) {
            $table->string('sleutel')->primary();
            $table->string('waarde');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuringen');
        Schema::dropIfExists('instellingen');
    }
};
