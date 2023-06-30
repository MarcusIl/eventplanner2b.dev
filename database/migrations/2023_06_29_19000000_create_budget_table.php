<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budget', function (Blueprint $table) { // Update the table name to 'budget'
            $table->id();
            $table->foreignId('event_id')->constrained('events');
            $table->string('name')->default('Budget');
            $table->text('description');
            $table->decimal('amount', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget');
    }
};
