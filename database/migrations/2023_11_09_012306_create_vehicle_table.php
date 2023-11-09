<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')
            ->onDelete("restrict")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users')
            ->onDelete("restrict")
            ->onUpdate("cascade");
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('card_brand')
            ->onDelete("restrict")
            ->onUpdate("cascade");
            $table->string('plate',20)->unique();
            $table->string('color', 20);
            $table->enum('type', ['PARTICULAR', 'PUBLIC'])->default('PARTICULAR');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
