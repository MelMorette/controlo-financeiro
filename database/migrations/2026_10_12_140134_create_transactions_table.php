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
       Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('people');
            $table->foreignId('category_id')->constrained(); // Laravel segue convenções, conhece plurais irregulares para o nome da tabela, então não é necessário especificar 'categories' (convenção sobre configuração)
            $table->string('description')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3);
            $table->date('occurred_on');
            $table->timestamps();

            $table->index('occurred_on');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
