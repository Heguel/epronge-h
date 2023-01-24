<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('lastname');
            $table->string('firstname');
            $table->enum('gender', ['Female', 'Male']);
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('date_of_birth');
            $table->foreignId('option_id')
                ->constrained('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
};
