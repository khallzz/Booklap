<?php

use App\Models\Field;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Field::class);
            $table->string('order_code')->unique();
            $table->enum('status', ['UNPAID', 'CONFIRMED', 'FINISHED', 'CANCELED'])->default('UNPAID');
            $table->integer('amount');
            $table->boolean('is_promo');
            $table->date('order_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('payment_receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
