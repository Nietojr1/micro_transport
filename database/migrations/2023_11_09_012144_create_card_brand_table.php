<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('card_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('origin', 100);
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('card_brand');
    }
};
