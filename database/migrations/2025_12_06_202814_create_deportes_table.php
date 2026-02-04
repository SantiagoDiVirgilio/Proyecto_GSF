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
        Schema::create('deportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30)->required();
            $table->string('descripcion',255)->required();
            $table->unsignedTinyInteger('cupos')->required()->min(10)->max(255);
            $table->unsignedTinyInteger('inscriptos')->default(0)->min(0)->max(255); //esto no deberia ser asi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deportes');
    }
};
